<?php

namespace App\Http\Controllers;
//use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
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
            $user = $req->session()->get('user');
            //$cart->user_id=$req->session()->get('user')['id'];
             $cart->user_id= $user->id;
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
}
