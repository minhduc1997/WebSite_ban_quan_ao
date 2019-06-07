<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\product;
use App\models\category;
use App\models\attribute;
use App\models\values;
use Cart;
class SearchController extends Controller
{
    public function search(request $request)
    {
        if($request->cat_id){
            $data['product_featured']= category::find($request->cat_id)->product()->paginate(6);

        }
        elseif($request->start||$request->end){
            $data['product_featured']= product::whereBetween('price',[$request->start,$request->end])->paginate(6);

        }
        elseif($request->attr){
           $data['product_featured']= values::find($request->attr)->product()->paginate(6);
           //dd($data['product_featured']);
        }
        else{

            $data['product_featured']= product::paginate(6);

        }

         //$data['product_new']= product::orderBy('id', 'desc')->paginate(3);

        $data['category']= category::all();
        $data['attribute']=attribute::all();
       return view("frontend.shop",$data);
    }

    function detail($id){
        $data['product']=product::find($id);
        //$data['values']=product::find($id)->values()->get();
       //dd($data['product']);

        return view("frontend.detail",$data);
    }
    //cart
    function cart(request $request){

        dd($request->all());
        $product=product::find($request->id_product);
       // dd($product);
        Cart::add(['id' => $product->id, 'name' => $product->name, 'qty' => $request->quantity, 'price' => 9.99, 'options' => ['size' => 'large']]);
        return view("frontend.detail");
    }
}
