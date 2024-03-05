@extends('layout')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3>Thêm nhân viên</h3>
                </div>
                <div class="col-md-6">
                    <a href="{{route('sinhvien.index')}}">Danh sách nhân viên</a>
                </div>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger text-center">
                    Kiểm tra lại trường dữ liệu
            </div>
        @endif
        <div class="card-body">
            <form action="{{route('sinhvien.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Mã SV</strong>
                            <input type="text" name="MaSV" class="form-control" value="{{old('MaSV')}}" placeholder="Nhập mã sinh viên">
                            @error('MaSV')
                                <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <strong>Họ tên</strong>
                            <input type="text" name="HoTen" class="form-control" value="{{old('HoTen')}}" placeholder="Nhập họ tên sinh viên">
                            @error('HoTen')
                                <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <strong>Ngày sinh</strong>
                            <input type="date" name="NgaySinh" value="{{old('NgaySinh')}}"  class="form-control ">
                            @error('NgaySinh')
                            <span style="color:red">{{$message}}</span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <strong>Giới tính</strong>
                            <select name="GioiTinh" class="form-control">
                                <option disabled {{ old('GioiTinh') == null ? 'selected' : '' }}>Chọn giới tính</option>
                                <option value="Nam" {{ old('GioiTinh') == 'Nam' ? 'selected' : '' }}>Nam</option>
                                <option value="Nữ" {{ old('GioiTinh') == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                            </select>
                            @error('GioiTinh')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <strong>Địa chỉ</strong>
                            <input type="text" name="DiaChi" class="form-control" placeholder="Địa chỉ không được để trống" value="{{old('DiaChi')}}">
                            @error('DiaChi')
                            <span style="color:red">{{$message}}</span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <strong>Số ĐT</strong>
                            <input type="text" name="SoDT" class="form-control" placeholder="Nhập SDT" value="{{old('SoDT')}}">
                            @error('SoDT')
                            <span style="color:red">{{$message}}</span>
                        @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-2">Lưu</button>
            </form>
        </div>
    </div>
</div>