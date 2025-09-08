<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Leave Application</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
        }

        .container {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #f9f9f9;
        }

        h2 {
            color: #2c3e50;
        }

        p {
            margin: 6px 0;
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>New Leave Application</h2>

        <p><strong>Employee:</strong> {{ $leave->user->name }}</p>
        <p><strong>Leave Type:</strong> {{ $leave->leaveType->leave_type	 }}</p>
        <p><strong>From:</strong> {{ \Carbon\Carbon::parse($leave->dateFrom)->format('d M Y') }}</p>
        <p><strong>To:</strong> {{ \Carbon\Carbon::parse($leave->dateTo)->format('d M Y') }}</p>
        <p><strong>Reason:</strong> {{ $leave->reason }}</p>

        <div class="footer">
            <p>HR System</p>
        </div>
    </div>
</body>

</html>