<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginPostRequest;

class LoginController extends Controller
{
    public function index()
    {
        return view('backend.login.index');
    }

    public function handleLogin(LoginPostRequest $request)
    {
        // Request $request: nhan toan bo request du lieu gui len
        // $data = $request->all();
        $username = $request->input('email');
        $password = $request->input('password');

        // kiem tra account ton tai hay ko ?
        // lien quan den database
        if($username === 'admin@gmail.com' && $password === '123456789') {
            // login thanh cong

            // luu thong tin nguoi dung vao session
            $request->session()->put('adminUsername', $username);
            // $_SESSION['adminUsername'] =  $username;

            // di vao trang quan tri admin(dashboard)
            return redirect()->route('admin.dashboard');

        } else {
            // login khong thanh cong : tai khoan ko dung
            // with : tao session flash ==> hien thi thong bao
            return redirect()->route('admin.login')->with('statusLogin', 'Account invalid');
        }
    }

    public function logout()
    {
        return 'logout';
    }
}
