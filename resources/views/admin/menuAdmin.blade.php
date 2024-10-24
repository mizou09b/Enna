<x-layout :showCard='false' offresCss='css/styleAdminPages.css' aboutBg='none' :showHeader='false'>

    <div class="containerLink">
        <div class="LinkBody">
            <a href="{{ route('OfferForm') }}" class="linkClass">
                <div class="linkContent">
                    <i class="fa-solid fa-briefcase fa-2x"></i>
                    <span>{{__('headers.offerForm')}}</span>
                </div>
            </a>
        </div>

        <div class="LinkBody">
            <a href="{{ route('eventForm') }}" class="linkClass">
                <div class="linkContent">
                    <i class="fa-solid fa-calendar fa-2x"></i>
                    <span>{{__('headers.eventForm')}}</span>
                </div>
            </a>
        </div>

        <div class="LinkBody">
            <a href="{{ route('ennaNumbers') }}" class="linkClass">
                <div class="linkContent">
                    <i class="fa-solid fa-arrow-trend-up fa-2x"></i>
                    <span>{{__('headers.ennaNumbers')}}</span>
                </div>
            </a>
        </div>
    </div>

    <button class="btn btn-danger ms-2" type="button" onclick="confirmLogout()">{{__('buttons.desconnect')}}</button>

    <script>
        async function confirmLogout() {

            if (confirm("Êtes-vous sûr de vouloir vous déconnecter ?")) {
                const response = await fetch('/adminLogout', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token
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
