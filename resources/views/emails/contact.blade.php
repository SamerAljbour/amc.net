<!DOCTYPE html>
<html lang="{{ request()->header('Accept-Language', app()->getLocale()) }}" dir="{{ request()->header('Accept-Language', app()->getLocale()) == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Message</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f1f5f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #1f2937;
            line-height: 1.6;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.06);
            overflow: hidden;
        }
        [dir="rtl"] .email-container,
        [dir="rtl"] .message {
            text-align: right;
        }
        [dir="ltr"] .email-container {
            text-align: left;
        }

        .header {
            background-color: #0d47a1;
            color: #ffffff;
            text-align: center;
            padding: 30px;
            position: relative;
        }
        .header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at top right, rgba(255,255,255,0.15), transparent 70%);
            z-index: 1;
        }
        .header h1 {
            position: relative;
            z-index: 2;
            font-size: 26px;
            font-weight: 600;
            margin: 0;
        }

        .content {
            padding: 35px 40px;
        }

        .greeting {
            font-size: 18px;
            color: #0d47a1;
            margin-bottom: 25px;
            font-weight: 600;
        }

        .message {
            font-size: 15px;
            color: #374151;
            margin-bottom: 25px;
            line-height: 1.7;
        }

        .message p {
            margin-bottom: 20px;
        }

        .highlight {
            color: #0d47a1;
            font-weight: bold;
        }

        .notification-container {
            background-color: #e8f0fe;
            border: 1px dashed #c7d2fe;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        .footer {
            text-align: center;
            padding: 20px;
            background-color: #f9fafb;
            font-size: 13px;
            color: #6b7280;
            border-top: 1px solid #e5e7eb;
        }

        .footer p {
            margin: 5px 0;
        }

        @media only screen and (max-width: 600px) {
            .email-container {
                width: 95% !important;
            }
            .content {
                padding: 25px 20px;
            }
        }
    </style>
</head>
<body dir="{{ request()->header('Accept-Language', app()->getLocale()) == 'ar' ? 'rtl' : 'ltr' }}">
    <div class="email-container">
        <div class="header">
            <h1>New Contact Message</h1>
        </div>

        <div class="content">
<p class="greeting">You've received a new message from the <strong>AMC contact form</strong>.</p>

            <div class="notification-container">
                <div class="message">
                    <p><span class="highlight">Name:</span> {{ $details['name'] }}</p>
                    <p><span class="highlight">Email:</span> {{ $details['email'] }}</p>
                    <p><span class="highlight">Message:</span><br>{{ $details['message'] }}</p>
                </div>
            </div>
        </div>

        <div class="footer">
            <p>© {{ date('Y') }} {{ config('app.name', 'AMC') }}. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
