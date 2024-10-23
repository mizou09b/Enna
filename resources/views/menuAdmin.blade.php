<x-layout :showCard='false' offresCss='css/styleAdminPages.css' aboutBg='none' :showHeader='false'>

    <div class="containerLink">
        <div class="LinkBody">
            <a href="/formulairOffre" class="linkClass">Formulair Offre</a>
        </div>
        <div class="LinkBody">
            <a href="/eventsForm" class="linkClass">Formulair events</a>
        </div>
    </div>

    <button class="btn btn-danger ms-2" type="button" onclick="confirmLogout()">Déconnecter</button>

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

</x-layout>
