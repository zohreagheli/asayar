<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Session\SessionManager;

class CartService
{
    private SessionManager $session;

    public function __construct(SessionManager $session)
    {
        $this->session = $session;
    }

    public function getItems(): array
    {
        return $this->session->get('cart', []);
    }

    public function add(int $productId, int $quantity = 1): void
    {
        $cart = $this->getItems();
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $product = Product::findOrFail($productId);
            $cart[$productId] = [
                'product_id' => $product->id,
                'name' => $product->name,
                'price' => $product->final_price,
                'image' => $product->main_image,
                'quantity' => $quantity,
                'max_stock' => $product->stock,
            ];
        }
        $this->session->put('cart', $cart);
    }

    public function updateQuantity(int $productId, int $quantity): void
    {
        $cart = $this->getItems();
        if (isset($cart[$productId])) {
            if ($quantity <= 0) {
                $this->remove($productId);
                return;
            }
            $cart[$productId]['quantity'] = $quantity;
            $this->session->put('cart', $cart);
        }
    }

    public function remove(int $productId): void
    {
        $cart = $this->getItems();
        unset($cart[$productId]);
        $this->session->put('cart', $cart);
    }

    public function clear(): void
    {
        $this->session->forget('cart');
    }

    public function count(): int
    {
        return array_sum(array_column($this->getItems(), 'quantity'));
    }

    public function subtotal(): int
    {
        return array_sum(array_map(fn ($item) => $item['price'] * $item['quantity'], $this->getItems()));
    }
}
