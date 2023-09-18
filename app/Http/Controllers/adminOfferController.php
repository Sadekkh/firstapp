<?php

namespace App\Http\Controllers;

use App\Models\offer;
use Illuminate\Http\Request;

class adminOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offer = offer::all();

        return view('adminLayouts.offer.index', compact('offer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function creates()
    {
        return view('adminLayouts.offer.create',);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataToUpdate = $request->all();
        offer::create($dataToUpdate);

        return redirect()->route('admin.offer');
    }

    /**
     * Display the specified resource.
     */
    public function shows(string $id)
    {

        $offer = offer::findorfail($id);



        return view('adminLayouts.offer.edit', compact('offer'));
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
        $c = offer::findorfail($id);
        $c->update($dataToUpdate);
        return redirect()->route('admin.offer');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
