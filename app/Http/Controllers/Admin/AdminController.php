<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $orderCount = Order::count();
        $categoryCount = Category::count();
        $brandCount = Brand::count();
        $productCount = Product::count();

        return Inertia::render('Admin/Dashboard', [
            'order' => $orderCount,
            'category' => $categoryCount,
            'brand' => $brandCount,
            'product' => $productCount,
        ]);
    }
}
