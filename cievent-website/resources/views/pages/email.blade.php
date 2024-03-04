<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Cote d'ivoire évènement</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>

<h2>Prise de contact sur mon beau site</h2>
    <p>Réception d'une prise de contact avec les éléments suivants :</p>
    <ul>
      <li><strong>Nom</strong> : {{ $data['username'] }}</li>
      <li><strong>Email</strong> : {{ $data['email'] }}</li>
      <li><strong>Téléphone</strong> :  {{ $data['phone'] }}</li>
      <li><strong>Subjet</strong> :  {{ $data['subject'] }}</li>
      <li><strong>Message</strong> : {{ $data['message'] }}</li>
    </ul>
    Merci
  
</body>
</html>