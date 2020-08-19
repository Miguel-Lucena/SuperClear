<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\OrderItem;
use PDF;
class CartController extends Controller
{

    public function __construct(){
        if(!\Session::has('cart')) \Session::put('cart', array());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Product $product)
    {
        $cart=\Session::get('cart');
        $product->quantity=1;
        $cart[$product->id]=$product;    
        \Session::put('cart', $cart);
        //return redirect()->route('cart/show');
        return redirect('/cart/show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $cart = \Session::get('cart');
        $total = $this->total();
        return view('cart', ['cart'=> $cart, 'total'=>$total]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product, $quantity)
    {
        $cart = \Session::get('cart');
        $cart[$product->id]->quantity=$quantity;
        \Session::put('cart', $cart);

        return redirect('/cart/show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //dd($product->id);
        $cart = \Session::get('cart');
        unset($cart[$product->id]);
        \Session::put('cart', $cart);

        return redirect('/cart/show');
    }

    public function trash()
    {
        \Session::forget('cart');
        return redirect('/cart/show');
    }

    private function total()
    {
        $cart = \Session::get('cart');
        $total=0;
        foreach($cart as $item){
            $total += $item->price * $item->quantity;
        }

        return $total;
    }


    //Detalle del pedido
    public function orderDetail()
    {
        if(count(\Session::get('cart'))<=0)  return redirect('/');
        $cart = \Session::get('cart');
        $total = $this->total(); 
        return view('cart.order-detail', ['cart'=>$cart, 'total'=>$total]);
    }

    public function registerPago()
    {
        $subtotal = 0;
        $cart = \Session::get('cart');
      //  \Session::forget('cart');
        $shipping = 100;

        foreach($cart as $product){
            $subtotal += $product->quantity * $product->price;
        }
        $order = Order::create([
            'subtotal'=>$subtotal,
            'shipping' => $shipping,
            'user_id'=> \Auth::user()->id

        ]);

        foreach($cart as $product){
            $this->saveOrderItem($product, $order->id);
        }
      //  return redirect('/cart/detail_orders')->with('message', 'Compra exitosa');
           return redirect('/cart/detail_orders/pdf');
    }
    public function saveOrderItem($product, $order_id)
    {
        $detalle=OrderItem::create([
            'price'=>$product->price,
            'quantity'=>$product->quantity,
            'product_id'=>$product->id,
            'order_id'=>$order_id
        ]);

        $productos = Product::all(); 
        foreach($productos as $pro){
            if($pro->id==$product->id){
                $pro->quantity=$pro->quantity-$product->quantity;
            }
            $pro->save();
        }
        //return redirect('/');
    }


    public function showpdf(){
        $cart = \Session::get('cart');
        $factura = Order::orderBy('id', 'desc')->first();
        $total = $this->total(); 
        //dd($cart);
        $pdf = PDF::loadView('cart.pdf', ['factura'=> $factura, 'cart'=>$cart, 'total'=>$total]);
        \Session::forget('cart');
        return $pdf->download('Factura.pdf');
    }
}
