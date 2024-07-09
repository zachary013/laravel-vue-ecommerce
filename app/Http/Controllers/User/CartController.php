<?php

namespace App\Http\Controllers\User;

use App\Helper\Cart;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CartController extends Controller
{
    // CRUD: view store update delete

    // Method to view the cart items
    public function view(Request $request, Product $product)
    {
        // Get the authenticated user
        $user = $request->user();
        if ($user) {
            // If the user is authenticated, get their cart items from the database
            $cartItems = CartItem::where('user_id', $user->id)->get();
            // Get the main user address
            $userAddress = UserAddress::where('user_id', $user->id)->where('isMain', 1)->first();
            if ($cartItems->count() > 0) {
                // Render the cart list view with Inertia, passing the cart items and user address
                return Inertia::render(
                    'User/CartList',
                    [
                        'cartItems' => $cartItems,
                        'userAddress' => $userAddress
                    ]
                );
            }
        } else {
            // If the user is not authenticated, get cart items from cookies
            $cartItems = Cart::getCookieCartItems();
            if (count($cartItems) > 0) {
                // Convert cart items to a resource and get products and cart items
                $cartItems = new CartResource(Cart::getProductsAndCartItems());
                // Render the cart list view with Inertia, passing the cart items
                return Inertia::render('User/CartList', ['cartItems' => $cartItems]);
            } else {
                // Redirect back if no items in the cart
                return redirect()->back();
            }
        }
    }

    // Method to add an item to the cart
    public function store(Request $request, Product $product)
    {
        // Get the quantity from the request, default to 1 if not provided
        $quantity = $request->post('quantity', 1);
        // Get the authenticated user
        $user = $request->user();

        if ($user) {
            // Check if the item already exists in the user's cart
            $cartItem = CartItem::where(['user_id' => $user->id, 'product_id' => $product->id])->first();
            if ($cartItem) {
                // If it exists, increment the quantity
                $cartItem->increment('quantity');
            } else {
                // If not, create a new cart item
                CartItem::create([
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                    'quantity' => 1,
                ]);
            }
        } else {
            // If the user is not authenticated, get cart items from cookies
            $cartItems = Cart::getCookieCartItems();
            $isProductExists = false;
            // Check if the product is already in the cart
            foreach ($cartItems as $item) {
                if ($item['product_id'] === $product->id) {
                    // If it exists, increment the quantity
                    $item['quantity'] += $quantity;
                    $isProductExists = true;
                    break;
                }
            }

            if (!$isProductExists) {
                // If the product is not in the cart, add it
                $cartItems[] = [
                    'user_id' => null,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $product->price,
                ];
            }
            // Save the updated cart items back to cookies
            Cart::setCookieCartItems($cartItems);
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'cart added successfully');
    }

    // Method to update the quantity of an item in the cart
    public function update(Request $request, Product $product)
    {
        // Get the new quantity from the request
        $quantity = $request->integer('quantity');
        // Get the authenticated user
        $user = $request->user();
        if ($user) {
            // Update the quantity of the cart item for the authenticated user
            CartItem::where(['user_id' => $user->id, 'product_id' => $product->id])->update(['quantity' => $quantity]);
        } else {
            // If the user is not authenticated, get cart items from cookies
            $cartItems = Cart::getCookieCartItems();
            // Update the quantity of the item in the cookie cart
            foreach ($cartItems as &$item) {
                if ($item['product_id'] === $product->id) {
                    $item['quantity'] = $quantity;
                    break;
                }
            }
            // Save the updated cart items back to cookies
            Cart::setCookieCartItems($cartItems);
        }

        // Redirect back
        return redirect()->back();
    }

    // Method to delete an item from the cart
    public function delete(Request $request, Product $product)
    {
        // Get the authenticated user
        $user = $request->user();
        if ($user) {
            // Delete the cart item for the authenticated user
            CartItem::query()->where(['user_id' => $user->id, 'product_id' => $product->id])->first()?->delete();
            // Check if there are any items left in the cart
            if (CartItem::count() <= 0) {
                // If the cart is empty, redirect to home with a message
                return redirect()->route('home')->with('info', 'your cart is empty');
            } else {
                // Otherwise, redirect back with a success message
                return redirect()->back()->with('success', 'item removed successfully');
            }
        } else {
            // If the user is not authenticated, get cart items from cookies
            $cartItems = Cart::getCookieCartItems();
            // Find and remove the item from the cookie cart
            foreach ($cartItems as $i => &$item) {
                if ($item['product_id'] === $product->id) {
                    array_splice($cartItems, $i, 1);
                    break;
                }
            }
            // Save the updated cart items back to cookies
            Cart::setCookieCartItems($cartItems);
            // Check if there are any items left in the cart
            if (count($cartItems) <= 0) {
                // If the cart is empty, redirect to home with a message
                return redirect()->route('home')->with('info', 'your cart is empty');
            } else {
                // Otherwise, redirect back with a success message
                return redirect()->back()->with('success', 'item removed successfully');
            }
        }
    }
}
