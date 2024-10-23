<x-layout :showCard='false' offresCss='css/styleAdminPages.css' aboutBg='none' :showHeader='false'>

    @if (session()->has('success'))
        <div class="container container-narrow mt-3">
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="container container-narrow mt-3">
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        </div>
    @endif

    {{-- /////////////////////////////////////////// --}}

    @auth
        <section class="table-section">
            <h1 class="header1"
                style="background-color: #011D70; color: white; padding: 15px; border-radius: 10px; text-align: center; font-family: Arial, sans-serif; box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);">
                Gerer les offres
            </h1>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>N˚</th>
                            <th>Référence</th>
                            <th>Objet</th>
                            <th>Date limite</th>
                            <th>Date proroge</th>
                            <th>pdf</th>
                            <th>Observation</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $ide = 1;
                        @endphp
                        @foreach ($offres as $offre)
                            <tr>
                                <td>{{ $ide }}</td>
                                <td>{{ $offre->numero }}</td>
                                <td>{{ $offre->objet }}</td>
                                <td>{{ $offre->date_Limite }}</td>
                                <td>{{ $offre->date_proroge }}</td>
                                <td>
                                    @if ($offre->pdf)
                                        <a href="{{ route('pdf.download', ['pdf' => basename($offre->pdf)]) }}"
                                            target="_blank">Download PDF</a>
                                    @else
                                        No PDF available
                                    @endif
                                </td>
                                <td>{{ $offre->observation }}</td>
                                <td class="text-center">
                                    <a href="{{ route('edit_offre', $offre->id) }}" class="btn btn-info">Modifier</a>
                                    <form method="POST" action="{{ route('delete_offre', $offre->id) }}" class="d-inline"
                                        onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette offre ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            @php
                                $ide += 1;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="btn-container d-flex">
                <a class="btn btn-info text-white border" href="/formulairOffre">Ajouter une offre</a>
                <form action="adminLogout" method="POST" onsubmit="return confirmLogout()">
                    @csrf
                    <button class="btn btn-danger" type="submit">Déconnecter</button>
                </form>
            </div>

            <script>
                function confirmLogout() {
                    return confirm("Êtes-vous sûr de vouloir vous déconnecter ?");
                }
            </script>
        </section>
    @else
        <section class="table-section">
            <h1 class="header1"
                style="background-color: #011D70; color: white; padding: 15px; border-radius: 10px; text-align: center; font-family: Arial, sans-serif; box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);">
                Tableau des offres
            </h1>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>N˚</th>
                            <th>Référence</th>
                            <th>Objet</th>
                            <th>Date limite</th>
                            <th>Date proroge</th>
                            <th>Pdf</th>
                            <th>Observation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $ide = 1;
                        @endphp
                        @foreach ($offres as $offre)
                            <tr>
                                <td>{{ $ide }}</td>
                                <td>{{ $offre->numero }}</td>
                                <td>{{ $offre->objet }}</td>
                                <td>{{ $offre->date_Limite }}</td>
                                <td>{{ $offre->date_proroge }}</td>
                                <td>
                                    @if ($offre->pdf)
                                        <a href="{{ route('pdf.download', ['pdf' => basename($offre->pdf)]) }}"
                                            target="_blank">Download pdf</a>
                                    @else
                                        No PDF available
                                    @endif
                                </td>
                                <td>{{ $offre->observation }}</td>
                            </tr>
                            @php
                                $ide += 1;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    @endauth
</x-layout>
