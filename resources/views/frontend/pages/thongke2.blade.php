{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.master` --}}
@section('title')
Thống kê Shop Hoa tươi - Sunshine
@endsection

{{-- Thay thế nội dung vào Placeholder `custom-css` của view `frontend.layouts.master` --}}
@section('custom-css')
<style>
    .hinhdaidien {
        width: 80px;
        height: 80px;
    }
</style>
@endsection

{{-- Thay thế nội dung vào Placeholder `main-content` của view `frontend.layouts.master` --}}
@section('main-content')


<div class="container">
  <h1>Thông kế số liệu</h1>

    <div class="card" ng-controller="thongKeSanPhamController">
        <div class="card-header">
            Top 3 sản phẩm mới nhất
            <% tieudebaocao %>
        </div>
        <div class="card-body">
           <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Hình</th>
                    <th>Tên</th>
                    <th>Giá</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="sp in danhsachsanpham">
                    <td>1</td>
                    <td>
                        <img ng-src="/storage/photos/<% sp.sp_hinh %>" class="hinhdaidien" />
                    </td>
                    <td><% sp.sp_ten %></td>
                    <td><% sp.sp_giaBan | number %></td>
                </tr>
            </tbody>
           </table>
        </div>
    </div>


    <h2>Tìm kiếm sản phẩm</h2>
    <div ng-controller="timKiemSanPhamController">
        Tên sản phẩm: <input type="text" name="keyword_search_by_tensanpham" id="keyword_search_by_tensanpham" class="form-control" /><br />
        Giá từ: <input type="text" name="keyword_search_by_giatu" id="keyword_search_by_giatu" class="form-control" /><br />
        Giá đến: <input type="text" name="keyword_search_by_giaden" id="keyword_search_by_giaden" class="form-control" /><br />
        <button type="button" name="btnTimKiem" id="btnTimKiem" class="btn btn-primary" ng-click="timkiem()">Tìm kiếm</button>

        Kết quả tìm được
        <ul>
            <li ng-repeat="sp in ketquatimduoc">
                <% sp.sp_ten %> - <% sp.sp_giaBan %>
            </li>
        </ul>
    </div>
</div>

@endsection


{{-- Thay thế nội dung vào Placeholder `custom-scripts` của view `frontend.layouts.master` --}}
@section('custom-scripts')
<script>
app.controller('thongKeSanPhamController', function($scope, $http) {
    $scope.tieudebaocao = 'Hello, báo cáo top 3 sản phẩm';
    $scope.danhsachsanpham = []; //array object js

    $http({
        url: "{{ route('api.thongke.top3_sanpham_moinhat') }}",
        method: "GET"
    }).then(function successCallback(response) {
        $scope.danhsachsanpham = response.data.result;

    }, function errorCallback(response) {
        alert('vui lòng thử lại sau...');
    });

});

app.controller('timKiemSanPhamController', function($scope, $http) {
    $scope.ketquatimduoc = [];
    $scope.timkiem = function() {
        debugger;
        var sendData = {
            keyword_search_by_tensanpham: $('#keyword_search_by_tensanpham').val(),
            keyword_search_by_giatu: $('#keyword_search_by_giatu').val(),
            keyword_search_by_giaden: $('#keyword_search_by_giaden').val()
        };

        // Nếu là GET thì tham số trên thanh địa chỉ URL
        //http://laravel.learning.nentang.vn/api/sanpham/timkiem?keyword_search_by_tensanpham=ten&keyword_search_by_giatu=1600000

        
        var url = "{{ route('api.sanpham.timkiem') }}";
        url += '?keyword_search_by_tensanpham=' + sendData.keyword_search_by_tensanpham;
        url += '&keyword_search_by_giatu=' + sendData.keyword_search_by_giatu;
        url += '&keyword_search_by_giaden=' + sendData.keyword_search_by_giaden;

        $http({
            url: url,
            method: "GET",
            // data: JSON.stringify(sendData) // Nếu là POST thì data: JSON
        }).then(function successCallback(response) {
            $scope.ketquatimduoc = response.data.result;

        }, function errorCallback(response) {

        });
    };

})
</script>
@endsection