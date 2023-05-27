<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Option;
use App\Http\Requests\Admin\PropertyFormRequest;
use App\Http\Requests\Admin\OptionFormRequest;

use PhpParser\Node\Stmt\Return_;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // recupérer l'ensemble des biens et l'envoyer à la vue et les afficher sous forme d'un tableau
        return view('admin.options.index',[
            'options'=>Option::paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $option = new Option();
        return view('admin.options.form',[
            'option'=> $option
          ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OptionFormRequest $request)
    {
        $option = Option::create($request->validated());
        return redirect()->route('admin.option.index')->with('success','L\'option a bien été crée');
    }





             /// nous supprimons la méthode show parceque il est
            // préférable de supprimer  cette méthode "show($id)" car on a rien à afficher dans la page admin


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Option $option)
    {

        return view('admin.options.form',[
            'option'=>$option
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OptionFormRequest $request, Option $option)
    {
        $option->update($request->validated());
        return redirect()->route('admin.option.index')->with('success','L\'option a bien été modifié');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Option $option)
    {
        $option->delete();
        return redirect()->route('admin.option.index')->with('success','L\'option a bien été supprimé');
    }
}
