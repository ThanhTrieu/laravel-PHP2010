<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostBrand;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function index()
    {
        $dataBrands = DB::table('brands')->get();
        return view('backend.brand.index',[
            'brands' => $dataBrands
        ]);
    }

    public function add()
    {
        return view('backend.brand.add');
    }

    public function handleAdd(StorePostBrand $request)
    {
        $nameBrand = $request->input('nameBrand');
        $addBrand = $request->input('addBrand');
        $descBrand = $request->input('descBrand');

        // upload logo
        // check xem co upload ko ?
        // $nameLogo = null;
        $pathLogo = null;
        if($request->hasFile('logoBrand')){
            if($request->file('logoBrand')->isValid()){

                $pathLogo = $request->file('logoBrand')->getClientOriginalName();
                $dateCreate = date('Y-m-d H:i:s');
                $timeCreate = strtotime($dateCreate);
                $pathLogo = $timeCreate.'-'.$pathLogo;
                // tien hanh upload

                // anh day vao thu muc storage
                // $pathLogo = $request->file('logoBrand')->store('images');

                // anh day vao thu muc public
                $request->file('logoBrand')->move('storage/images', $pathLogo);
            }
        }
        
        if($pathLogo !== null) {
            // insert database
            $insert = DB::table('brands')->insert([
                'name' => $nameBrand,
                'address' => $addBrand,
                'description' => $descBrand,
                'logo' => $pathLogo,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null
            ]);
            if($insert){
                return redirect()->route('admin.brand');
            } else {
                return redirect()->route('admin.add.brand',['state' => 'error']);
            }
        } else {
            return redirect()->route('admin.add.brand',['state' => 'fail']);
        }
    }

    public function deleteBrand(Request $request)
    {
        if($request->ajax()) {
            // check ajax
            $id = $request->id;
            $id = is_numeric($id) ? $id : 0;
            if($id > 0){    
                $del = DB::table('brands')->where('id',$id)->delete();
                if($del){
                    return response()->json([
                        'cod' => 200,
                        'mess' => 'delete success'
                    ]);
                } else {
                    return response()->json([
                        'cod' => 500,
                        'mess' => 'Error delete'
                    ]);
                }
            } else {
                return response()->json([
                    'cod' => 404,
                    'mess' => 'Error param id'
                ]);
            }
        }
        
    }
}
