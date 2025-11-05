<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Admit Card - {{ $registration->registration_id }}</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        @page {
            size: A4 landscape;
            margin: 0;
        }

        body {
            font-family: "DejaVu Sans", "Arial", sans-serif;
            margin: 0;
            padding: 0;
            background: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 210mm;
        }

        /* Center Container */
        .page-container {
            width: 100%;
            height: 210mm;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15mm;
        }

        /* Card Container - 70% width, centered */
        .card {
            width: 70%;
            max-width: 200mm;
            padding: 15mm;
            background: linear-gradient(140deg, #ffe3ec, #ffd6a5);
            border: 5px solid #ff4d6d;
            border-radius: 8px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        }

        /* Watermark */
        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 60%;
            opacity: 0.06;
            transform: translate(-50%, -50%) rotate(-15deg);
            z-index: 0;
        }

        /* Header */
        .header {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            z-index: 1;
            margin-bottom: 8mm;
        }

        .header-content {
            flex: 1;
        }

        .header img {
            width: 28mm;
            height: auto;
            margin-right: 10mm;
        }

        .header h1 {
            font-size: 22px;
            margin: 0 0 2mm 0;
            color: #b40059;
            font-weight: bold;
            line-height: 1.3;
        }

        .header p {
            font-size: 12px;
            margin: 0;
            color: #333;
        }

        /* Title Bar */
        .title {
            background: #ff4d6d;
            color: white;
            text-align: center;
            padding: 4mm;
            margin: 6mm 0;
            border-radius: 6px;
            font-weight: bold;
            font-size: 18px;
            letter-spacing: 2px;
            position: relative;
            z-index: 1;
        }

        /* Content Layout */
        .content-row {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            gap: 8mm;
            position: relative;
            z-index: 1;
        }

        /* Info Section */
        .info-box {
            flex: 1.5;
        }

        .info-box table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        .info-box td {
            padding: 2mm 0;
            vertical-align: top;
        }

        .label {
            font-weight: bold;
            color: #b40059;
            width: 40%;
            padding-right: 3mm;
        }

        .value {
            color: #333;
            width: 60%;
        }

        /* QR Section */
        .qr-box {
            flex: 1;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .qr-box strong {
            font-size: 11px;
            color: #b40059;
            margin-bottom: 4mm;
            letter-spacing: 1px;
        }

        .qr-box img {
            width: 35mm;
            height: 35mm;
            padding: 3mm;
            background: white;
            border: 3px solid #b40059;
            border-radius: 6px;
        }

        /* Footer */
        .footer {
            border-top: 3px solid #ff4d6d;
            text-align: center;
            margin-top: 8mm;
            padding-top: 4mm;
            font-size: 12px;
            color: #333;
            position: relative;
            z-index: 1;
        }

        .footer strong {
            color: #b40059;
            font-weight: bold;
        }

        /* Decorative Corners */
        .corner {
            position: absolute;
            width: 20mm;
            height: 20mm;
            border: 3px solid #ff4d6d;
            z-index: 0;
        }

        .corner.top-left {
            top: 0;
            left: 0;
            border-right: none;
            border-bottom: none;
            border-top-left-radius: 8px;
        }

        .corner.top-right {
            top: 0;
            right: 0;
            border-left: none;
            border-bottom: none;
            border-top-right-radius: 8px;
        }

        .corner.bottom-left {
            bottom: 0;
            left: 0;
            border-right: none;
            border-top: none;
            border-bottom-left-radius: 8px;
        }

        .corner.bottom-right {
            bottom: 0;
            right: 0;
            border-left: none;
            border-top: none;
            border-bottom-right-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="page-container">
        <div class="card">
            <!-- Decorative Corners -->
            <div class="corner top-left"></div>
            <div class="corner top-right"></div>
            <div class="corner bottom-left"></div>
            <div class="corner bottom-right"></div>

            <!-- Watermark -->
            <img src="{{ public_path('assets/bpsc-logo.png') }}" class="watermark" alt="Watermark">

            <!-- Header -->
            <div class="header">
                <img src="{{ public_path('assets/bpsc-logo.png') }}" alt="Logo">
                <div class="header-content">
                    <h1>বসুন্ধরা পাবলিক স্কুল এন্ড কলেজ<br>ছবি আঁকা প্রতিযোগিতা</h1>
                    <p>বিষয়: মুক্তিযুদ্ধ ও জুলাই গণ-অভ্যুত্থান</p>
                </div>
            </div>

            <!-- Title -->
            <div class="title">ADMIT CARD</div>

            <!-- Content -->
            <div class="content-row">
                <div class="info-box">
                    <table>
                        <tr>
                            <td class="label">Registration ID:</td>
                            <td class="value">{{ $registration->registration_id }}</td>
                        </tr>
                        <tr>
                            <td class="label">Student Name:</td>
                            <td class="value">{{ $registration->name }}</td>
                        </tr>
                        <tr>
                            <td class="label">Class / Grade:</td>
                            <td class="value">{{ $registration->grade }}</td>
                        </tr>
                        <tr>
                            <td class="label">Parent's Name:</td>
                            <td class="value">{{ $registration->parents_name }}</td>
                        </tr>
                        <tr>
                            <td class="label">Parent's Phone:</td>
                            <td class="value">{{ $registration->parents_phone }}</td>
                        </tr>
                        @if ($registration->email)
                        <tr>
                            <td class="label">Email:</td>
                            <td class="value">{{ $registration->email }}</td>
                        </tr>
                        @endif
                        <tr>
                            <td class="label">School / Institute:</td>
                            <td class="value">{{ $registration->school }}</td>
                        </tr>
                        <tr>
                            <td class="label">Address:</td>
                            <td class="value">{{ $registration->home_address }}</td>
                        </tr>
                    </table>
                </div>

                <div class="qr-box">
                    <strong>SCAN TO VERIFY</strong>
                    <img src="data:image/png;base64,{{ $qrCode }}" alt="QR Code">
                </div>
            </div>

            <!-- Footer -->
            <div class="footer">
                Competition Date: <strong>১২ ডিসেম্বর ২০২৫</strong> • Time: <strong>10:00 AM</strong><br>
                Venue: <strong>বসুন্ধরা পাবলিক স্কুল এন্ড কলেজ প্লট ০২, ব্লক এন, বসুন্ধরা আবাসিক এলাকা, ঢাকা ১২২৯</strong>
            </div>
        </div>
    </div>
</body>
</html>