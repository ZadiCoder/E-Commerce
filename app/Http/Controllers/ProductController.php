<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Session;

class ProductController extends Controller
{
    function index(){
        $data = Product::all();
        return View('product',['products'=>$data]);
    } 
    function details($id){
        $data = Product::find($id);
        return View('details',['products'=>$data]);
    }
    function addToCart(Request $req){
        if($req->session()->has('user'))
        {
            $cart = new Cart;
           // $user = $req->session()->get('user');
           //$cart->user_id=$req->session()->get('user')['id'];

            $cart->user_id=$req->session()->get('user')->id;
            // $cart->user_id= $user->id;
            $cart->product_id=$req->product_id;
            $cart->save();
           return redirect('/');
         
        }
        else
        {
            return redirect('/login');
        }
    }
    static function cartItem()
    {
        $user = Session::get('user');
        $userId = $user->id;
        return Cart::where('user_id',$userId)->count();        
    }
    function cartList()
    {
        $userId = Session::get('user')->id;
        $products = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id')
        ->get();
        return view('cartlist',['products'=>$products]);
    }
    function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('cartlist');
    }
    function orderNow()
    {
        $userId = Session::get('user')->id;
        $total =  DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->sum('products.price');
        return view('ordernow',['total'=>$total]);  
    }
}
