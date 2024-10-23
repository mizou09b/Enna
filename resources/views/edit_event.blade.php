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
        <h1 class="mb-4">Edit Event</h1>
        <form action="{{ route('edit_event', $event->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title* :</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}"
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
                <label for="event_image" class="form-label" >Upload Image* :</label>
                <input type="file" id="event_image" name="event_image" value="{{ old('event_image') }}" class="form-control @error('event_image') border-danger @enderror">
                @error('event_image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="date_end_event" class="form-label">Date of event end* :</label>
                <input type="date" id="date_end_event" name="date_end_event"  value="{{ old('date_end_event') }}" class="form-control @error('date_end_event') border-danger @enderror">
                @error('date_end_event')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Confirm Edit</button>
            <a href="/" class="btn btn-info ms-2 text-decoration-none">See the event</a>
            <a href="/menuAdmin" class="btn btn-dark ms-2 text-decoration-none">Menu Admin</a>
            <button class="btn btn-danger ms-2" type="button" onclick="confirmLogout()">Deconnect</button>
        </form>
        <div class="container d-flex pb-4">
        </div>
    </div>



    </div>
    </div>
</body>

</html>
