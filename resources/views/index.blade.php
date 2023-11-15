@extends('layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Quản lý sinh viên</h3>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="{{ route('sinhvien.create') }}" class="btn btn-primary">Thêm sinh viên</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('thongbao'))
                    <div class="alert alert-success">
                        {{ Session::get('thongbao') }}
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã sinh viên</th>
                            <th>Họ tên</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Thao tác</th>
                        </tr>
                    <tbody>
                        @foreach ($sinhvien as $sv)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $sv->masv }}</td>
                                <td>{{ $sv->hoten }}</td>
                                <td>{{ $sv->ngaysinh }}</td>
                                <td>{{ $sv->gioitinh }}</td>
                                <td>{{ $sv->diachi }}</td>
                                <td>{{ $sv->sdt }}</td>
                                <td>
                                    <form action="{{ route('sinhvien.destroy', $sv->id) }}" method="post">
                                        <a href="{{ route('sinhvien.edit', $sv->id) }}" class="btn btn-success">Sửa</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
