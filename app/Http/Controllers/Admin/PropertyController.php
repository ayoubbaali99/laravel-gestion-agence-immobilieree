<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyFormRequest;
use App\Models\Option;
use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                return view('admin.properties.index',[
            'properties'=>Property::orderBy('created_at','desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $property = new Property();
        $property->fill([
            'surface'=>40,
            'rooms'=>3,
            'bedrooms'=>1,
            'floor'=>0,
            'city'=>'Casablanca',
            'postal_code'=>20000,
            'sold'=>false,
        ]);

        return view('admin.properties.form',[
            'property'=> $property,
            'options'=>Option::pluck('name','id')
          ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyFormRequest $request)
{
    $validatedData = $request->validated();
    $property = Property::create($validatedData);
    $property->options()->sync($validatedData['options']);
    return redirect()->route('admin.property.index')->with('success','Le bien a bien été créé');
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {

        return view('admin.properties.form',[
            'property'=>$property,
            'options'=>Option::pluck('name','id')

        ]);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(PropertyFormRequest $request, Property $property)
{
    $validatedData = $request->validated();
    $property->update($validatedData);
    $property->options()->sync($validatedData['options']);
    return redirect()->route('admin.property.index')->with('success','Le bien a bien été modifié');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('admin.property.index')->with('success','le bien a bien été supprimé');
    }
}
