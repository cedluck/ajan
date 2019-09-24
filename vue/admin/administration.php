<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ"
        crossorigin="anonymous">
    <link rel="stylesheet" href="/ajanpoo/css/adminStyle.css">
</head>

<form method="post" action="#" class="form-control">
  <label for="name">NOM : </label>
  <input type="text" name="name"></input>
  <label for="pass"> Mot de passe : </label>
  <input type="text" name="pass"></input>
  <input type="submit" value="ENTRER" class="bg-danger text-white"></input> 
  <a href="?deconnexion=1" method="get"><button class="bg-danger text-white"> SORTIR</button></a>
</form>
