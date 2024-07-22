<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryListController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return Inertia::render('User/CategoryList', [
            'categories' => $categories,
        ]);
    }
}
