<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Leave Disapproval</title>
</head>

<body style="font-family: Arial, sans-serif; background-color:#f4f4f4; margin:0; padding:20px;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table width="600" cellpadding="20" cellspacing="0"
                    style="background-color:#ffffff; border-radius:8px; box-shadow:0 2px 5px rgba(0,0,0,0.1);">
                    <tr>
                        <td>
                            <h2 style="color:#e74c3c; margin-bottom:20px;">Leave Request Disapproved</h2>

                            <p style="margin:8px 0; font-size:14px; color:#333;">
                                <strong>Employee:</strong> {{ $leave->user->name }}
                            </p>
                            <p style="margin:8px 0; font-size:14px; color:#333;">
                                <strong>Leave Type:</strong> {{ $leave->leaveType->leave_type }}
                            </p>
                            <p style="margin:8px 0; font-size:14px; color:#333;">
                                <strong>From:</strong> {{ \Carbon\Carbon::parse($leave->dateFrom)->format('d M Y') }}
                            </p>
                            <p style="margin:8px 0; font-size:14px; color:#333;">
                                <strong>To:</strong> {{ \Carbon\Carbon::parse($leave->dateTo)->format('d M Y') }}
                            </p>
                            <p style="margin:8px 0; font-size:14px; color:#333;">
                                <strong>Reason:</strong> {{ $leave->reason }}
                            </p>

                            @if(!empty($remarks))
                            <p style="margin:8px 0; font-size:14px; color:#333;">
                                <strong>Remarks from HR:</strong> {{ $remarks }}
                            </p>
                            @endif

                            <br>
                            <p style="font-size:14px; color:#555;">
                                Best regards,<br>
                                <strong>HR System</strong>
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>