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
        <h1 class="mb-4">{{__('headers.editOffers')}}</h1>
        <form action="/offres" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="numero" class="form-label">{{__('headers.number')}} :</label>
                <input type="text" id="numero" name="numero"
                    class="form-control @error('numero') border-danger @enderror" value="{{ old('numero') }}">
                @error('numero')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="objetEn" class="form-label">Objet in English :</label>
                <input type="text" id="objetEn" name="objetEn"
                    class="form-control @error('objetEn') border-danger @enderror" value="{{ old('objetEn') }}">
                @error('objetEn')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="objetAr" class="form-label">الموضوع :</label>
                <input type="text" id="objetAr" name="objetAr"
                    class="form-control @error('objetAr') border-danger @enderror" value="{{ old('objetAr') }}">
                @error('objetAr')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="date_Limite" class="form-label">{{__('tables.date_limite')}} :</label>
                <input type="date" id="date_Limite" name="date_Limite"
                    class="form-control @error('date_Limite') border-danger @enderror" value="{{ old('date_Limite') }}">
                @error('date_Limite')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="proroge" class="form-label">{{__('tables.date_proroge')}} :</label>
                <input type="date" id="date_proroge" name="date_proroge"
                    class="form-control @error('date_proroge') border-danger @enderror" value="{{ old('date_proroge') }}">
                @error('date_proroge')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="pdf" class="form-label">{{__('headers.upload')}} PDF:</label>
                <input type="file" name="pdf" id="pdf"
                    class="form-control @error('pdf') border-danger @enderror" accept="application/pdf">
                @error('pdf')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="observation" class="form-label">{{__('tables.observation')}} :</label>
                <textarea id="observation" name="observation" class="form-control @error('observation') border-danger @enderror"
                    rows="4" cols="50">{{ old('observation') }}</textarea>
                @error('observation')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">{{__('buttons.confirm')}}</button>
            <a href="/offres" class="btn btn-info ms-2 text-decoration-none">{{__('buttons.consulter')}}</a>
            <a href="{{ route('menuAdmin') }}" class="btn btn-dark ms-2 text-decoration-none">{{__('buttons.menuAdmin')}}</a>
            <button class="btn btn-danger ms-2" type="button" onclick="confirmLogout()">{{__('buttons.desconnect')}}</button>
        </form>
    </div>

    <script>
        async function confirmLogout() {
            if (confirm("Êtes-vous sûr de vouloir vous déconnecter ?")) {
                const response = await fetch('/adminLogout', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });

                if (response.ok) {
                    window.location.href = '/offres';
                }
            }
        }
    </script>
</body>

</html>
