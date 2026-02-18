<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\ProductCategory;
use App\Models\Product;    

class ProductController extends Controller
{
    public function show($slug)
    {
        $companies = Company::first();
        $productCategories = ProductCategory::where('slug', $slug)->first();
        $products = Product::where('category_id', $productCategories->id)
            ->where('is_visible', true)
            ->orderBy('name', 'asc')
            ->get();

        return view('pages.products.show', compact('companies', 'productCategories', 'products'));
    }
}
