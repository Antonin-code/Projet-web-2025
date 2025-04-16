<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bienvenue !!</title>
</head>
<body>
<h2>Bonjour {{ $student->first_name }} !</h2>
<p>Voici votre mot de passe temporaire -> <strong>{{ $password }}</strong> <-</p>
<p>Oublier pas de le modifier lors de votre première connexion !</p>
<p>Envoyé à : {{ $student->email }}</p>
</body>
</html>
