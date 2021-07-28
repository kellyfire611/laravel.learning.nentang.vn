<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Loai;

class LoaiController extends Controller
{
    public function index()
    {
        // Sử dụng Eloquent Model để truy vấn dữ liệu
        // $dsLoai = Loai::all(); // SELECT * FROM loaisanpham

        // SELECT * FROM sanpham LIMIT 0,5     -> page 1
        // SELECT * FROM sanpham LIMIT 5,10    -> page 2
        // SELECT * FROM sanpham LIMIT 10,15    -> page 3...
        $dsLoai = Loai::paginate(3); // 1 trang có 3 records

        // Đường dẫn đến view được quy định như sau: <FolderName>.<ViewName>
        // Mặc định đường dẫn gốc của method view() là thư mục `resources/views`
        // Hiển thị view `backend.loai.index`
        return view('backend.loai.index')
            // với dữ liệu truyền từ Controller qua View, được đặt tên là `danhsachloaisanpham`
            ->with('danhsachloaisanpham', $dsLoai);
    }
}
