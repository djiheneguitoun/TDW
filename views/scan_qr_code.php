<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
</head>
<body data-rsssl=1>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js" integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
main {
display: flex;
justify-content: center;
align-items: center;
}
#reader {
width: 600px;
}
#result {
text-align: center;
font-size: 1.5rem;
}
</style>
<main>
<div id="reader"></div>
<div id="result"></div>
</main>
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
    // Send AJAX request to the server with the scanned result
    fetch('/elmuntada/get-membre-info', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ membre_id: result }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById('result').innerHTML = `
                <h2>Membre Information</h2>
                <p><strong>Nom:</strong> ${data.membre.nom}</p>
                <p><strong>Prénom:</strong> ${data.membre.prenom}</p>
                <p><strong>Adresse:</strong> ${data.membre.adresse}</p>
                <p><strong>Téléphone:</strong> ${data.membre.telephone}</p>
                <p><strong>Type de Carte:</strong> ${data.membre.type_carte_nom}</p>
                <img src="${data.membre.photo}" alt="Photo de profil" width="150">
            `;
        } else {
            document.getElementById('result').innerHTML = `
                <h2>Error</h2>
                <p>${data.message}</p>
            `;
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });

    scanner.clear();
    document.getElementById('reader').remove();
}

function error(err) {
    console.error(err);
}
</script>

</body>
</html>
