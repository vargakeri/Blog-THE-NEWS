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
                    <h2 class="h2Category">Lavora con noi</h2>

                </div>
            </div>
            <div style="height: auto" class="containerArticleCreate">

                <div class="boxWorkDescription">
                    <div style="height: auto;" class="contaionerWorkDescription ">
                        @if (!Auth::user()->is_admin)
                            <div class="workDescription">
                                <h2>Lavora come amministratore</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, assumenda voluptates
                                    mollitia dicta
                                    suscipit sapiente minus architecto dolor alias quisquam quibusdam, facere voluptatum
                                    vero libero at?
                                    Quasi animi consectetur ducimus.</p>
                            </div>
                        @endif
                        @if (!Auth::user()->is_revisor)
                            <div class="workDescription">
                                <h2>Lavora come revisore</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, assumenda voluptates
                                    mollitia dicta
                                    suscipit sapiente minus architecto dolor alias quisquam quibusdam, facere voluptatum
                                    vero libero at?
                                    Quasi animi consectetur ducimus.</p>
                            </div>
                        @endif
                        @if (!Auth::user()->is_writer)
                            <div class="workDescription">
                                <h2>Lavora come redattore</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, assumenda voluptates
                                    mollitia dicta
                                    suscipit sapiente minus architecto dolor alias quisquam quibusdam, facere voluptatum
                                    vero libero at?
                                    Quasi animi consectetur ducimus.</p>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="containerFormWork">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="formCareers" action="{{ route('careers.submit') }}" method="POST" ">
                    @csrf
            
                        <label for="role" class="form-label"></label>
                        <select name="role" id="role" class="form-control">
                            <option value="">Scegli la posizione richiesta</option>
                            @if(!Auth::user()->is_admin)
                            <option value="admin">Amministratore</option>
                            @endif
                            @if(!Auth::user()->is_revisor)
                            <option value="revisor">Revisore</option>
                            @endif
                            @if(!Auth::user()->is_writer)
                            <option value="writer">Redattore</option>
                            @endif
                        </select>
          
               
                        <label for="email"></label>
                        <input  placeholder="Inserisci la tua email" type="email" name="email" id="email" class="form-control"
                            value="{{ old('email') ?? Auth::user()->email }}">
                
              
                        <label for="message"></label>
                        <textarea placeholder="Parlaci di te" name="message" id="message" cols="30" rows="7" class="form-control">{{ old('message') }}</textarea>
              
             
                        <button style="margin-top: 40px" class="bottomFormCreateArticle">Invia la tua candidatura</button>
                   
                </form>
                </div>

            </div>
        </div>

    </main>

    <x-footer />
</body>

</html>
