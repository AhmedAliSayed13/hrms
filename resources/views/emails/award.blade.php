<!DOCTYPE html>
<html>
<head>
    <title>Congratulations on Your Award!</title>
</head>
<body>
    <h2>🎉 Congratulations {{ $awardee->employee->name }}! 🎉</h2>

    <p>We are excited to inform you that you have been selected for the following award:</p>

    <p><strong>Award Name:</strong> {{ $awardee->award->name }}</p>
    <p><strong>Description:</strong> {{ $awardee->award->description }}</p>
    <p><strong>Date Awarded:</strong> {{ \Carbon\Carbon::parse($awardee->date)->format('d M Y h:i A') }}</p>
    <p><strong>Reason:</strong> {{ $awardee->reason }}</p>

    <p>
        This award is a recognition of your outstanding performance and dedication.  
        Keep up the amazing work!
    </p>

    <p>Best regards, <br> {{ config('app.name') }} Team</p>
</body>
</html>
