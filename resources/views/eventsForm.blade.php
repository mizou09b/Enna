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
        <h1 class="mb-4">Ajouter un evenement</h1>
        <form action="/eventsForm" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label" value="{{ old('title') }}">Title* :</label>
                <input type="text" id="title" name="title"
                    class="form-control @error('title') border-danger @enderror">
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="observation" class="form-label">Observation :</label>
                <textarea id="observation" name="observation" class="form-control @error('observation') border-danger @enderror "
                    rows="4" cols="50">{{ old('observation') }}</textarea>
                @error('observation')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="event_image" class="form-label" value="{{ old('event_image') }}">Upload Image* :</label>
                <input type="file" id="event_image" name="event_image"
                    class="form-control @error('event_image') border-danger @enderror">
                @error('event_image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="date_end_event" class="form-label" value="{{ old('date_end_event') }}">Date de la fin D'evenement* :</label>
                <input type="date" id="date_end_event" name="date_end_event"
                    class="form-control @error('date_end_event') border-danger @enderror">
                @error('date_end_event')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">Confirmer</button>
            <button type="button" class="btn btn-primary" onclick="ShowCard()">Show Card</button>
            <button class="btn btn-danger ms-2" type="button" onclick="confirmLogout()">Déconnecter</button>
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