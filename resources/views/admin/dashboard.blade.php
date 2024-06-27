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
        <h6 id="adminH6Dashboard"  onclick="admin()">Amministratore</h6>
        @endif
        @if (Auth::user()->is_revisor)
        <a  href="{{ route('revisor.dashboard') }}">
            <h6 id="richiesteDashboardH6Hover"   onclick="revisor()">Revisore</h6>
          </a>
        @endif
        @if (Auth::user()->is_writer)
           <a  href="{{ route('writer.dashboard') }}"> <h6 onclick="redatore()">Redattore</h6></a>
      
        @endif
        @endauth
      </div>
      <x-session/>
      <div class="containerSettingAdmin">
        <!-- Contenuto per l'amministratore -->


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    

    <h6 class="categorieDashboardH6">RICHIESTE</h6>
        <div>
            
            <h6 class="richiesteDashboardH6" >Amministratore</h6>
            <x-requests-table :roleRequest="$adminRequests" role="amministratore" />
            
        </div>
   
   
        <div>
            <h6  class="richiesteDashboardH6" >Revisore</h6>
            <x-requests-table  :roleRequest="$revisorRequests" role="revisore" />
        </div>
   
        <div>
            <h6 class="richiesteDashboardH6" >Redattore</h6>
            <x-requests-table :roleRequest="$writerRequests" role="redattore" />
        </div>
   
    
  
        <div>
            <h6 style="margin: 0px" class="categorieDashboardH6">CATEGORIE</h6>
            <x-metainfo-table :metaInfos="$categories" metaType="categories" />
            <form style="padding: 0px 15px 30px 15px" action="{{route('admin.storeCategory')}}" class="d-flex" method="POST">
                @csrf
                <input style="border-radius:0px" type="text" name="name" class="form-control me-2" placeholder="Inserisci una nuova categoria">
                <button  type="submit" class="attivaBottone">Aggiungi</button>
            </form>
        </div>


      </div>
     
    </div>
  
        </div>

    </main>

    <x-footer />
</body>

</html>

