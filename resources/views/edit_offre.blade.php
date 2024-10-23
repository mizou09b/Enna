<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            /* margin: 20px; */
            background-color: #f4f4f4;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <h1 class="mb-4">Edit Offre</h1>
        <form action="{{ route('edit_offre', $offre->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="numero" class="form-label" value="{{ $offre->numero }}">Numéro :</label>
                <input type="text" id="numero" name="numero"
                    class="form-control @error('numero') border-danger @enderror" value="{{ $offre->numero }}">
                @error('numero')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="objet" class="form-label" >Objet :</label>
                <input type="text" id="objet" value="{{ $offre->objet }}" name="objet"  class="form-control @error('objet') border-danger @enderror">
                @error('objet')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="date_Limite" class="form-label" value="{{ $offre->date_Limite }}">Date limite :</label>
                <input type="date" id="date_Limite" name="date_Limite"
                    class="form-control @error('date_Limite') border-danger @enderror">
                @error('date_Limite')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="proroge" class="form-label">Prorogé au :</label>
                <input type="date" id="date_proroge" name="date_proroge"
                    class="form-control @error('date_proroge') border-danger @enderror"
                    value="{{ $offre->date_proroge }}">
                @error('date_proroge')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="pdf" class="form-label">Upload PDF:</label>
                <input type="file" name="pdf" id="pdf"
                    class="form-control @error('pdf') border-danger" @enderror accept="application/pdf">
                @error('pdf')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="observation" class="form-label">Observation :</label>
                <textarea id="observation" name="observation" class="form-control @error('observation') border-danger @enderror "
                    rows="4" cols="50">{{ $offre->observation }}</textarea>
                @error('observation')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Confirmer Edit</button>
        </form>
</body>

</html>
