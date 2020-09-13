<?php

namespace App\Http\Controllers;

use App\Provider;
use App\Province;
use App\Town;
use Illuminate\Http\Request;

class ProvidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::orderBy('id', 'desc')->get();
        return view('admin.providers.index', ['providers'=>$providers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        if($request->ajax()){
            $province = Province::where('id', $request->province_id)->first();
            $towns = $province->towns;

            return $towns;
        }
        $provinces = Province::all();
        
        return view('admin.providers.create', ['provinces' => $provinces]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //dd($request->twno);
        $request->validate([
            'name' => 'required|max:255',
            'business_name' => 'required|max:255',
            'cuit' => 'required|numeric',
            'phone_number' => 'required|numeric',
            'adress' => 'required|max:255',
            ]);

        $provider = new Provider();
        $provider->name = $request->name;
        $provider->business_name = $request->business_name;
        $provider->cuit = $request->cuit;
        $provider->phone_number = $request->phone_number;
        $provider->adress = $request->adress;

        if($request->twno!=null){
            $provider->town_id=$request->twno;
            $provider->save();
        }
        return redirect('/providers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        
        $provinces = Province::get();
        $provider_province= Province::where('id', $provider->town->province_id)->first();
        //dd($provider_province->name);
        $towns= Town::get();
        return view('admin.providers.edit', ['provider'=> $provider, 'towns'=>$towns, 'provinces'=>$provinces, 'provider_province'=>$provider_province]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provider $provider)
    {
        //dd($request);
        $request->validate([
            'name' => 'required|max:255',
            'business_name' => 'required|max:255',
            'cuit' => 'required|numeric',
            'phone_number' => 'required|numeric',
            'adress' => 'required|max:255',
            ]);


            $provider->name = $request->name;
            $provider->business_name = $request->business_name;
            $provider->cuit = $request->cuit;
            $provider->phone_number = $request->phone_number;
            $provider->adress = $request->adress;
           //primer email es de la DB el segundo email es del Formunario name='email'
           if($request->town!=null){
            $provider->town_id=$request->town;
            $provider->save();
            }

            return redirect('/providers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();
        return redirect('/providers');
    
    }
}
