<!DOCTYPE html>
<html>

<head>
    <title>Probation Ended</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; margin: 0; padding: 0;">
    <table align="center" width="600" cellpadding="0" cellspacing="0"
        style="background: #ffffff; border: 1px solid #ddd; border-radius: 8px; padding: 20px;">
        <tr>
            <td>
                <h2 style="color: #2c3e50; text-align: center; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                    Probation Period Completed
                </h2>

                <p style="font-size: 16px; color: #333;">Dear HR Team,</p>

                <p style="font-size: 15px; color: #555; line-height: 1.6;">
                    Employee <strong style="color: #2c3e50;">{{ $employee->name }}</strong>
                    (Code: <strong>{{ $employee->code }}</strong>) has successfully completed their probation period.
                </p>

                <p style="font-size: 15px; color: #333; line-height: 1.6;">
                    Regards,<br>
                    <span style="color: #2c3e50; font-weight: bold;">HR System</span>
                </p>
            </td>
        </tr>
    </table>
</body>

</html>