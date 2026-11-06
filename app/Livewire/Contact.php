<?php

namespace App\Livewire;

use App\Models\Inquiry;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class Contact extends Component
{
    public $name = '';
    public $email = '';
    public $phone = '';
    public $subject = 'General Inquiry';
    public $message = '';
    public $success_message = false;

    public function mount()
    {
        $service = request()->query('service') ?? request()->query('subject');
        if ($service) {
            $this->subject = 'Inquiry for ' . urldecode($service);
        }
    }

    protected $rules = [
        'name' => 'required|min:2|max:100',
        'email' => 'required|email|max:100',
        'phone' => 'required|min:5|max:25',
        'message' => 'required|min:5|max:1000',
    ];

    public function submit()
    {
        $this->validate();

        Inquiry::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'message' => ($this->subject ? "[Subject: {$this->subject}]\n" : "") . $this->message,
        ]);

        try {
            $toEmail = env('CONTACT_FORM_TO_ADDRESS', 'rosnaghemoshu18@gmail.com');
            $custName = $this->name;
            $custEmail = $this->email;
            $custPhone = $this->phone;
            $custSubject = $this->subject ?: 'General Inquiry';
            $custMsg = $this->message;

            Mail::raw(
                "New Contact Form Submission from Journey Begins Website!\n\n" .
                "Name: {$custName}\n" .
                "Email: {$custEmail}\n" .
                "Phone: {$custPhone}\n" .
                "Subject: {$custSubject}\n\n" .
                "Message:\n{$custMsg}\n\n" .
                "Submitted At: " . now()->format('Y-m-d H:i:s'),
                function ($mailMessage) use ($toEmail, $custName) {
                    $mailMessage->to($toEmail)
                        ->subject("Website Contact Form: {$custName}");
                }
            );
        } catch (\Throwable $e) {
            Log::error('Contact Form Mail dispatch failed: ' . $e->getMessage());
        }

        $this->reset(['name', 'email', 'phone', 'message']);
        $this->subject = 'General Inquiry';
        $this->success_message = true;
    }

    public function render()
    {
        return view('livewire.contact')
            ->layout('components.layouts.app', ['title' => 'Contact Us - Journey Begins Car Rental']);
    }
}
