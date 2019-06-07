<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\{AddCategoryRequest,EditCategoryRequest};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\category;
class CategoryController extends Controller
{
    public function list_category()
    {
        $data['categorys']=category::all();
        return view("backend.category.category",$data);
    }

    function post_add_category(AddCategoryRequest $r)
    {
        $cate=new category;
        $cate->name=$r->name;
        $cate->slug=str_slug($r->name);
        $cate->parent=$r->parent;
        $cate->save();
        return redirect('admin/category')->with('thongbao','Đã thêm thành công');
    }


    public function edit_category($cat_id)
    {

         $data['categorys']=category::all();
    $data['cat']=category::find($cat_id);
     return view("backend.category.editcategory",$data);
    }

    function post_edit_category(EditCategoryRequest $r,$cat_id)
    {
        $cat=category::find($cat_id);
        $cat->name=$r->name;
        $cat->slug=str_slug($r->name);
        $cat->parent=$r->parent;
        $cat->save();
        return redirect()->back()->with('thongbao','Đã sửa thành công.');
    }
    function del_category($cat_id)
    {
        category::destroy($cat_id);
        return redirect('admin/category')->with('thongbao','Đã xoá thành công!');
    }
}
