<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

use App\Models\Users;

class Subscriber extends Mailable
{
    use Queueable, SerializesModels;
     /**
     * The order instance.
     *
     * @var \App\Models\Users
     */
    //protected $email;
    // protected $name;
    // protected $city;
    protected $user;
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Users $user)
    {
        //$this->email = $email;
        // $this->name = $name;
        // $this->city = $city;
        $this->user = $user;
    }
    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address('nguyen.thi.huyen@ethan-tech.jp', 'グエンフエン'),
            subject: '名前と国名のメッセージのお知らせ',
        );
    }
    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'clients.users.kadai3.subscribers',
            with: [
                'name' => $this->user->name,
                'city' => $this->user->city,
            ],
        );
    }
    
    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
