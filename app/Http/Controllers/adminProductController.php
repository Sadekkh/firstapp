<?php

namespace App\Http\Controllers;

use App\Models\attribute;
use App\Models\brands;
use App\Models\categories;
use App\Models\offer;
use App\Models\products;
use App\Models\imagesm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class adminProductController extends Controller
{
    public function index($id)
    {
        $product = products::with('image')->where('category_id', $id)->get();
        return view('adminLayouts.category.product', compact('product'));
    }
    public function showall()
    {

        $product = products::with('category', 'brand', 'offer')->get();
        return view('adminLayouts.products.index', compact('product'));
    }
    public function edit($id)
    {
        $product = products::with('image', 'category', 'brand', 'offer', 'attribute.attribute', 'variation.variation')->where('id', $id)->get();
        $offer = offer::all();
        $category = categories::all();
        $brand = brands::all();
        $att = attribute::with('variation')->where('activate_filter', '1')->get();
        return view('adminLayouts.products.edit', compact('att', 'product', 'offer', 'category', 'brand'));
    }
    public function update(Request $request, string $id)
    {
        $input = $request->all();
        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();

                $file->move(public_path('storage/products/'), $name);
                imagesm::insert([
                    'name' =>  $name,
                    'products_id' => $id,
                    //you can put other insertion here
                ]);
            }
        }
        /*Insert your data*/




        $c = products::findorfail($id);
        $c->update($input);

        return Redirect::back()->with('message', 'Operation Successful !');
    }
    public function image_delete($id)
    {

        $c = imagesm::findorfail($id);
        if (File::exists(public_path('storage/products/' . $c->name))) {
            File::delete(public_path('storage/products/' . $c->name));
        }

        $c->delete();
        return Redirect::back()->with('message', 'Operation Successful !');
    }
    public function setDefaultImage($id, $img)
    {
        $c = products::findorfail($id);
        $s = imagesm::findorfail($img);

        $c->media_id = $s->name;
        $c->save();
        return Redirect::back()->with('message', 'Operation Successful !');
    }
    public function create()
    {
        $offer = offer::all();
        $category = categories::all();
        $brand = brands::all();
        $att = attribute::with('variation')->where('activate_filter', '1')->get();
        return view('adminLayouts.products.create', compact('att', 'offer', 'category', 'brand'));
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $p = products::create($input);
        $p->save();
        $pid = $p->id;
        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();

                $file->move(public_path('storage/products/'), $name);
                imagesm::insert([
                    'name' =>  $name,
                    'products_id' => $pid,
                    //you can put other insertion here
                ]);
            }
        }
        /*Insert your data*/






        return Redirect::back()->with('message', 'Operation Successful !');
    }
}
