<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BrandListController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve filters from request
        $search = $request->input('search', '');

        // Filter brands based on search input
        $brands = Brand::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })->get();

        return Inertia::render('User/BrandList', [
            'brands' => $brands,
            'filters' => [
                'search' => $search,
            ],
        ]);
    }
}
