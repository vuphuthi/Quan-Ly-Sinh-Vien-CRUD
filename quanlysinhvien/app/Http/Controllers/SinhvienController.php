<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sinhvien;
use App\Http\Requests\SinhvienRequest;
class SinhvienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sinhvien = Sinhvien::paginate(5);
        return view('index',compact('sinhvien'))->with('i',(request()->input('page',1)-1)*5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SinhvienRequest $request)
    {
        // $rules=[
        //     'MaSV' => 'required|min:6',
        //     'HoTen' => 'required|max:12',
        //     'NgaySinh' => ['required', 'date'],
        //     'GioiTinh' => ['required', 'in:Nam,Nữ'],
        //     'DiaChi' => 'required|max:30',
        //     'SoDT' => 'required|min:10',
        // ];
        // $message=[
        //     'MaSV.required' => 'Mã SV không được để trống',
        //     'MaSV.min' => 'Mã sinh viên không được nhỏ hơn :min ký tự',
        //     'HoTen.required' => 'Họ tên không được để trống',
        //     'NgaySinh.required' => 'Ngày sinh không được để trống',
        //     'GioiTinh.required' => 'Giới tính không được để trống',
        //     'GioiTinh.required' => 'Giới tính không được để trống',
        //     'DiaChi.required' => 'Địa chỉ không được để trống',
        //     'DiaChi.max' => 'Địa chỉ không quá 30 ký tự',
        //     'HoTen.required' => 'Họ tên không được để trống',
        //     'SoDT.required' => 'SDT không được để trống',
        //     'SoDT.min' => 'SDT không nhỏ hơn :min số',

        // ];
        // $request->validate($rules,$message);
        Sinhvien::create($request->all());
        return redirect()->route('sinhvien.index')->with('thongbao','Thêm sinh viên thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sinhvien $sinhvien)
    {
        return view('edit',compact('sinhvien'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sinhvien $sinhvien)
    {
        $sinhvien->update($request->all());
        return redirect()->route('sinhvien.index')->with('thongbao','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sinhvien $sinhvien)
    {
        $sinhvien->delete();
        return redirect()->route('sinhvien.index')->with('thongbao','Xóa thành công');
    }
}
