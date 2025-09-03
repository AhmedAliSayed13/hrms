<!DOCTYPE html>
<html>
<head>
    <title>Event Invitation</title>
</head>
<body>
    <h2>{{ $event->name }}</h2>
    <p>{{ $event->description }}</p>
    <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->date)->format('d M Y h:i A') }}</p>
    <p><strong>Description:</strong> {{ $event->message	 }}</p>
    <p>You are invited to attend this event. Please be on time.</p>
</body>
</html>
