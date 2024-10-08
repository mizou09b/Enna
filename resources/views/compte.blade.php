<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>compte page</title>
</head>

<body>


    @auth
        <form action="compte" method="POST">
            @csrf
            <label for="username"></label>
            <input type="text" id="username" name="username" placeholder="username">
            <br>
            <label for="password"></label>
            <input type="password" id="password" name="password">
            <br>
            <label for="password_confirmation"></label>
            <input type="password" id="password_confirmation" name="password_confirmation">
            <br>
            <button type="submit">Valider</button>
        </form>
    @else
        <h1>you are not allowed in here!</h1>
    @endauth






</body>

</html>
