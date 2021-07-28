{{-- View này sẽ kế thừa giao diện từ `backend.layouts.index` --}}
@extends('backend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `backend.layouts.index` --}}
@section('title')
Danh sách Loại sản phẩm
@endsection

{{-- Thay thế nội dung vào Placeholder `content` của view `backend.layouts.index` --}}
@section('content')
<!-- Đây là div hiển thị Kết quả (thành công, thất bại) sau khi thực hiện các chức năng Thêm, Sửa, Xóa.
- Div này chỉ hiển thị khi trong Session có các key `alert-*` từ Controller trả về. 
- Sử dụng các class của Bootstrap "danger", "warning", "success", "info" để hiển thị màu cho đúng với trạng thái kết quả.
-->
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
</div>

<!-- Tạo nút Thêm mới sản phẩm 
- Theo quy ước, các route đã được đăng ký trong file `web.php` đều phải được đặt tên để dễ dàng bảo trì code sau này.
- Đường dẫn URL là đường dẫn được tạo ra bằng route có tên `danhsachloaisanpham .create`
- Sẽ có dạng http://tenmiencuaban.com/admin/danhsachloaisanpham /create
-->
<a href="{{ route('loai.create') }}" class="btn btn-primary">Thêm mới sản phẩm</a>

<!-- Tạo table hiển thị danh sách các sản phẩm -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Mã</th>
            <th>Tên</th>
        </tr>
    </thead>
    <tbody>
        <!-- Sử dụng vòng lặp foreach để duyệt qua các sản phẩm 
        - Biến $danhsachloaisanpham  là biến được truyền qua từ action `index()` trong controller SanPhamController.
        -->
        @foreach($danhsachloaisanpham  as $lsp)
            <tr>
                <td>{{ $lsp->l_ma }}</td>
                <td>{{ $lsp->l_ten }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $danhsachloaisanpham->links() }}
@endsection