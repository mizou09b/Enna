<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>

    {{-- boostrap link --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- css styles links --}}

    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    @if (isset($offresCss))
        <link rel="stylesheet" href="{{ asset($offresCss) }}">
    @endif


    {{-- icons links --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- fonts links --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">

</head>

<body>
    {{-- header begins here --}}
    <header>
        <div class="{{ $aboutBg ?? 'background' }}">
            <nav class="main-navbar">
                <div class="logo">
                    <img src="https://www.enna.dz/wp-content/themes/enna/assets/images/logo-ENNA.png"
                        alt="Logo de l'ENNA - École Nationale de Navigation et d'Aéronautique">
                </div>
                <div class="nav-links">
                    <a href="/"><i class="fa-solid fa-house"></i></a>
                    <a href="/about">À Propos</a>
                    <a href="#">Services</a>
                    <a href="#">Activités</a>
                    <a href="/offres">Offres</a>
                </div>
                <div class="search-container">
                    <span class="search-icon" onclick="toggleSearch()" aria-label="Ouvrir la recherche"> <i
                            class="fa-solid fa-magnifying-glass fa-beat"></i></span>
                    <input type="text" id="search-box" class="search-box" placeholder="Recherche..."
                        aria-label="Barre de recherche" style="display:none;">
                </div>

                <nav class="fade-navbar">
                    <div class="nav-links">
                        <div class="logo">
                        </div>
                        <a href="/"><i class="fa-solid fa-house"></i></a>
                        <a href="/about">À Propos</b></a>
                        <a href="#">Services</a>
                        <a href="#">Activités</a>
                        <a href="/offres">Offres</a>
                    </div>
                </nav>
            </nav>

            @if ($showHeader ?? true)
                <h1 class="display-4 pt-5 ps-3 mt-2">
                    Etablissement National<br> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; de la Navigation
                        Aérienne</span></h1>
            @endif

        </div>

        <!-- layout Card -->
        @if ($showCard ?? true)
            <div class="card position-absolute"
                style="top: 130px; right: 40px; width: 20rem; box-shadow: 0 4px 8px rgba(220, 227, 244, 0.8); border-radius: 15px; overflow: hidden; border: 1px solid white">
                <img src="https://feji.us/k4xc9i" class="card-img-top" alt="Card Image"
                    style="width: 100%; height: auto; transition: transform 0.3s ease;">
                <div class="card-body" style="padding: 1rem;">
                    <h5 class="card-title"
                        style="font-family: 'KacsTitle', sans-serif; font-weight: bold; margin-top: 0rem; margin-bottom: 0.5rem; color: #011D70;">
                        Qui sommes-nous</h5>
                    <p class="card-text"
                        style="font-family: 'Arial', sans-serif; font-size: 14px; line-height: 1.6; color: #6d8594;
                 line-height: 130%; padding: 5px">
                        L’ENNA Il a pour mission d’assurer le service public de la sécurité de la navigation aérienne
                        dans
                        l’espace ...
                    </p>
                    <a href="#" class="read-more-btn">Lire la suite</a>
                </div>
            </div>
        @endif
    </header>
    {{-- header ends here --}}

    {{-- button menu --}}
    <div class="menu-container">
        <div class="menu-button" onclick="toggleMenu()">
            <i class="fa-solid fa-sitemap fa-3x"></i>
        </div>
        <div class="social-menu" id="social-menu">
            <div>
                <a href="https://www.instagram.com" target="_blank" class="social-icon">
                    <span class="icon-title">DENA</span>
                    <span class="tooltip-text">Direction de l’Exploitation de la Navigation Aérienne.</span>
                </a>
            </div>
            <div>
                <a href="https://www.twitter.com" target="_blank" class="social-icon">
                    <span class="icon-title">DRFC</span>
                    <span class="tooltip-text">Direction des Ressources des Finances et de la Comptabilité.</span>
                </a>
            </div>
            <div>
                <a href="https://www.facebook.com" target="_blank" class="social-icon">
                    <span class="icon-title">DGRH</span>
                    <span class="tooltip-text">Direction Juridique et des Ressources Humaines</span>
                </a>
            </div>
            <div>
                <a href="https://www.facebook.com" target="_blank" class="social-icon">
                    <span class="icon-title">DTNA</span>
                    <span class="tooltip-text">Direction Technique de la Navigation Aérienne.</span>
                </a>
            </div>
            <div>
                <a href="https://www.facebook.com" target="_blank" class="social-icon">
                    <span class="icon-title">CQRENA</span>
                    <span class="tooltip-text">Centre de Qualification, de Recyclage et d’Expérimentation de la
                        Navigation Aérienne.</span>
                </a>
            </div>
            <div>
                <a href="https://www.facebook.com" target="_blank" class="social-icon">
                    <span class="icon-title">DLOG</span>
                    <span class="tooltip-text">Direction de la Logistique.</span>
                </a>
            </div>
            <div>
                <a href="https://www.facebook.com" target="_blank" class="social-icon">
                    <span class="icon-title">DDNA</span>
                    <span class="tooltip-text">Direction du Développement de la Navigation Aérienne.</span>
                </a>
            </div>
        </div>
    </div>

    {{ $slot }}

    {{-- footer begins here! --}}
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <h5>Suivez-nous sur les réseaux sociaux</h5>
            <div class="social-icons mb-3">
                <a href="#" class="text-white mx-2">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="text-white mx-2">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="text-white mx-2">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="text-white mx-2">
                    <i class="fab fa-linkedin"></i>
                </a>
            </div>
            <p>&copy; 2024 Votre Nom d'Entreprise. Tous droits réservés.</p>
            <p>
                <a href="#" class="text-white">Politique de confidentialité</a> |
                <a href="#" class="text-white">Conditions d'utilisation</a>
            </p>
        </div>
    </footer>
    {{-- end footer --}}

    {{-- script section  --}}
    @vite(['resources/css/style.css', 'resources/js/script.js']) {{--  run npm install and npm run dev --}}
</body>

</html>
