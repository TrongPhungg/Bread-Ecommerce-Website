<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function index()
    {   
        $template = 'admin.user.index';
        $data = User::orderBy('id', 'asc')->paginate(5);
        return view('admin.layout', compact('template', 'data'));
    }

    public function create()
    {
        $template = 'admin.user.create';
        return view('admin.layout', compact('template'));
    }

    public function store(Request $request)
    {
            $messages = [
                'id.required' => 'Vui lòng nhập ID',
                'id.unique' => 'ID đã tồn tại trong hệ thống',
                'name.required' => 'Vui lòng nhập tên',
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Email không đúng định dạng',
                'email.unique' => 'Email đã tồn tại trong hệ thống',
                'password.required' => 'Vui lòng nhập mật khẩu',
                'password.min' => 'Mật khẩu phải có ít nhất :min ký tự',
            ];

            $request->validate([
                'id' => 'required|unique:users',
                'name' => 'required',
                'email' => 'required|email:rfc,dns|regex:/^[a-zA-Z0-9]+@.*$/|unique:users',
                'password' => 'required|min:3',
                'address' => 'nullable',
                'birthday' => 'nullable|date',
                'role' => 'required|in:0,1'
            ], $messages);

            $user = new User();
            $user->id = $request->id;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->address = $request->address;
            $user->birthday = $request->birthday;
            $user->role = $request->role;
            $user->save();

           return redirect('/user')->with('create_success', 'Thêm người dùng thành công');
    }

    public function edit($id)
    {
        $template = 'admin.user.edit';
        $user = User::findOrFail($id);
        return view('admin.layout', compact('template', 'user'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'id.required' => 'Vui lòng nhập ID',
            'id.unique' => 'ID đã tồn tại trong hệ thống',
            'name.required' => 'Vui lòng nhập tên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại trong hệ thống',
            'password.min' => 'Mật khẩu phải có ít nhất :min ký tự',
        ];

        $rules = [
            'id' => 'required|unique:users,id,'.$id,
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable|min:3',
            'address' => 'nullable',
            'birthday' => 'nullable|date',
            'role' => 'required|in:0,1'
        ];

        $request->validate($rules, $messages);

        $user = User::findOrFail($id);
        $user->id = $request->id;
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->address = $request->address;
        $user->birthday = $request->birthday;
        $user->role = $request->role;
        $user->save();

        return redirect('/user')->with('edit_success', 'Cập nhật người dùng thành công');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        if(Auth::id() == $id) {
            return redirect('/user')->with('delete_error', 'Không thể xóa tài khoản đang đăng nhập');
            }
        $user->delete();
        return redirect('/user')->with('delete_success', 'Xóa người dùng thành công');
    }
}