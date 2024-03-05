<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SinhvienRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'MaSV' => 'required|min:6',
            'HoTen' => 'required|max:12',
            'NgaySinh' => ['required', 'date'],
            'GioiTinh' => ['required', 'in:Nam,Nữ'],
            'DiaChi' => 'required|max:30',
            'SoDT' => 'required|min:10|unique:sinhviens,SoDT',
        ];
    }
    public function messages()
    {
        return [
            'MaSV.required' => ':attribute không được để trống',
            'MaSV.min' => 'Mã sinh viên không được nhỏ hơn :min ký tự',
            'HoTen.required' => 'Họ tên không được để trống',
            'NgaySinh.required' => 'Ngày sinh không được để trống',
            'GioiTinh.required' => 'Giới tính không được để trống',
            'GioiTinh.required' => 'Giới tính không được để trống',
            'DiaChi.required' => 'Địa chỉ không được để trống',
            'DiaChi.max' => 'Địa chỉ không quá 30 ký tự',
            'HoTen.required' => 'Họ tên không được để trống',
            'SoDT.required' => 'SDT không được để trống',
            'SoDT.min' => 'SDT không nhỏ hơn :min số',
            'SoDT.unique' => 'Số điện thoại đã tồn tại trong hệ thống.',
        ];
    }
    public function attributes()
    {
        return [
            'MaSV' => 'Mã SV',
        ];
    }
}
