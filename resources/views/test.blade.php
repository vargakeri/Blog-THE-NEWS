<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
        <h6  onclick="admin()">Amministratore</h6>
        <h6 style=" border-left: 0.5px solid black;
    border-right: 0.5px solid black;" onclick="revisor()">Revisore</h6>
        <h6 onclick="redatore()">Redattore</h6>
      </div>
      <div class="containerSettingAdmin">
        <!-- Contenuto per l'amministratore -->
      </div>
      <div class="containerSettingRevisor" >
        <!-- Contenuto per il revisore -->
      </div>
      <div class="containerSettingRedator" >
        <!-- Contenuto per il redattore -->
      </div>
    </div>
  
        </div>

    </main>

    <x-footer />
    <script>
function admin() {
  document.querySelectorAll('.containerSettingRevisor, .containerSettingRedator').forEach(function(el) {
    el.style.display = 'none';
  });
  document.querySelector('.containerSettingAdmin').style.display = 'block';
}

function revisor() {
  document.querySelectorAll('.containerSettingAdmin, .containerSettingRedator').forEach(function(el) {
    el.style.display = 'none';
  });
  document.querySelector('.containerSettingRevisor').style.display = 'block';
}

function redatore() {
  document.querySelectorAll('.containerSettingAdmin, .containerSettingRevisor').forEach(function(el) {
    el.style.display = 'none';
  });
  document.querySelector('.containerSettingRedator').style.display = 'block';
}

    </script>
</body>

</html>
