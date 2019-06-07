<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\product;
use App\models\category;
class HomeController extends Controller
{
    public function home()
    {
    //     $data['product_featured']= product::where('featured', '=', 1)->get();
    //     $data['product_new']= product::orderBy('id', 'desc')->paginate(3);
    //     $data['category']= category::all();
    //    return view("frontend.shop",$data);
    }
}
