<?php

namespace App\Http\Controllers;

use App\Models\UniqueUser;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;

class PagesController extends Controller
{


    public function index ()
    {
        //Track users with their IP address
        $user= UniqueUser::where('user_ip', $_SERVER['REMOTE_ADDR'])->first();
        if(is_null( $user)){
            UniqueUser::insert(['user_ip'=> $_SERVER['REMOTE_ADDR']]);
        }
      return view('welcome');
    }



}
