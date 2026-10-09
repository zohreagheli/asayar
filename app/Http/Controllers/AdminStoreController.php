<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\NewsletterSubscriber;
use App\Models\Order;
use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminStoreController extends Controller
{
    public function dashboard()
    {
        $productCount = Product::count();
        $orderCount = Order::count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $subscriberCount = NewsletterSubscriber::count();
        $recentOrders = Order::latest()->take(5)->get();

        return view('store.admin.dashboard', compact(
            'productCount', 'orderCount', 'pendingOrders', 'subscriberCount', 'recentOrders'
        ));
    }

    // Products
    public function products(Request $request)
    {
        $query = Product::with('category');
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        $products = $query->latest()->paginate(15);
        return view('store.admin.products', compact('products'));
    }

    public function createProduct()
    {
        $categories = Category::orderBy('sort_order')->get();
        return view('store.admin.product-form', compact('categories'));
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'specifications' => 'nullable|string',
            'price' => 'required|integer|min:0',
            'discount_price' => 'nullable|integer|min:0',
            'stock' => 'required|integer|min:0',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'is_new' => 'boolean',
            'is_bestseller' => 'boolean',
            'main_image' => 'nullable|image|max:2048',
        ]);

        $data = $request->except(['main_image']);
        $data['slug'] = Str::slug($request->name) . '-' . Str::random(6);
        $data['is_active'] = $request->boolean('is_active');
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_new'] = $request->boolean('is_new');
        $data['is_bestseller'] = $request->boolean('is_bestseller');

        if ($request->hasFile('main_image')) {
            $path = $request->file('main_image')->store('products', 'public');
            $data['main_image'] = $path;
        }

        Product::create($data);
        return redirect()->route('admin.products')->with('success', 'محصول با موفقیت ایجاد شد.');
    }

    public function editProduct(Product $product)
    {
        $categories = Category::orderBy('sort_order')->get();
        return view('store.admin.product-form', compact('product', 'categories'));
    }

    public function updateProduct(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'specifications' => 'nullable|string',
            'price' => 'required|integer|min:0',
            'discount_price' => 'nullable|integer|min:0',
            'stock' => 'required|integer|min:0',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'is_new' => 'boolean',
            'is_bestseller' => 'boolean',
            'main_image' => 'nullable|image|max:2048',
        ]);

        $data = $request->except(['main_image']);
        $data['is_active'] = $request->boolean('is_active');
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_new'] = $request->boolean('is_new');
        $data['is_bestseller'] = $request->boolean('is_bestseller');

        if ($request->hasFile('main_image')) {
            $path = $request->file('main_image')->store('products', 'public');
            $data['main_image'] = $path;
        }

        $product->update($data);
        return redirect()->route('admin.products')->with('success', 'محصول با موفقیت به‌روزرسانی شد.');
    }

    public function deleteProduct(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products')->with('success', 'محصول حذف شد.');
    }

    // Categories
    public function categories()
    {
        $categories = Category::orderBy('sort_order')->paginate(15);
        return view('store.admin.categories', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer',
        ]);
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name) . '-' . Str::random(4),
            'description' => $request->description,
            'sort_order' => $request->get('sort_order', 0),
            'is_active' => true,
        ]);
        return back()->with('success', 'دسته‌بندی ایجاد شد.');
    }

    public function deleteCategory(Category $category)
    {
        if ($category->products()->exists()) {
            return back()->with('error', 'این دسته دارای محصول است و قابل حذف نیست.');
        }
        $category->delete();
        return back()->with('success', 'دسته‌بندی حذف شد.');
    }

    // Orders
    public function orders(Request $request)
    {
        $query = Order::with('items');
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        $orders = $query->latest()->paginate(15);
        return view('store.admin.orders', compact('orders'));
    }

    public function showOrder(Order $order)
    {
        $order->load('items.product');
        return view('store.admin.order-detail', compact('order'));
    }

    public function updateOrderStatus(Request $request, Order $order)
    {
        $request->validate(['status' => 'required|in:pending,processing,shipped,delivered,cancelled']);
        $order->update(['status' => $request->status]);
        return back()->with('success', 'وضعیت سفارش به‌روزرسانی شد.');
    }

    // Newsletter
    public function newsletter()
    {
        $subscribers = NewsletterSubscriber::latest()->paginate(20);
        return view('store.admin.newsletter', compact('subscribers'));
    }

    // Testimonials
    public function testimonials()
    {
        $testimonials = Testimonial::latest()->paginate(20);
        return view('store.admin.testimonials', compact('testimonials'));
    }

    public function approveTestimonial(Testimonial $testimonial)
    {
        $testimonial->update(['is_approved' => !$testimonial->is_approved]);
        return back()->with('success', 'وضعیت نظر تغییر کرد.');
    }

    public function deleteTestimonial(Testimonial $testimonial)
    {
        $testimonial->delete();
        return back()->with('success', 'نظر حذف شد.');
    }
}
