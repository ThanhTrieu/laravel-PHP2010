<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        // goi middleware o day
        // su dung cho toan bo class nay
        // :admin // gia tri tham so cua middleware
        // only chi tac dong vao phuong thuc nao
        // $this->middleware('backend.login:user')->except('demo');
        // $this->middleware('backend.login:user')->only(['index','test']);
    }

    public function index(Request $request)
    {
        $sessionUser = $request->session()->get('adminUsername');
        $age = 20;

        // truyen bien ra ngoai view
        
        // return view('backend.dashboard.index')
        //         ->with('user',$sessionUser)
        //         ->with('age', $age);

        return view('backend.dashboard.index',[
            'user' => $sessionUser,
            'age' => $age
        ]);
    }

    public function test()
    {
        return "This is test dashboard";
    }

    public function demo()
    {
        // trong thu muc resource - trong thu muc views
        // tao thu muc backend - tao thu muc dashboard ben trong
        // tao file co ten la demo.blade.php // template laravel
        return view('backend.dashboard.demo');
    }
}
