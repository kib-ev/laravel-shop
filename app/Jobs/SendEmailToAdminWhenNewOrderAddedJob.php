<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailToAdminWhenNewOrderAddedJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $order;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $order = $this->order;

        Mail::send('mails.new-order', ['order' => $order], function ($email) use ($order) {
            $email->from(config('mail.from.address'), config('mail.from.name'));
            $email->to(config('mail.admin.address'));
            $email->subject(__('ui._email.new_order_subject', ['id' => $order->id]));
        });
    }
}
