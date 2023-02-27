<?php

namespace App\Http\Controllers;

use App\Models\MaterialCategory;
use Illuminate\Http\Request;

class MaterialCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $category = MaterialCategory::latest()->paginate(5);
      
        return view('category.index',compact('category'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            'Raw_material' => 'required',
            'Finish_goods' => 'required',
            'Spares' => 'required',
            'Machines' => 'required',
            'other' => 'required',
            
        ]);
      
        MaterialCategory::create($request->all());
       
        return redirect()->route('category.index')
                        ->with('success','Category created successfully.');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MaterialCategory  $materialCategory
     * @return \Illuminate\Http\Response
     */
    public function show(MaterialCategory $materialCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MaterialCategory  $materialCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(MaterialCategory $materialCategory ,$id)
    {
      
         $materialCategory = MaterialCategory::find($id);
        return view('category.edit', compact('materialCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MaterialCategory  $materialCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $request->validate([
            'Raw_material' => 'required',
            'Finish_goods' => 'required',
            'Spares' => 'required',
            'Machines' => 'required',
            'other' => 'required',
        ]); 
        $stock = MaterialCategory::find($id);
        // Getting values from the blade template form
        $stock->Raw_material =  $request->get('Raw_material');
        $stock->Finish_goods = $request->get('Finish_goods');
        $stock->Spares = $request->get('Spares');
        $stock->Machines = $request->get('Machines');
        $stock->other = $request->get('other');
        $stock->save();
      
        return redirect()->route('category.index')
                        ->with('success','Category updated successfully');       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MaterialCategory  $materialCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
       $stock = MaterialCategory::find($id);
        $stock->delete();
        return redirect()->route('category.index')
                        ->with('danger','Category deleted successfully');
    }
}
