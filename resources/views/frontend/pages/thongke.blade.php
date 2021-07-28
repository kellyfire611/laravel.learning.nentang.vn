{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.master` --}}
@section('title')
Thống kê số liệu Shop Hoa tươi - Sunshine
@endsection

{{-- Thay thế nội dung vào Placeholder `custom-css` của view `frontend.layouts.master` --}}
@section('custom-css')
<style>
  .img-hinhdaidien {
    width: 50px;
    height: 50px;
  }
</style>
@endsection

{{-- Thay thế nội dung vào Placeholder `main-content` của view `frontend.layouts.master` --}}
@section('main-content')


<div class="container">
  <h1 class="text-center">Thống kê Số liệu Shop Hoa Tươi</h1>

  <div>
    <h2>Thống kê về Sản phẩm</h2>

    <div class="card card-info" id="thongke_sanpham" ng-controller="thongKeSanPhamController">
        <div class="card-header">Top 3 sản phẩm mới nhất</div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <td>STT</td>
                <td>Hình đại diện</td>
                <td>Tên sản phẩm</td>
                <td>Giá</td>
              </tr>
            </thead>
            <tbody>
              <tr ng-repeat="sp in danhsach_top3_sanpham_moinhat">
                <td><% $index + 1 %></td>
                <td>
                  <img ng-src="/storage/photos/<% sp.sp_hinh %>" class="img-hinhdaidien"/></td>
                <td><% sp.sp_ten %></td>
                <td><% sp.sp_giaBan | number:0 %></td>
              </tr>
            </tbody>
          </table>
        </div>
    </div>
  </div>
</div>

@endsection


{{-- Thay thế nội dung vào Placeholder `custom-scripts` của view `frontend.layouts.master` --}}
@section('custom-scripts')
<script>
  // Khai báo controller `thongKeSanPhamController`
  app.controller('thongKeSanPhamController', function($scope, $http) {
    // Dữ liệu
    $scope.danhsach_top3_sanpham_moinhat = [];

    // sử dụng service $http của AngularJS để gởi request GET đến route `api.thongke.top3_sanpham_moinhat`
    $http({
        url: "{{ route('api.thongke.top3_sanpham_moinhat') }}",
        method: "GET"
    }).then(function successCallback(response) {
      // Nếu gởi request thành công thì chuyển dữ liệu sang cho AngularJS hiển thị
      $scope.danhsach_top3_sanpham_moinhat = response.data.result;

    }, function errorCallback(response) {
        // Lấy dữ liệu không thành công, thông báo lỗi cho khách hàng biết
        swal('Có lỗi trong quá trình lấy dữ liệu!', 'Vui lòng thử lại sau vài phút.', 'error');
        console.log(response);
    });
  });
</script>
@endsection