<html>

<head>
    <title>Html-Qrcode Demo</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div id="reader" style="width:500px"></div>
    <div id="reader"></div> 
</body>

<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
    function onScanSuccess(decodedText, decodedResult) {
        // handle the scanned code as you like, for example:
        $('#result').val(decodedText);
        let qrData = decodedText;
        let siswa_id = $('#siswa_id').val(); // Ambil nilai siswa_id dari input field
        let pertemuan_id = qrData;

        html5QrcodeScanner.clear().then(_ => {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ route('validasi') }}",
                type: 'POST',            
                data: {
                    _method : "POST",
                    _token: CSRF_TOKEN, 
                    pertemuan_id: pertemuan_id,
                    siswa_id: siswa_id
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) { 
                    console.log(response);
                        if(response.status == 200){
                        alert('berhasil');
                    }else{
                        alert('gagal');
                    }
                }
            });   
        }).catch(error => {
            alert('something wrong');
        });
    }

    let config = {
        fps: 10,
        qrbox: { width: 250, height: 250 },
        rememberLastUsedCamera: true,
        // Only support camera scan type.
        supportedScanTypes: [Html5QrcodeScanType.SCAN_TYPE_CAMERA]
    };

    let html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", config, /* verbose= */ false);
    html5QrcodeScanner.render(onScanSuccess);
</script>

</html>