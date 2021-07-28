{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.master` --}}
@section('title')
Liên hệ Shop Hoa tươi - Sunshine
@endsection

{{-- Thay thế nội dung vào Placeholder `custom-css` của view `frontend.layouts.master` --}}
@section('custom-css')
@endsection

{{-- Thay thế nội dung vào Placeholder `main-content` của view `frontend.layouts.master` --}}
@section('main-content')


<div class="container">
  <h1>{{ __('sunshine.welcome') }}</h1>

  <form name="frmContact" id="frmContact" method="post" action="{{ route('frontend.pages.contact.sendMail') }}">
    {{ csrf_field() }}
    {{ __('sunshine.email') }}
    <input type="email" name="email" class="form-control" /><br />
    Nội dung:
    <textarea name="message" class="form-control"></textarea><br />

    <button class="btn btn-primary">Gởi</button>
  </form>
</div>

@endsection


{{-- Thay thế nội dung vào Placeholder `custom-scripts` của view `frontend.layouts.master` --}}
@section('custom-scripts')

@endsection