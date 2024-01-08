<html>
<head>
    <title>Html-Qrcode Demo</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 100px;
        }
        
        .qr-code-container {
            display: inline-block;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .qr-code-container img {
            max-width: 200px;
            height: auto;
        }
        
        .qr-code-container p {
            margin-top: 20px;
            color: #666;
        }
    </style>
<body>
    <div class="visible-print text-center qr-code-container">
        {!! QrCode::size(300)->generate($pertemuan_id) !!}
        <p><strong>Scan untuk Absensi</strong></p>
    </div>
</body>
</head>
</html>
