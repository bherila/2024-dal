<?php

namespace App\Services;

use App\Models\EmailLog;

class EmailLogger
{
    public function log(string $to, string $from, string $subject, string $body, string $status = 'sent'): EmailLog
    {
        return EmailLog::create([
            'to_email' => $to,
            'from_email' => $from,
            'subject' => $subject,
            'body' => $body,
            'status' => $status
        ]);
    }
}
