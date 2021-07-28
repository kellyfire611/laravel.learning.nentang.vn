<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Mail\ContactMailer;

class FrontendController extends Controller
{
    /** * Action hiển thị view Liên hệ * GET /contact */ 
    public function contact()
    {
        return view('frontend.pages.contact1');
    }

    public function sendMailContactForm(Request $request) 
    {
        // $email = $request->email;
        // $message = $request->message;
        // dd($email, $message);


        $input = $request->all();

        // Lấy mail chuyên gởi (hotro.nentangtoituonglai@gmail.com)
        // => gởi cho quản trị hệ thống
        // với nội dung bao gồm email và lời nhắn đã thu thập được
        Mail::to('phucuong@ctu.edu.vn, nhanvien2@gmail.com')->send(new ContactMailer($input));
    }

    public function thongke() {
        // Hiển thị view Thống kê
        return view('frontend.pages.thongke');
    }

    public function thongke2() {
        return view('frontend.pages.thongke2');
    }
}
