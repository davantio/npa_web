<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\HeroBanner;
use App\Models\ProductCategory;
use App\Models\Value;
use App\Models\Stats;
use App\Models\Faq;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $companies = Company::first();
        $heroBanners = HeroBanner::where('is_visible', true)->get()->take(5);
        $values = Value::where('is_visible', true)->get()->take(4);
        $stats = Stats::where('is_visible', true)->get()->take(4);
        $productCategories = ProductCategory::where('is_visible', true)->get();
        $customers = Customer::where('is_visible', true)->get();

        return view('pages.landing', compact('companies', 'heroBanners', 'values', 'stats', 'productCategories', 'customers'));
    }
}
