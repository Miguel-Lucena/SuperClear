<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //traer los posts
       
        $products = Product::orderBy('id', 'desc')->simplePaginate(10);
     
   

        return view('welcome', ['products'=>$products]);
     
    //$products = Product::where('rubro_id','=' ,4)->simplePaginate(3);
    //return view('welcome', ['posts'=>$posts, 'products'=>$products]);
    
    }

        //para buscar el post asi poder mostrarlo en otra ventana
  
    public function productshow($id){
    
        $product =Product::find($id);
        return view('/productshow', ['product'=> $product]);
    }
}
