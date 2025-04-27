<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Message from {{ $message->username }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 14px; }
        .header { font-size: 18px; font-weight: bold; margin-bottom: 10px; }
        .section { margin-bottom: 15px; }
        .label { font-weight: bold; }
    </style>
</head>
<body>
    <div class="header">Contact Message</div>

    <div class="section"><span class="label">Name:</span> {{ $message->username }}</div>
    <div class="section"><span class="label">Email:</span> {{ $message->email }}</div>
    <div class="section"><span class="label">Phone:</span> {{ $message->phone }}</div>
    <div class="section"><span class="label">Subject:</span> {{ $message->subject }}</div>
    <div class="section"><span class="label">Message:</span><br>{{ $message->message }}</div>
</body>
</html>
