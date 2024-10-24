<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum admin</title>
    <link rel="stylesheet" href="/css/styleadmin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    @if (session()->has('error'))
        <div class="container-narrow alert alert-danger text-center mt-3">
            {{ session('error') }}
        </div>
    @endif
    <div class="container1">
        <h1>Enna</h1>
            <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="username">Nom d'utilisateur :</label>
                    <input value="{{ old('username') }}" type="text" id="username" name="username" class=" @error('username') border-danger @enderror">
                    @error('username')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" class="@error('password') border-danger @enderror">
                    @error('password')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                {{-- @error('failed')
                        <div class="text-danger"><p>{{$message}}</p></div>
                    @enderror --}}
                <button class="btn btn-info" type="submit">Se connecter</button>
            </form>
    </div>
</body>

</html>
