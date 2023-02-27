<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\MaterialCategory;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Material::all();
        dd($product);
        $category = MaterialCategory::all();
        return view('material.index',['category'=>$category,'product'=>$product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = MaterialCategory::all();
        return view('material.create',['category'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
        $request->validate([
            "name" => "required|regex:/^[0-9A-Za-z.\s,'-]*$/",
            "balance" => "required|between:0,99.99",
            "category" => "required",
            
        ]);
      
        Material::create($request->all());
       
        return redirect()->route('material.index')
                        ->with('success','Material created successfully.');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Material = Material::find($id);
        return view('material.edit', compact('Material'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
             "name" => "required|regex:/^[0-9A-Za-z.\s,'-]*$/",
            "balance" => "required|between:0,99.99",
            "category" => "required",
        ]); 
        $stock = Material::find($id);
        // Getting values from the blade template form
        $stock->name =  $request->get('name');
        $stock->balance = $request->get('balance');
        $stock->category = $request->get('category');
        $stock->save();
      
        return redirect()->route('material.index')
                        ->with('success','Material updated successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stock = Material::find($id);
        $stock->delete();
        return redirect()->route('material.index')
                        ->with('danger','Material deleted successfully');
    }
}
