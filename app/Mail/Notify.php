<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Patient;

class Notify extends Mailable
{
    use Queueable, SerializesModels;

    public $datareceived;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->datareceived = $data;
        // $appointment = Appointment::where('id', $this->user_id)->first();
        // $this->patient = Patient::where('id', $appointment->patient_id);
        // $user = User::where('id', $patient->user_id)->first();
        // $this->user = $user;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: ('IIUM@gmail.com'),
            subject: 'Notify',
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
            view: 'app.confirmation',
            with: [
                'data' => $this->datareceived,
            ]
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
