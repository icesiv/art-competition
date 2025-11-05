<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Admit Card - {{ $registration->registration_id }}</title>

    <style>
        * {
            box-sizing: border-box;
        }
/* 
        @page {
            size: A4 landscape;
            margin: 0;
        } */

        body {
            font-family: "DejaVu Sans", sans-serif;
            margin: 0;
            padding: 20mm;
        }

        /* Card Container */
        .card {
            width: 100%;
            max-height: 186mm;
            padding: 12mm;
            background: linear-gradient(140deg, #ffe3ec, #ffd6a5);
            border: 6px solid #ff4d6d;
            border-radius: 6px;
            position: relative;
            overflow: hidden;
        }

        /* Watermark */
        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 80%;
            opacity: 0.08;
            transform: translate(-50%, -50%) rotate(-12deg);
        }

        /* Header */
        .header {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;

            text-align: center;
            position: relative;
        }

        .header img {
            width: 34mm;
        }

        .header h1 {
            font-size: 28px;
            margin: 3mm 0 1mm;
            color: #b40059;
        }

        .header p {
            font-size: 14px;
            margin: 0;
        }

        /* Title Bar */
        .title {
            background: #ff4d6d;
            color: white;
            text-align: center;
            padding: 3mm;
            margin: 6mm 0;
            border-radius: 5px;
            font-weight: bold;
            font-size: 20px;
        }

        /* Content Layout */
        .content-row {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        /* Info Section */
        .info-box {
            flex: 1;
        }

        .info-box table {
            width: 100%;
            border-collapse: collapse;
            font-size: 15px;
        }

        .info-box td {
            padding: 1.5mm 0;
        }

        .label {
            font-weight: bold;
            color: #b40059;
        }

        /* QR Section */
        .qr-box {
            /* width: 38mm; */
            flex: 1;
            text-align: center;
        }

        .qr-box img {
            width: 38mm;
            padding: 2mm;
            border: 2px solid #b40059;
            border-radius: 4px;
        }

        /* Footer */
        .footer {
            border-top: 3px solid #ff4d6d;
            text-align: center;
            margin-top: 6mm;
            padding-top: 3mm;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="card">

        <!-- Watermark -->
        <img src="{{ public_path('assets/bpsc-logo.png') }}" class="watermark">

        <!-- Header -->
        <div class="header">
            {{-- <img src="{{ public_path('assets/bpsc-logo.png') }}"> --}}
            <div>
                <h1>বসুন্ধরা পাবলিক স্কুল এন্ড কলেজ ছবি আঁকা প্রতিযোগিতা</h1>
                <p>Bangladesh School-Level Creative Drawing Festival</p>
            </div>
        </div>

        <div class="title">ADMIT CARD</div>

        <div class="content-row">

            <div class="info-box">
                <table>
                    <tr>
                        <td class="label">Registration ID:</td>
                        <td>{{ $registration->registration_id }}</td>
                    </tr>
                    <tr>
                        <td class="label">Student Name:</td>
                        <td>{{ $registration->name }}</td>
                    </tr>
                    <tr>
                        <td class="label">Class / Grade:</td>
                        <td>{{ $registration->grade }}</td>
                    </tr>
                    <tr>
                        <td class="label">Parent's Name:</td>
                        <td>{{ $registration->parents_name }}</td>
                    </tr>
                    <tr>
                        <td class="label">Parent's Phone:</td>
                        <td>{{ $registration->parents_phone }}</td>
                    </tr>
                    @if ($registration->email)
                        <tr>
                            <td class="label">Email:</td>
                            <td>{{ $registration->email }}</td>
                        </tr>
                    @endif
                    <tr>
                        <td class="label">School / Institute:</td>
                        <td>{{ $registration->school }}</td>
                    </tr>
                    <tr>
                        <td class="label">Address:</td>
                        <td>{{ $registration->home_address }}</td>
                    </tr>
                </table>
            </div>

            {{-- <div class="qr-box">
                <strong>SCAN TO VERIFY</strong>
                <br><br>
                <img src="data:image/png;base64,{{ $qrCode }}">
            </div> --}}

        </div>

        <div class="footer">
            Competition Date: <strong>15 December 2025</strong> • Time: <strong>10:00 AM</strong><br>
            Venue: <strong>National Art Gallery, Shilpakala Academy, Dhaka</strong>
        </div>

    </div>
</body>

</html>
