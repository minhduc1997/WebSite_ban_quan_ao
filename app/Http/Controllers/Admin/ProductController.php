<?php

namespace App\Http\Controllers\Admin;
use  App\Http\Requests\AddProductRequest;
use  App\Http\Requests\AddattrRequest;
use  App\Http\Requests\AddVariantRequest;
use  App\Http\Requests\EditAttrRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\product;
use App\models\attribute;
use App\models\values;
use App\models\category;
use App\models\variant;
//use App\models\values;

class ProductController extends Controller
{
    public function list_product()
    {
        //dd(get(product::find(1)->values()->get()));
        $data['products']= product::paginate(5);

        return view("backend.product.listproduct",$data);
    }


    public function add_product()
    {

        $data['attribute']= attribute::all();
        $data['categorys']=category::all();
        return view("backend.product.addproduct",$data);
    }
    //post_add_product
    public function post_add_product(AddProductRequest $request)
    {
        //dd( $request->all());
        $product = new product;
        $product->category_id=$request->category;
        $product->code=$request->product_code;
        $product->name=$request->product_name;
        $product->slug=$request->product_name;
        $product->price=$request->product_price;
        $product->state=$request->product_state;
        $product->featured=$request->product_feature;
        $product->info=$request->info;
        $product->describe=$request->description;
        if($request->hasFile('product_img'))

         {

            $file = $request->product_img;

            $filename= str_random(9).'.'.$file->getClientOriginalExtension();

            $file->move('backend/img', $filename);

            $product->img=$filename;
        }
        else{

            $product->img='no-img.jpg';
        }

        $product->save();
        $mang =array();
        foreach ($request->attr as $values) {
            foreach ($values as $item) {
               $mang[]=$item;
            }
        }
       // dd($mang);
        $product->values()->attach($mang);

         $variant = get_cbn($request->attr);
         //dd( $variant);
         foreach ($variant as $values) {

            $vari = new variant;
            $vari->product_id = $product->id;
            $vari->price = $product->price;
            $vari->save();
            $vari->values()->attach($values);
         }
         //dd($values);
         return redirect('/admin/product/add-variant/'. $product->id);
        // $code = $request->code;
        // echo  $code;
       // return view("backend.product.addproduct");

    }
    public function edit_product(request $request,$id)
    {
        $data['product']=product::find($id);
        $data['category']=category::all();
        $data['attribute']=attribute::all();
        return view("backend.product.editproduct",$data);
    }

    public function post_edit_product(request $request,$id)
    {
        //dd( $request->all());
        $product = product::find($id);
        $product->category_id=$request->category;
        $product->code=$request->product_code;
        $product->name=$request->product_name;
        $product->slug=$request->product_name;
        $product->price=$request->product_price;
        $product->state=$request->product_state;
        $product->featured=$request->product_feature;
        $product->info=$request->info;
        $product->describe=$request->description;
        if($request->hasFile('product_img'))

         {

            $file = $request->product_img;

            $filename= str_random(9).'.'.$file->getClientOriginalExtension();

            $file->move('backend/img', $filename);

            $product->img=$filename;
        }
        else{

            $product->img=$product->img;
        }

        $product->save();
        $mang =array();
        foreach ($request->attr as $values) {
            foreach ($values as $item) {
               $mang[]=$item;
            }
        }
       // dd($mang);
        $product->values()->Sync($mang);

         $variant = get_cbn($request->attr);
        // dd( $variant);
         foreach ($variant as $values) {
            if(check_variant($product,$values)){
                $vari = new variant;
                $vari->product_id = $product->id;
                $vari->price = $product->price;
                $vari->save();
                $vari->values()->Sync($values);

            }

         }
         //dd($values);
         return redirect()->back()->with('thongbao','Đã sửa thành công !');
        // $code = $request->code;
        // echo  $code;
       // return view("backend.product.addproduct");

    }

    public function del_product($id)
    {
        product::destroy($id);
        return redirect()->back()->with('thongbao','Đã xóa thành công !');
    }

    //variant
    public function add_variant($id)
    {
        $data['product']= product::find($id);
        return view("backend.product.addvariant",$data);
    }
    public function post_add_variant(request $request)
    {
        //dd($request->all());
        foreach ($request->variant as $key => $value) {
            $variant = variant::find($key); ;
            //$variant->product_id=$key;
            $variant->price=$value;
            $variant->save();

        }
       return redirect('/admin/product')->with('thongbao','Đã thêm thành công !');

    }

    public function del_variant($id)
    {
        variant::destroy($id);
        return redirect()->back()->with('thongbao','Đã xóa thành công !');
    }

    public function edit_variant(request $request,$id)
    {

        $data['product']= product::find($id);
        return view("backend.product.editvariant",$data);
    }
    //attr
    public function detail_attr()
    {
        $data['attrs'] =attribute::all();
        return view("backend.product.attr",$data);
    }
        //post_add_attr
    public function post_add_attr(AddattrRequest $request)
    {
            $attr = new attribute;
            $attr->name= $request->attr_name;
            $attr->save();
            return redirect()->back()->with('thongbao','Đã thêm thành công'.$attr->name);
    }

    public function edit_attr($id)
    {
        $data['attr_id'] =attribute::find($id);
        return view("backend.product.editattr",$data);
    }

    public function post_edit_attr(EditAttrRequest $request,$id)
    {
        $attr = attribute::find($id);
        $attr->name= $request->attr_name;
        $attr->save();
        return redirect('/admin/product/detail-attr')->with('thongbao','Đã sửa thành công');
    }

    public function del_attr($id)
    {
        attribute::destroy($id);
        return redirect('/admin/product/detail-attr')->with('thongbao','Đã xóa thành công');
    }
    //values

    public function post_add_value(AddVariantRequest $request)
    {
            $values =new values;
            $values->attr_id=$request->attr_id;
            $values->value=$request->value_name;
            $values->save();
            return redirect()->back()->with('thongbao','Đã thêm thành công'.$values->value);
    }

}
