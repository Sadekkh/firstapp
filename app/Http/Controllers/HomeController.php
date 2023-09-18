<?php

namespace App\Http\Controllers;

use App\Models\attribute;
use App\Models\brands;
use App\Models\carts;
use Illuminate\Http\Request;
use App\Models\categories;
use App\Models\offer;
use App\Models\products;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = categories::with('childCategories')->whereNull('parent_id')->get();
        $offers = offer::with('Product.image', 'Product.category')->where('state', '!=', '0')->get();
        $brands = brands::where('status', '1')->get();
        return view('components.index', compact('categories', 'offers', 'brands'));
    }
    public function product(Request $request)
    {
        $perPage = 16;
        $page = $request->input('page');

        $products = products::with('image', 'category', 'attribute.attribute', 'variation.variation')->where('status', 'active')->paginate($perPage, ['*'], 'page', $page);
        $nextPage = $products->currentPage() + 1;
        $attribute = attribute::with('variation')->where('activate_filter', '1')->get();
        $att = attribute::all();
        $categories = categories::with('childCategories', 'productsCount')->whereNull('parent_id')->get();
        $brands = brands::with('productsCount')->get();

        return view('components.products', compact('att', 'categories', 'products', 'brands', 'attribute'));
    }
    public function filter(Request $request)
    {

        $query = products::with('image', 'category', 'variation');

        if ($request->filled('categories')) {
            $cat = categories::whereIn('parent_id', $request->input('categories', []))->get();
            $arr = $cat->toArray();
            $arr = array_merge($arr, $request->input('categories', []));
            $flattenedArray = Arr::flatten($arr);
            $query->whereIn('category_id', $flattenedArray);
        }
        if ($request->filled('brands')) {
            $query->whereIn('brand_id', $request->input('brands', []));
        }
        if ($request->filled('min_price')) {
            $query->where('price', '>', $request->input('min_price'));
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<', $request->input('max_price'));
        }
        if ($request->filled('model')) {
            $query->whereHas('variation', function ($query) use ($request) {
                $query->where('variation_id', $request->input('model', []));
            });
        }
        if ($request->filled('colors')) {
            $query->whereHas('variation', function ($query) use ($request) {
                $query->where('variation_id', $request->input('colors', []));
            });
        }
        if ($request->filled('sorting')) {
            if ($request->input('sorting') == 'trending') {
                $query->where('trending', '!=', '0')->orderby('trending');
            } else if ($request->input('sorting') == 'bestdiscount') {
                $query->where('discount', '!=', '0')->orderby('discount', 'asc');
            };
        }

        $products = $query->get();



        return view('components.data', ['products' => $products]);
    }
    public function getProduct($id)
    {
        $product = products::with('image', 'category', 'attribute.attribute', 'variation.variation')->where('id', $id)->where('status', 'active')->get();

        return view('components.product', compact('product'));
    }
}
