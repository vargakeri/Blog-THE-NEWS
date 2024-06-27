<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body style="   background-color: #E8ECEF;">
    <x-nav-bar-white />
    <div class="headerIndex">




    </div>
    <main class="mainAllCard">

        <div class="container text-center ">
            <div class="Boxh2Index">
                <div class="hoverBoxh2Index">
                    <h2 class="h2Category">Dashboard</h2>
                </div>
            </div>
      
            <div class="containerDashboard">
                <div class="containerListDashboard">

                    @auth
                        @if (Auth::user()->is_admin)
                            <a href="{{ route('admin.dashboard') }}">
                                <h6 onclick="admin()">Amministratore</h6>
                            </a>
                        @endif
                        @if (Auth::user()->is_revisor)
                            <a href="{{ route('revisor.dashboard') }}">
                                <h6 id="richiesteDashboardH6Hover" onclick="revisor()">Revisore</h6>
                            </a>
                        @endif
                        @if (Auth::user()->is_writer)
                            <h6 id="redatorH6Dashboard" onclick="redatore()">Redattore</h6>
                        @endif
                    @endauth

                </div>
                <x-session />


                <div class="containerSettingRedator">
                    <!-- Contenuto per il redattore -->
                   

                    <div>
                        <h6 class="categorieDashboardH6">ARTICOLI DA REVISIONARE</h6>
                        <x-writer-articles-table :articles="$unrevisionedArticles" />
                    </div>

                    <div>
                        <h6 style="margin: 0px" class="categorieDashboardH6">ARTICOLI PUBBLICATI</h6>
                        <x-writer-articles-table :articles="$acceptedArticles" />
                    </div>

                    <div>
                        <h6 style="margin: 0px" class="categorieDashboardH6">ARTICOLI RESPINTI</h6>
                        <x-writer-articles-table :articles="$rejectedArticles" />
                    </div>


                </div>
            </div>

        </div>

    </main>

    <x-footer />

</body>

</html>
