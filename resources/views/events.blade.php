{{-- <x-layout :showCard='false' offresCss='css/styleAdminPages.css' aboutBg='none' :showHeader='false'> --}}

<style>
    body {
        background-color: #f8f9fa;
        /* Light background for contrast */
    }

    .container {
        max-width: 800px;
        /* Set a maximum width for the container */
    }

    .card {
        border: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s;
        margin-bottom: 20px;
        border-radius: 10px;
        /* Rounded corners */
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card-body {
        text-align: center;
        /* Center the text */
    }

    .card-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #333;
        /* Dark text for visibility */
        margin-bottom: 10px;
        /* Space below the title */
    }

    .card-subtitle {
        font-size: 1rem;
        color: #6c757d;
        /* Muted color for subtitles */
        margin-bottom: 10px;
        /* Space below the subtitle */
    }

    .card-text {
        font-size: 1rem;
        line-height: 1.5;
        margin: 10px 0;
        /* Adds space between text paragraphs */
    }

    .img-fluid {
        border-radius: 10px;
        width: 100%;
        /* Set to 100% of the parent container */
        max-width: 300px;
        /* Set a maximum width */
        height: auto;
        /* Maintain aspect ratio */

    }

    .LinkBody {
        display: flex;
        /* height: 200px;
        width: 250px; */
        padding: 10px;
        margin: 20px;
        text-align: center;
        border: 3px solid #011D70;
        border-radius: 15px;
        transition: all 0.3s ease-out;
    }

    .LinkBody:hover {
        cursor: pointer;
        background-color: #011D70;
        color: white;
        transform: translateY(-5px) scale(1.1) translateZ(0);
        box-shadow: 0 20px 20px rgba(0, 203, 217, .5),
            0 20px 26px;
    }

    .LinkBody:hover .linkClass {
        color: white;
    }

    .linkClass {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        width: 100%;
        height: 100%;
        color: #011D70;
        text-align: center;
        text-decoration: none;
        font-size: 20px;
    }
</style>

<div class="container mt-5">
    <h1 class="mb-4 text-center">Liste des Événements</h1>


            <div class="card">

                <div class="card-body">
                    {{-- <h5 class="card-title"></h5> --}}
                    <h6 class="card-subtitle mb-2">Date de la fin de l'Événement: {{ $event->date_end_event }}</h6>
                    {{-- <p class="card-text"></p> --}}
                </div>
            </div>

    <div class="LinkBody">
    </div>
</div>

{{-- </x-layout> --}}
