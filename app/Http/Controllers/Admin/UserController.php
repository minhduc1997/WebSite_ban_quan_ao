<?php

namespace App\Http\Controllers\Admin;
use  App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\user;

class UserController extends Controller
{
    public function list_user()
    {
        $data['user']=user::paginate(3);
        return view("backend.user.listuser",$data);
    }
    public function add_user(request $request)
    {
       // dd($request->all());
        return view("backend.user.adduser");
    }
    public function post_add_user(UserRequest $request)
    {
        $user = new  user;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->full=$request->full;
        $user->address=$request->address;
        $user->phone=$request->phone;
        $user->level=$request->level;
        $user->save();
        return redirect("/admin/user/")->with('thongbao','Thêm mới thành công');
    }
    public function edit_user($id)
    {

        $data['user']=user::find($id);

        return view("backend.user.edituser",$data);
    }
    public function post_edit_user(request $request,$id)
    {
        // dd( $request->all());
        $user = user::find($id);
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->full=$request->full;
        $user->address=$request->address;
        $user->phone=$request->phone;
        $user->level=$request->level;
        $user->save();
        return redirect("/admin/user/")->with('thongbao','sửa thành công');
        //return view("backend.user.edituser");
    }

    public function del_user($id){
        user::destroy($id);
        return redirect('/admin/user/')->with('thongbao','Đã xóa thành công');


    }
}
