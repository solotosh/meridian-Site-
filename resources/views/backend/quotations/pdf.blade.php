<!DOCTYPE html>
<html>
<head>
    <title>Quotation Requests PDF</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 8px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Quotation Requests</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Submitted At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($quotations as $index => $quote)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $quote->name }}</td>
                <td>{{ $quote->email }}</td>
                <td>{{ $quote->phone }}</td>
                <td>{{ $quote->created_at->format('d M Y, h:i A') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
