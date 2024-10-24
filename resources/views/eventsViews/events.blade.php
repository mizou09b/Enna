<x-layout :events='$events' :showCard='false' offresCss='css/styleAdminPages.css' aboutBg='none' :showHeader='false'>

    @auth
        <div id="parallax-world-of-ugg">
            <section>
                <div class="title">
                    <h3>Let's check some</h3>
                    <h1 style="color: #011D70">{{ __('headers.seeEvents') }}</h1>
                </div>
            </section>

            @foreach ($events as $event)
                <section>
                    <div class="parallax-one"
                        style="background-image: url('{{ asset('storage/' . $event->event_image) }}'); padding-top: 200px; padding-bottom: 200px; overflow: hidden; position: relative; width: 100%; background-attachment: fixed; background-size: cover; background-repeat: no-repeat; background-position: top center;">
                        <h2 style="color: #007bff">{{ $event->title }}</h2>
                    </div>
                </section>

                <section>
                    <div class="block">
                        <p>
                            {{ $event->observation }}
                        </p>
                        <hr>
                    </div>
                </section>
                <div>
                    <a href="{{ route('edit_event', $event->id) }}" class="btn btn-info">{{__('buttons.modify')}}</a>
                    <a class="btn btn-info text-white border" href="/eventsForm">{{__('buttons.addForm')}}</a>
                    <form method="POST" action="{{ route('delete_event', $event->id) }}" class="d-inline"
                        onsubmit="return confirm('Are you positive you want to delete this event ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{__('buttons.delete')}}</button>
                    </form>
                    <button class="btn btn-danger ms-2" type="button" onclick="confirmLogout()">{{__('buttons.desconnect')}}</button>
                </div>
            @endforeach
        </div>
    @else
        <div id="parallax-world-of-ugg">
            <section>
                <div class="title">
                    <h3>Let's check some </h3>
                    <h1 style="color: #011D70">{{ __('headers.seeEvents') }}</h1>
                </div>
            </section>

            @foreach ($events as $event)
                <section>
                    <div class="parallax-one"
                        style="background-image: url('{{ asset('storage/' . $event->event_image) }}'); padding-top: 200px; padding-bottom: 200px; overflow: hidden; position: relative; width: 100%; background-attachment: fixed; background-size: cover; background-repeat: no-repeat; background-position: top center;">
                        <h2 style="color: #007bff">{{ $event->title }}</h2>
                    </div>
                </section>

                <section>
                    <div class="block">
                        <p>
                            {{ $event->observation }}
                        </p>
                        <hr>
                    </div>
                </section>
            @endforeach
        </div>
    @endauth

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
