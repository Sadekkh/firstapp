<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;

class admincategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = categories::all();

        return view('adminLayouts.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function creates()
    {

        $cat = categories::all();

        return view('adminLayouts.category.create', compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataToUpdate = $request->all();
        categories::create($dataToUpdate);

        return redirect()->route('admin.category');
    }

    /**
     * Display the specified resource.
     */
    public function shows(string $id)
    {

        $category = categories::with('childCategories')->findorfail($id);

        $cat = categories::all();

        return view('adminLayouts.category.edit', compact('category', 'cat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataToUpdate = $request->all();
        $c = categories::findorfail($id);
        $c->update($dataToUpdate);
        return redirect()->route('admin.category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
