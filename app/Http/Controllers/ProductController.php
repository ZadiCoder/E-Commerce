<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
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
}
