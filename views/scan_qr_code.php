<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Scanner</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js" integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body class="bg-white min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-8" style="color: #643869">QR Code Scanner</h1>
        
        <div class="max-w-4xl mx-auto">
            <div class="bg-white shadow-xl rounded-2xl p-6 mb-8">
                <div class="flex flex-col md:flex-row gap-8">
                    <div class="w-full md:w-1/2 my-auto">
                        <div id="reader" class="rounded-lg overflow-hidden border-2" style="border-color: #FF7C50"></div>
                    </div>
                    
                    <div class="w-full md:w-1/2">
                        <div id="result" class="bg-gray-50 p-8 rounded-2xl">
                            <div class="text-center space-y-4">
                                <div class="w-20 h-20 mx-auto rounded-full flex items-center justify-center" style="background-color: #FF7C50">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-medium text-gray-700">Ready to Scan</h3>
                                <p class="text-gray-500">Position the QR code within the scanner area</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        if (!window.scanner) {
            const scanner = new Html5QrcodeScanner('reader', {
                qrbox: {
                    width: 250,
                    height: 250,
                },
                fps: 20,
            });
            window.scanner = scanner;
        }
        scanner.render(success, error);

        function success(result) {
            const membreIdMatch = result.match(/Member ID: (\d+)/);
            if (membreIdMatch) {
                const membre_id = membreIdMatch[1];

                fetch('/elmuntada/get-membre-info', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ membre_id: membre_id }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('result').innerHTML = `
                            <div class="space-y-4">
                                <h2 class="text-2xl font-bold mb-4" style="color: #643869">Member Information</h2>
                                <div class="flex justify-center mb-6">
                                    <img src="uploads/${data.membre.photo}" alt="Profile Photo" class="w-32 h-32 rounded-full object-cover border-4" style="border-color: #FF7C50">
                                </div>
                                <div class="space-y-3">
                                    <p class="flex justify-between border-b pb-2">
                                        <span class="font-semibold">Name:</span>
                                        <span>${data.membre.nom}</span>
                                    </p>
                                    <p class="flex justify-between border-b pb-2">
                                        <span class="font-semibold">First Name:</span>
                                        <span>${data.membre.prenom}</span>
                                    </p>
                                    <p class="flex justify-between border-b pb-2">
                                        <span class="font-semibold">Address:</span>
                                        <span>${data.membre.adresse}</span>
                                    </p>
                                    <p class="flex justify-between border-b pb-2">
                                        <span class="font-semibold">Phone:</span>
                                        <span>${data.membre.telephone}</span>
                                    </p>
                                    <p class="flex justify-between border-b pb-2">
                                        <span class="font-semibold">Card Type:</span>
                                        <span>${data.membre.type_carte_nom}</span>
                                    </p>
                                </div>
                            </div>
                        `;
                    } else {
                        document.getElementById('result').innerHTML = `
                            <div class="text-center p-4 rounded-lg bg-red-50">
                                <h2 class="text-2xl font-bold text-red-600 mb-2">Error</h2>
                                <p class="text-red-500">${data.message}</p>
                            </div>
                        `;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            } else {
                document.getElementById('result').innerHTML = `
                    <div class="text-center p-4 rounded-lg bg-red-50">
                        <h2 class="text-2xl font-bold text-red-600 mb-2">Error</h2>
                        <p class="text-red-500">Invalid QR code format.</p>
                    </div>
                `;
            }

        }

        function error(err) {
            console.error(err);
        }
    </script>
</body>
</html>