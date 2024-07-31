<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductDetailResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductDetailController extends Controller
{
    public function show($slug)
    {
        $product = Product::where('slug', $slug)
            ->with('category', 'brand', 'product_images')
            ->firstOrFail();

        return Inertia::render('User/ProductDetail', [
            'product' => new ProductDetailResource($product),
        ]);
    }
}
