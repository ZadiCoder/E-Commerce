<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UserController extends Controller
{
    function login(Request $request){
        $user = DB::table('user')->where(['email'=>$request->email])->first();
        //return $user->password;
        //$user =  User::where(['email'=>$request->email])->first();
        if(!$user || !Hash::check($request->password,$user->password))
        {
            return 'User name and Password not match';
        }
        else
        {
            $request->session()->put('user',$user);
            return redirect('/');
        }
    }
    function register(Request $req)
    {
      //  $users = new User;
       // $users->name = $req->name;
      //  $users->email = $req->email;
      //  $users->password = Hash::make($req->password);
       // $users->save();
      //  return redirect('/login');
    $user = DB::table('user')->insert([
        'name'=> $req->name,
        'email'=> $req->email,
        'password'=>Hash::make($req->password)
    ]);
       
        return redirect('/login');
    }
}
