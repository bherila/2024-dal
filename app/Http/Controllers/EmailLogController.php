<?php

namespace App\Http\Controllers;

use App\Models\EmailLog;
use Illuminate\Http\Request;

class EmailLogController extends Controller
{
    public function index()
    {
        $logs = EmailLog::latest()
            ->paginate(20);

        return view('email-logs.index', compact('logs'));
    }

    public function show(EmailLog $emailLog)
    {
        return view('email-logs.show', compact('emailLog'));
    }
}
