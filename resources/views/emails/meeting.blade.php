<!DOCTYPE html>
<html>
<head>
    <title>Meeting Invitation</title>
</head>
<body>
    <h2>{{ $meeting->name }}</h2>
    <p>{{ $meeting->description }}</p>
    <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($meeting->date)->format('d M Y h:i A') }}</p>
    <p><strong>Description:</strong> {{ $meeting->message	 }}</p>
    <p>You are invited to attend this meeting. Please be on time.</p>
</body>
</html>
