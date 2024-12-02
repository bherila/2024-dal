<?php

namespace App\Listeners;

use App\Services\EmailLogger;
use Illuminate\Mail\Events\MessageSent;
use Symfony\Component\Mime\Email;

class LogSentEmail
{
    protected $emailLogger;

    /**
     * Create the event listener.
     */
    public function __construct(EmailLogger $emailLogger)
    {
        $this->emailLogger = $emailLogger;
    }

    /**
     * Handle the event.
     */
    public function handle(MessageSent $event): void
    {
        $message = $event->message;
        
        // Get recipients and sender
        $to = collect($message->getTo())->map(function($item) {
            return $item->getAddress();
        })->implode(', ');
        
        $from = collect($message->getFrom())->map(function($item) {
            return $item->getAddress();
        })->implode(', ');

        // Get the message body
        $body = '';
        if (method_exists($message, 'getHtmlBody')) {
            $body = $message->getHtmlBody();
        } elseif (method_exists($message, 'getBody')) {
            $body = $message->getBody();
        }

        if (empty($body) && method_exists($message, 'getTextBody')) {
            $body = $message->getTextBody();
        }

        $this->emailLogger->log(
            to: $to,
            from: $from,
            subject: $message->getSubject() ?? '',
            body: (string) $body
        );
    }
}
