<?php

namespace App\Http\Controllers;

use App\Rubro;
use Illuminate\Http\Request;

class RubrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rubros = Rubro::orderBy('id', 'desc')->get();
        return view('admin.rubros.index', ['rubros'=>$rubros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rubros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //validar los datos del formulario
      $request->validate([
        'name' => 'required|max:255'
    ]);  

    // con el confirmed sabe que debe ser igual a password_confirmation del formulario
        $rubro = new Rubro();
        $rubro->name = $request->name;
        $rubro->save();
        return redirect('/rubros')->with('success', 'Post Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rubro  $rubro
     * @return \Illuminate\Http\Response
     */
    public function show(Rubro $rubro)
    {
        return view('admin.rubros.show', ['rubro'=> $rubro]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rubro  $rubro
     * @return \Illuminate\Http\Response
     */
    public function edit(Rubro $rubro)
    {
        return view('admin.rubros.edit', ['rubro'=> $rubro]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rubro  $rubro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rubro $rubro)
    {
        //validar los datos del formulario
        $request->validate([
            'name' => 'required|max:255',
        
        ]);  
        $rubro->name = $request->name;
       //primer email es de la DB el segundo email es del Formunario name='email'
        
        $rubro->save();
        return redirect('/rubros');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rubro  $rubro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rubro $rubro)
    {
        $rubro->delete();
        return redirect('/rubros');
    }
}
