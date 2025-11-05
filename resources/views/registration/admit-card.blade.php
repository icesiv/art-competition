<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>এডমিট কার্ড - {{ $registration->registration_id }}</title>

    <style>
        @font-face {
            font-family: "Bangla";
            src: url("{{ public_path('fonts/NotoSansBengali-Regular.ttf') }}") format("truetype");
            font-weight: normal;
        }

        @font-face {
            font-family: "Bangla";
            src: url("{{ public_path('fonts/NotoSansBengali-Bold.ttf') }}") format("truetype");
            font-weight: bold;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        @page {
            size: A4 portrait;
            margin: 0;
        }

        body {
            width: 210mm;
            min-height: 297mm;
            margin: 0;
            padding: 0;
            background: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;

            font-family: "Bangla", sans-serif !important;
        }

        .page-container {
    width: 100%;
    min-height: 297mm;
    padding: 10mm;
    display: flex;
    align-items: center;
    justify-content: center;
}

        .card {
            page-break-inside: avoid;
            background: linear-gradient(140deg, #ffe3ec, #ffd6a5);
            border: 6px solid #ff4d6d;
            border-radius: 10px;
            padding: 18mm;
            position: relative;
            overflow: hidden;
        }

        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 80%;
            opacity: 0.07;
            transform: translate(-50%, -50%) rotate(-14deg);
        }

        /* Header */
        .header {
            text-align: center;
            margin-bottom: 10mm;
            position: relative;
            z-index: 1;
        }

        .header img {
            width: 28mm;
            margin-bottom: 3mm;
        }

        .header h1 {
            font-size: 22px;
            color: #b40059;
            font-weight: bold;
            line-height: 1.5;
        }

        .header p {
            font-size: 14px;
            color: #333;
        }

        /* Title bar */
        .title {
            background: #ff4d6d;
            color: white;
            text-align: center;
            padding: 4mm 0;
            border-radius: 6px;
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 10mm;
            position: relative;
            z-index: 1;
        }

        /* Content Layout */
        .content-row {
            display: flex;
            gap: 10mm;
            position: relative;
            z-index: 1;
        }

        /* Info Section */
        .info-box {
            flex: 1.5;
        }

        .info-box table {
            width: 100%;
            font-size: 15px;
            border-collapse: collapse;
        }

        td {
            padding: 2mm 0;
        }

        .label {
            font-weight: bold;
            color: #b40059;
            width: 40%;
        }

        .value {
            color: #333;
            width: 60%;
        }

        /* QR Section */
        .qr-box {
            flex: 1;
            text-align: center;
        }

        .qr-box strong {
            font-size: 12px;
            color: #b40059;
            margin-bottom: 4mm;
            display: block;
        }

        .qr-box img {
            width: 38mm;
            height: 38mm;
            padding: 3mm;
            background: white;
            border: 3px solid #b40059;
            border-radius: 6px;
        }

        /* Footer */
        .footer {
            text-align: center;
            border-top: 3px solid #ff4d6d;
            margin-top: 10mm;
            padding-top: 5mm;
            font-size: 13px;
            color: #333;
        }

        .footer strong {
            color: #b40059;
        }
    </style>
</head>

<body>

    <div class="card page-container">

        <!-- Watermark -->
        <img src="{{ public_path('assets/bpsc-logo-no-text.png') }}" class="watermark" />

        <!-- Header -->
        <div class="header">
            <img src="{{ public_path('assets/bpsc-logo.png') }}">
            <h1>বসুন্ধরা পাবলিক স্কুল এন্ড কলেজ<br>ছবি আঁকা প্রতিযোগিতা - ২০২৫</h1>
            <p>বিষয়: মুক্তিযুদ্ধ ও জুলাই গণ-অভ্যুত্থান</p>
        </div>

        <!-- Title -->
        <div class="title">এডমিট কার্ড</div>

        <!-- Main Content -->
        <div class="content-row">

            <div class="info-box">
                <table>
                    <tr>
                        <td class="label">রেজিস্ট্রেশন নম্বর:</td>
                        <td class="value">{{ $registration->registration_id }}</td>
                    </tr>
                    <tr>
                        <td class="label">শিক্ষার্থীর নাম:</td>
                        <td class="value">{{ $registration->name }}</td>
                    </tr>
                    <tr>
                        <td class="label">শ্রেণী:</td>
                        <td class="value">{{ $registration->grade }}</td>
                    </tr>
                    <tr>
                        <td class="label">অভিভাবকের নাম:</td>
                        <td class="value">{{ $registration->parents_name }}</td>
                    </tr>
                    <tr>
                        <td class="label">অভিভাবকের ফোন:</td>
                        <td class="value">{{ $registration->parents_phone }}</td>
                    </tr>
                    @if ($registration->email)
                        <tr>
                            <td class="label">ইমেল:</td>
                            <td class="value">{{ $registration->email }}</td>
                        </tr>
                    @endif
                    <tr>
                        <td class="label">বিদ্যালয়:</td>
                        <td class="value">{{ $registration->school }}</td>
                    </tr>
                    <tr>
                        <td class="label">ঠিকানা:</td>
                        <td class="value">{{ $registration->home_address }}</td>
                    </tr>
                </table>
            </div>

            <div class="qr-box">
                <strong>স্ক্যান করে যাচাই করুন</strong>
                <img
                    src="data:image/png;base64,{{ $qrCode }}
        </div>

    </div>

    <!-- Footer -->
    <div class="footer">
                প্রতিযোগিতা: <strong>১২ ডিসেম্বর ২০২৫</strong> • সময়: <strong>সকাল ১০টা</strong><br>
                স্থান: <strong>বসুন্ধরা পাবলিক স্কুল এন্ড কলেজ, বসুন্ধরা আবাসিক এলাকা, ঢাকা</strong>
            </div>

        </div>

</body>

</html>
