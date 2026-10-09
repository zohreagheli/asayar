<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Testimonial;
use App\Services\CartService;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __construct(
        private CartService $cart
    ) {}

    public function home()
    {
        $categories = Category::where('is_active', true)->orderBy('sort_order')->get();
        $bestsellers = Product::where('is_active', true)->where('is_bestseller', true)->take(4)->get();
        $newArrivals = Product::where('is_active', true)->where('is_new', true)->take(4)->get();
        $testimonials = Testimonial::where('is_approved', true)->get();

        return view('store.home', compact('categories', 'bestsellers', 'newArrivals', 'testimonials'));
    }

    public function shop(Request $request)
    {
        $categories = Category::where('is_active', true)->orderBy('sort_order')->get();
        $query = Product::where('is_active', true)->with('category');

        if ($request->filled('category')) {
            $query->whereHas('category', fn ($q) => $q->where('slug', $request->category));
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('min_price')) {
            $query->whereRaw('COALESCE(discount_price, price) >= ?', [(int) $request->min_price]);
        }
        if ($request->filled('max_price')) {
            $query->whereRaw('COALESCE(discount_price, price) <= ?', [(int) $request->max_price]);
        }

        if ($request->filled('in_stock')) {
            $query->where('stock', '>', 0);
        }

        switch ($request->get('sort', 'newest')) {
            case 'price_low':
                $query->orderByRaw('COALESCE(discount_price, price) ASC');
                break;
            case 'price_high':
                $query->orderByRaw('COALESCE(discount_price, price) DESC');
                break;
            default:
                $query->latest();
        }

        $products = $query->paginate(12)->appends($request->except('page'));

        return view('store.shop', compact('categories', 'products'));
    }

    public function product(string $slug)
    {
        $product = Product::where('slug', $slug)->where('is_active', true)->with(['images', 'category'])->firstOrFail();
        $related = Product::where('is_active', true)
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)->get();

        return view('store.product', compact('product', 'related'));
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);
        if ($product->stock < 1) {
            return back()->with('error', 'این محصول در حال حاضر ناموجود است.');
        }

        $this->cart->add($request->product_id, $request->get('quantity', 1));
        return back()->with('success', 'محصول به سبد خرید اضافه شد.');
    }

    public function cart()
    {
        $items = $this->cart->getItems();
        $subtotal = $this->cart->subtotal();
        return view('store.cart', compact('items', 'subtotal'));
    }

    public function updateCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ]);
        $this->cart->updateQuantity($request->product_id, $request->quantity);
        return back()->with('success', 'سبد خرید به‌روزرسانی شد.');
    }

    public function removeFromCart(Request $request)
    {
        $request->validate(['product_id' => 'required|integer']);
        $this->cart->remove($request->product_id);
        return back()->with('success', 'محصول از سبد حذف شد.');
    }

    public function checkout()
    {
        $items = $this->cart->getItems();
        if (empty($items)) {
            return redirect()->route('store.shop')->with('error', 'سبد خرید شما خالی است.');
        }
        $subtotal = $this->cart->subtotal();
        return view('store.checkout', compact('items', 'subtotal'));
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_email' => 'nullable|email',
            'address' => 'required|string',
            'city' => 'required|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'notes' => 'nullable|string',
        ]);

        $items = $this->cart->getItems();
        if (empty($items)) {
            return redirect()->route('store.shop')->with('error', 'سبد خرید شما خالی است.');
        }

        $totalAmount = $this->cart->subtotal();

        $order = \App\Models\Order::create([
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'customer_email' => $request->customer_email,
            'address' => $request->address,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'notes' => $request->notes,
            'total_amount' => $totalAmount,
            'shipping_cost' => 0,
            'status' => 'pending',
        ]);

        foreach ($items as $item) {
            \App\Models\OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'product_name' => $item['name'],
                'quantity' => $item['quantity'],
                'unit_price' => $item['price'],
                'total_price' => $item['price'] * $item['quantity'],
            ]);
        }

        $this->cart->clear();
        return redirect()->route('store.order.confirmation', $order->order_code)
            ->with('success', 'سفارش شما با موفقیت ثبت شد.');
    }

    public function orderConfirmation(string $code)
    {
        $order = \App\Models\Order::where('order_code', $code)->firstOrFail();
        return view('store.order-confirmation', compact('order'));
    }

    public function trackOrder(Request $request)
    {
        $order = null;
        if ($request->filled('order_code')) {
            $order = \App\Models\Order::where('order_code', $request->order_code)->first();
            if (!$order) {
                return back()->with('error', 'کد پیگیری یافت نشد.')->withInput();
            }
        }
        return view('store.track-order', compact('order'));
    }

    public function about()
    {
        return view('store.about');
    }

    public function contact()
    {
        return view('store.contact');
    }
}
