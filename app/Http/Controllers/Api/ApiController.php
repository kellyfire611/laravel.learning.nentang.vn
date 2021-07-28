<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ApiController extends Controller
{
    public function thongke_top3_sanpham_moinhat() {
        // Eloquent (Model)
        // Sanpham::all();
        // Query builder
        /*

        SELECT * from cusc_sanpham
        order by `sp_taoMoi` desc
        limit 3
        */
        $result = DB::table('cusc_sanpham')
        ->orderBy('sp_taoMoi')
        ->take(3)
        ->get();


        return response()->json(array(
            'code' => 200,
            'result' => $result
        ));
    }

    public function timkiemsanpham(Request $request) {
        // dd($request->all());
        // Lấy thông tin người dùng gởi đến
        $ten = $request->keyword_search_by_tensanpham;
        $giatu = $request->keyword_search_by_giatu;
        $giaden = $request->keyword_search_by_giaden;

        // Tạo câu lệnh mẫu
        $sql = "SELECT * FROM cusc_sanpham WHERE 1=1 ";
        if(!empty($ten)) {
            $sql .= " AND sp_ten LIKE '%$ten%' ";
        }

        if(!empty($giatu)) {
            $sql .= " AND sp_giaBan >= $giatu ";
        }

        if(!empty($giaden)) {
            $sql .= " AND sp_giaBan <= $giaden ";
        }

        // dd($sql);
        $result = DB::select($sql);
        
        // Trả về JSON
        return response()->json(array(
            'code' => 200,
            'result' => $result
        ));

    }



    public function thongke_top3_sanpham_moinhat_v2() {
        $result = [];

        return response()->json(array(
            'code' => 200,
            'result' => $result,
            'msg' => 'VERSION 2'
        ));
    }


//     public function thongke_top3_sanpham_moinhat() {
//         // Sử dụng Query Builder
//         // Query top 3 loại sản phẩm (có sản phẩm) mới nhất
//         $ds_top3_newest_loaisanpham = 
//             DB::table('cusc_sanpham')                                       // SELECT * FROM cusc_sanpham
//             ->join('cusc_loai', 'cusc_loai.l_ma', '=', 'cusc_sanpham.l_ma') // JOIN cusc_loai ON cusc_loai.l_ma = cusc_sanpham.l_ma
//             ->orderBy('l_capNhat')                                          // ORDER BY l_capNhat ASC
//             ->take(3)                                                       // LIMIT 3
//             ->get();                                                        // => execute

        
//         // execute raw sql query
// //         $data = DB::select(<<<EOT
// //         SELECT * 
// //         FROM (
// //             SELECT FROM cusc_sanpham
// //             JOIN cusc_loai ON cusc_loai.l_ma = cusc_sanpham.l_ma
// //             ORDER BY l_capNhat ASC
// //             LIMIT 3
// //         )
// // EOT
// //     );

//         // Trả về dữ liệu theo định dạng JSON format
//         return response()->json(array(
//             'code'  => 200,
//             'result' => $ds_top3_newest_loaisanpham,
//         ));
//     }

    public function danhsach_sanpham() {
        // Sử dụng Query Builder
        // Query top 3 loại sản phẩm (có sản phẩm) mới nhất
        $danhsach_sanpham = DB::table('cusc_sanpham')
            ->get();

        // Trả về dữ liệu theo định dạng JSON format
        return response()->json(array(
            'code'  => 200,
            'result' => $danhsach_sanpham,
        ));
    }
}
