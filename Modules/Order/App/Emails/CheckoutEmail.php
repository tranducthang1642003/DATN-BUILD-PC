<?php

namespace Modules\Order\App\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Order\Entities\Orders;

class CheckoutEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     *
     * @param Orders $order
     */
    public function __construct(Orders $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): self
    {
        return $this->view('emails.checkout_confirmation')
                    ->subject('Xác nhận đơn hàng của bạn')
                    ->with([
                        'order' => $this->order,
                    ]);
    }
}
