<?php

namespace App\Http\Controllers;

use App\Models\Sinhvien;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SinhVienController2 extends Controller
{
    public function show(Request $request)
    {
        $sinhvien = Sinhvien::paginate(5);

        return response()->json(
            $sinhvien,
            200
        );
    }
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'masv' => 'required|unique:sinhviens',
            'hoten' => 'required|string',
            'ngaysinh' => 'required|date_format:Y-m-d',
            'gioitinh' => 'required|in:Nam,Nữ',
            'diachi' => 'required|string',
            'sdt' => 'required|string|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $validatedData = $validator->validated();
            Sinhvien::create($validatedData);
            return response()->json([
                'message' => 'Them sinh vien thanh cong',
            ], 201);
        }
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'masv' => 'unique:sinhviens',
            'hoten' => 'string',
            'ngaysinh' => 'date_format:Y-m-d',
            'gioitinh' => 'in:Nam,Nữ',
            'diachi' => 'string',
            'sdt' => 'string|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $validatedData = $validator->validated();

            $sinhvien = Sinhvien::find($id);

            if (!$sinhvien) {
                return response()->json(['message' => 'Khong tim thay sinh vien'], 422);
            } else {
                $sinhvien->update($validatedData);
                return response()->json([
                    'message' => 'Cap nhat sinh vien ' . $id . ' thanh cong',
                ], 201);
            }
        }
    }
    public function delete(Request $request,Sinhvien $sinhvien,$id)
    {
        $sinhvien = Sinhvien::find($id);
        $sinhvien->delete($request->all());
        return response()->json([
            'message' => 'Xoa sinh vien thanh cong',
        ], 201);
    }
}
