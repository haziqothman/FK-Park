<!DOCTYPE html>
<html>
<head>
    <title>QR Code Scanner</title>
    <script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script>
    <style>
        #qr-reader {
            width: 500px;
        }
    </style>
</head>
<body>
    <div id="qr-reader"></div>
    <div id="qr-reader-results"></div>

    <script>
        function onScanSuccess(decodedText, decodedResult) {
            // Handle the scanned code as you like, for example:
            console.log(`Code matched = ${decodedText}`, decodedResult);

            // Display the scanned result
            document.getElementById('qr-reader-results').innerHTML = `<strong>Scanned Result:</strong> ${decodedText}`;
        }

        function onScanFailure(error) {
            // Handle scan failure, for example:
            console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
</body>
</html>
          