<?php

use App\Http\Controllers\EmailLogController;
use App\Mail\TestEmail;
use App\Models\EmailLog;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-email', function () {
    // Send test email
    Mail::to('bherila@bherila.net')->send(new TestEmail());

    // Fetch the logged email
    $loggedEmail = EmailLog::latest()->first();

    return response()->json([
        'message' => 'Email sent and logged successfully',
        'logged_email' => $loggedEmail
    ]);
});

// Email Logs Routes
Route::get('/email-logs', [EmailLogController::class, 'index'])->name('email-logs.index');
Route::get('/email-logs/{emailLog}', [EmailLogController::class, 'show'])->name('email-logs.show');
