<?php

namespace App\Http\Controllers;

use App\Product;
use App\Rubro;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('admin.products.index', ['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $rubros = Rubro::all(); 
        return view('admin.products.create', ['rubros'=>$rubros]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //dd($request);
           //validar los datos del formulario
           $request->validate([
            'name' => 'required|max:255',
            'image' => 'image',
            'description' => 'required|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'view' => 'required'
            ]);
            
               // para poder traer la imagen
       $fielNameWhitTheExtension = request('image')->getClientOriginalName();
       //para saber el nombre del archivo
       $fileName = pathinfo($fielNameWhitTheExtension, PATHINFO_FILENAME);
       // para saber la extension de la imagen
       $extension = request('image')->getClientOriginalExtension();
       //crear un nuevo nombre para guardar la imagen
       $newfilename= $fileName . '_' . time() . '.' . $extension;
       //para guardar la imagen
       // dd($newfilename);
       $path = request('image')->storeAs('/public/images/products_images', $newfilename);


    // con el confirmed sabe que debe ser igual a password_confirmation del formulario
        $product = new Product();
        $product->name = $request->name;
        $product->image_product_url = $newfilename;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity=$request->quantity;
       // $product->rubro_id=$request->rubro;
       
        //$product->save();

        if($request->rubro!=null && $request->view!=null){
            $product->rubro_id=$request->rubro;
            $product->view = $request->view;
            $product->save();
        }
        
        return redirect('/products')->with('success', 'Post Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $rubros = Rubro::get();
        $product_rubro = $product->rubro;
       //dd($product_rubro);
        return view('admin.products.edit', ['product'=> $product, 'rubros'=>$rubros, 'product_rubro'=> $product_rubro]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
         //validar los datos del formulario
         $request->validate([
            'name' => 'required|max:255',
            'image' => 'required|image',
            'description' => 'required|max:255',
            'price' => 'required|numeric',
            'quantity'=>'required|integer',
            'view' => 'required'
        ]);  

        // para poder traer la imagen
       $fielNameWhitTheExtension = request('image')->getClientOriginalName();
       //para saber el nombre del archivo
       $fileName = pathinfo($fielNameWhitTheExtension, PATHINFO_FILENAME);
       // para saber la extension de la imagen
       $extension = request('image')->getClientOriginalExtension();
       //crear un nuevo nombre para guardar la imagen
       $newfilename= $fileName . '_' . time() . '.' . $extension;
       //para guardar la imagen
       $path = request('image')->storeAs('/public/images/products_images', $newfilename);



        $product->name = $request->name;
        $product->image_product_url = $newfilename;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity=$request->quantity;
       //primer email es de la DB el segundo email es del Formunario name='email'
       if($request->rubro!=null && $request->view!=null){
        $product->rubro_id=$request->rubro;
        $product->view=$request->view;
        $product->save();
    }
        $product->save();
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    /*
    public function destroy(Request $request)
    {

     //   Product $product
        
         dd($request);
       $product = Product::find($request->product_id);
       //dd($product->image_product_url);
       //para borrar la imagen
       $oldImage = public_path(). '/storage/images/products_images/' . $product->image_product_url;
       if(file_exists($oldImage)){
            unlink($oldImage);
       }//fin de imagen borrada

       $product->delete();
       return redirect('/products');
    }
*/
    public function destroy(Product $product)
    {
        //dd($product);
          //para borrar la imagen
       $oldImage = public_path(). '/storage/images/products_images/' . $product->image_product_url;
       if(file_exists($oldImage)){
            unlink($oldImage);
       }//fin de imagen borrada
        $product->delete();
        return redirect('/products');
    }
}
