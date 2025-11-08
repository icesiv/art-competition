<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/assets/art-logo-new.png" type="image/png">
    <title>প্রবেশপত্র - {{ $registration->registration_id }}</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@100..900&family=Tiro+Bangla:ital@0;1&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: "Tiro Bangla", serif;
            margin: 0;
            padding: 0;
        }

        .card {
            width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 5px solid #ff4d6d;
            border-radius: 12px;
            position: relative;
            background: #fff;
        }

        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 80%;
            height: 80%;
            opacity: 0.06;
            object-fit: contain;
            transform: translate(-50%, -50%) rotate(-15deg);
            pointer-events: none;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            height: 100%;
            object-fit: contain;
        }


        .header div {
            flex: 1;
            padding: 0 10px;
        }

        .header h1 {
            font-size: 24px;
            color: #b40059;
            margin-bottom: 5px;
        }

        .header p {
            font-size: 16px;
            color: #333;
            margin: 0;
        }

        .title {
            background: #ff4d6d;
            color: #fff;
            text-align: center;
            padding: 10px;
            font-weight: bold;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 20px;
        }

        .info-box {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .info-left {
            flex: 1 1 60%;
        }

        .info-left table {
            width: 100%;
        }

        .info-left td {
            padding: 6px 0;
            vertical-align: top;
        }

        .label {
            font-weight: bold;
            color: #b40059;
            width: 40%;
        }

        .value {
            width: 60%;
        }

        .qr-box {
            flex: 1 1 35%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            margin-top: 10px;
        }

        .qr-box img {
            width: 200px;
            height: 200px;
            border: 2px solid #b40059;
            border-radius: 6px;
            padding: 5px;
        }

        .rules-box {
            font-size: 14px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
        }

        .print-btn {
            display: inline-block;
            margin: 20px auto;
            padding: 10px 20px;
            background: #b40059;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        .school {
            color: red;
            font-size: 18px;
            margin-top: 10px;
        }

        /* Hide print button when printing */
        @media print {
            .print-btn {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div style="text-align:center;">
        <button class="print-btn" onclick="window.print()">প্রিন্ট করুন</button>
        <button id="downloadPageBtn" class="print-btn">ডাউনলোড</button>
    </div>

    <div class="card">
        <!-- Watermark -->
        <img src="/assets/bpsc-logo-no-text.png" class="watermark" alt="Watermark">

        <!-- Header -->
        <div class="header">
            <img width="160px" src="/assets/art-logo-new.png" alt="Logo">
            <div>
                <h1>বসুন্ধরা পাবলিক স্কুল এন্ড কলেজ<br>ছবি আঁকা প্রতিযোগিতা</h1>
                <p>বিষয়: মুক্তিযুদ্ধ ও জুলাই গণ-অভ্যুত্থান</p>
            </div>
            <img width="100px" src="/assets/bpsc-logo.png" alt="Logo">
        </div>

        <div class="title">প্রবেশপত্র</div>

        <div class="info-box">
            <div class="info-left">
                <table>
                    <tr>
                        <td class="label">রেজিস্ট্রেশন আইডি:</td>
                        <td class="value">{{ $registration->registration_id }}</td>
                    </tr>
                    <tr>
                        <td class="label">শিক্ষার্থীর নাম:</td>
                        <td class="value">{{ $registration->name }}</td>
                    </tr>
                    <tr>
                        <td class="label">শ্রেণী:</td>
                        <td class="value">
                            {{ $registration->grade }}
                            @php
                                $cat1 = ['তৃতীয় শ্রেণি', 'চতুর্থ শ্রেণি', 'পঞ্চম শ্রেণি', 'ষষ্ঠ শ্রেণি'];
                            @endphp

                            @if (in_array($registration->grade, $cat1))
                                <span class="text-gray-200 ml-2">[ ক্যাটাগরী - ১ ]</span>
                            @else
                                <span class="text-gray-200 ml-2">[ ক্যাটাগরী - ২ ]</span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td class="label">স্কুল / ইনস্টিটিউট:</td>
                        <td class="value">{{ $registration->school }}</td>
                    </tr>
                    <tr>
                        <td class="label">অভিভাবকের নাম:</td>
                        <td class="value">{{ $registration->parents_name }}</td>
                    </tr>
                    <tr>
                        <td class="label">অভিভাবকের ফোন:</td>
                        <td class="value">{{ $registration->parents_phone }}</td>
                    </tr>

                    @if ($registration->special_needs)
                        <tr>
                            <td class="label" colspan="2" 
                            style="
                            color: #b40059; 
                            font-weight:bold;
                            font-size: 18px;
                            text-align: center;
                            ">
                                ** বিশেষ চাহিদাসম্পন্ন ছাত্র-ছাত্রী **
                            </td>
                        </tr>
                    @endif


                </table>
            </div>
            <div class="qr-box">
                <strong>স্ক্যান করে যাচাই করুন</strong>
                <img src="data:image/png;base64,{{ $qrCode }}" alt="QR Code">
            </div>
        </div>

        <div class="rules-box">
            <strong>প্রতিযোগিতার নিয়মাবলী:</strong>
            <ul>
                <li>প্রবেশপত্রটি অবশ্যই সাথে নিয়ে আসতে হবে।</li>
                <li>নির্ধারিত সময়ের ৩০ মিনিট আগে উপস্থিত থাকতে হবে।</li>
                <li>প্রতিযোগীকে ড্রইং শীট/আর্ট পেপার আয়োজকবৃন্দ সরবরাহ করবে।</li>
                <li>রঙ করার উপকরণ প্রতিযোগী নিজে সাথে আনবে।</li>
            </ul>
        </div>

        <div class="footer">
            <strong><span class="school">বসুন্ধরা পাবলিক স্কুল এন্ড কলেজ</span><br /> প্লট ০২, ব্লক এন, বসুন্ধরা আবাসিক
                এলাকা, ঢাকা ১২২৯</strong>
        </div>
    </div>



    <script>
        document.getElementById('downloadPageBtn').addEventListener('click', function() {
            var card = document.querySelector('.card'); // Select only the card div
            html2canvas(card).then(function(canvas) {
                // Create a temporary link element
                var link = document.createElement('a');
                link.download = 'admit_card.png'; // Set the download filename
                link.href = canvas.toDataURL('image/png'); // Convert canvas to data URL
                document.body.appendChild(link); // Append link to body (required for click)
                link.click(); // Programmatically click the link to trigger download
                document.body.removeChild(link); // Remove the temporary link
            });
        });
    </script>

</body>

</html>
