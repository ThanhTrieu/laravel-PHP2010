<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginPostRequest;
use Illuminate\Support\Facades\DB; // su dung database

class LoginController extends Controller
{
    public function index()
    {
        // $data = DB::table('admins')->get();
        // std class object - khong phai mang
        // select * from admins
        // dd($data); // var_dump + die;
        // foreach($data as $key => $item) {
        //     echo $item->id;
        // }
        // die;
        return view('backend.login.index');
    }

    public function handleLogin(LoginPostRequest $request)
    {
        // Request $request: nhan toan bo request du lieu gui len
        // $data = $request->all();
        $username = $request->input('email');
        $password = $request->input('password');

        $dataAdminLogin = DB::table('admins')
                            ->where([
                                'email' => $username,
                                'password' => $password,
                                'status' => 1
                            ])
                            ->where('role', '>', -5)
                            // ->where('username','>=',$username)
                            // ->where('password', $password)
                            // ->where('status', 1)
                            ->first(); // lay ra 1 dong du lieu
                            // ->get(); // lay ta ca data

        // kiem tra account ton tai hay ko ?
        // lien quan den database
        if( isset($dataAdminLogin->id)
            && isset($dataAdminLogin->username)
            && !empty($dataAdminLogin->username)
        ) {
            // login thanh cong

            // luu thong tin nguoi dung vao session
            $request->session()->put('adminUsername', $dataAdminLogin->username);
            $request->session()->put('idAdmin', $dataAdminLogin->id);
            $request->session()->put('emailAdmin', $dataAdminLogin->email);
            $request->session()->put('roleAdmin', $dataAdminLogin->role);
            // $_SESSION['adminUsername'] =  $username;

            // di vao trang quan tri admin(dashboard)
            return redirect()->route('admin.dashboard');

        } else {
            // login khong thanh cong : tai khoan ko dung
            // with : tao session flash ==> hien thi thong bao
            return redirect()->route('admin.login')->with('statusLogin', 'Account invalid');
        }
    }

    public function logout(Request $request)
    {
        // xoa session tung session
        // $request->session()->forget('adminUsername');

        // xoa toan bo session
        $request->session()->flush();

        // quay ve trang login
        return redirect()->route('admin.login');

    }
}
