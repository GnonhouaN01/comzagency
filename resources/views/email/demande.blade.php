<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Nouvelle demande de contact</h2>

<p><strong>Nom :</strong> {{ $data['name'] }}</p>
<p><strong>Email :</strong> {{ $data['email'] }}</p>
<p><strong>Téléphone :</strong> {{ $data['phone'] ?? 'Non précisé' }}</p>
<p><strong>Entreprise :</strong> {{ $data['company'] ?? 'Non précisé' }}</p>
<p><strong>Type de client :</strong> {{ $data['client-type'] }}</p>
<p><strong>Budget estimé :</strong> {{ $data['budget'] ?? 'Non précisé' }}</p>
<p><strong>Services souhaités :</strong> {{ implode(', ', $data['services']) }}</p>
<p><strong>Délai :</strong> {{ $data['deadline'] ?? 'Non précisé' }}</p>

<hr>
<p><strong>Message :</strong></p>
<p>{{ $data['message'] }}</p>

</body>
</html>