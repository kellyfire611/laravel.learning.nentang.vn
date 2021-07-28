<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMailer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Tạo biến chứa dữ liệu dùng để render email template
     */
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        // email của khách
        // và nội dung lời nhắn của khách
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $emailcuakhach = $this->data['email'];
        return $this->from('hotro.nentangtoituonglai@gmail.com', 'Hệ thống gởi mail tự động của Sunshine')
            ->subject('Có khách hàng nào đó mới liên hệ...')
            ->view('emails.contact-email')
            ->with('data', $this->data);
    }
}
