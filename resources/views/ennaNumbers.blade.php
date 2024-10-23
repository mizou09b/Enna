{{-- no styles --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            /* margin: 20px; */
            background-color: white;
        }

        .header1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>

<body>
    @if (session()->has('success'))
        <div class="container container-narrow mt-3">
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="container mt-5">
        <h1 class="mb-4">Enna Numbers</h1>
        <form action="{{route('ennaNumbers')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="Aerodromes_Internationaux" class="form-label" >Aérodromes Internationaux* :</label>
                <input type="text" id="Aerodromes_Internationaux" value="{{ old('Aerodromes_Internationaux') }}" name="Aerodromes_Internationaux"
                    class="form-control @error('Aerodromes_Internationaux') border-danger @enderror">
                @error('Aerodromes_Internationaux')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-3">
                <label for="Aerodromes_Nationaux" class="form-label" >Aerodromes Nationaux* :</label>
                <input type="text" id="Aerodromes_Nationaux" name="Aerodromes_Nationaux" value="{{ old('Aerodromes_Nationaux') }}"
                 class="form-control @error('Aerodromes_Nationaux') border-danger @enderror">
                @error('Aerodromes_Nationaux')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Movements_Aerodromes" class="form-label" >Movements Aérodromes* :</label>
                <input type="text" id="Movements_Aerodromes" name="Movements_Aerodromes" value="{{ old('Movements_Aerodromes') }}"
                    class="form-control @error('Movements_Aerodromes') border-danger @enderror">
                @error('Movements_Aerodromes')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Survols" class="form-label" >Survols* :</label>
                <input type="text" id="Survols" name="Survols" value="{{ old('Survols') }}"
                    class="form-control @error('Survols') border-danger @enderror">
                @error('Survols')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Confirm</button>
            <a href="/" class="btn btn-info ms-2 text-decoration-none">See Numbers</a>
            <a href="/menuAdmin" class="btn btn-dark ms-2 text-decoration-none">Menu Admin</a>
            <button class="btn btn-danger ms-2" type="button" onclick="confirmLogout()">Desconnect</button>
        </form>
        <div class="container d-flex pb-4">

        </div>
    </div>

    <script>
        async function confirmLogout() {

            if (confirm("Êtes-vous sûr de vouloir vous déconnecter ?")) {
                const response = await fetch('/adminLogout', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'  // Include CSRF token
                    }
                });

                if (response.ok) {
                    // Redirect to the login page or wherever you want after logout
                    window.location.href = '/';
                }
            }
        }
    </script>

    </div>
    </div>
</body>

</html>
