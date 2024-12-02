<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Log Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="mb-4">
            <a href="{{ route('email-logs.index') }}" class="text-indigo-600 hover:text-indigo-900">← Back to Logs</a>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4">
                <h1 class="text-2xl font-bold mb-4">Email Details</h1>
                
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <h3 class="font-semibold text-gray-600">Date Sent</h3>
                        <p>{{ $emailLog->created_at->format('Y-m-d H:i:s') }}</p>
                    </div>
                    
                    <div>
                        <h3 class="font-semibold text-gray-600">Status</h3>
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            {{ $emailLog->status }}
                        </span>
                    </div>

                    <div>
                        <h3 class="font-semibold text-gray-600">To</h3>
                        <p>{{ $emailLog->to_email }}</p>
                    </div>

                    <div>
                        <h3 class="font-semibold text-gray-600">From</h3>
                        <p>{{ $emailLog->from_email }}</p>
                    </div>

                    <div class="col-span-2">
                        <h3 class="font-semibold text-gray-600">Subject</h3>
                        <p>{{ $emailLog->subject }}</p>
                    </div>

                    <div class="col-span-2">
                        <h3 class="font-semibold text-gray-600">Body</h3>
                        <div class="mt-2 p-4 bg-gray-50 rounded">
                            {!! nl2br(e($emailLog->body)) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
