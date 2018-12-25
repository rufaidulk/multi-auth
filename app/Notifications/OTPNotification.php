<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Bitfumes\KarixNotificationChannel\KarixChannel;
use Bitfumes\KarixNotificationChannel\KarixMessage;

class OTPNotification extends Notification
{
    use Queueable;

    protected $email;
    protected $mobile;
    protected $OTP;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($request, $OTP)
    {
        $this->email = $request->email;
        //$this->mobile = $request->mobile;
        $this->otpVia = $request->otpVia;
        $this->OTP = $OTP;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return $this->otpVia == 'viaSms' ? [KarixChannel::class] : ['mail'];
    }

    public function toKarix($notifiable)
    {
        return KarixMessage::create()
                        ->from('+919895554550')
                        ->content("Your OTP for login is {$this->OTP}");
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->markdown('OTP', ['OTP' => $this->OTP]);
                    //->line('The introduction to the notification.')
                    //->action('Notification Action', url('/'))
                    //->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
