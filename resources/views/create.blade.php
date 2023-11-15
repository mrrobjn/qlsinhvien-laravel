@extends('layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Thêm sinh viên</h3>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="{{ route('sinhvien.index') }}" class="btn btn-primary">Danh sách sinh viên</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('sinhvien.store') }}" method="POST">@csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Mã sinh viên</strong>
                                <input type="text" name="masv" class="form-control" placeholder="Nhập mã sinh viên"
                                    required>
                            </div>
                            <div class="form-group">
                                <strong>Họ tên</strong>
                                <input type="text" name="hoten" class="form-control" placeholder="Nhập họ và tên"
                                    required>
                            </div>
                            <div class="form-group">
                                <strong>Ngày sinh</strong>
                                <input type="date" name="ngaysinh" class="form-control"required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Giới tính</strong>
                                <select class="form-select" name="gioitinh" required>
                                    <option selected>Chọn giới tính</option>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <strong>Địa chỉ</strong>
                                <input type="text" name="diachi" class="form-control" placeholder="Nhập địa chỉ"
                                    required>
                            </div>
                            <div class="form-group">
                                <strong>Số điện thoại</strong>
                                <input type="tel" name="sdt" class="form-control" placeholder="Nhập số điện thoại"
                                    required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Lưu</button>
                </form>
            </div>
        </div>
    </div>
@endsection
