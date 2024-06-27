<x-layout>
    <x-navbar-new />
  <main class="mainLogin">
        <div class="boxImgLogin">
            <div class="logoMobileLogin"> </div>
            <div class="boxGlassLogin" ><p>REGISTRATI IN TUTTA SICUREZZA PER SCOPRIRE NUOVI ANNUNCI. COMPLETA IL MODULO DI REGISTRAZIONE CON I TUOI DATI PERSONALI PER CREARE UN NUOVO ACCOUNT E ACCEDERE A TUTTE LE FUNZIONALITÀ DEL NOSTRO SITO.</p></div>
        </div>
    
    
        <div class="boxForm">
            <div class="logoLogin">
                <a  href="{{route('home')}}">
                    <h1> THE|POST</h1>
                </a>
                
            </div>

    
    <h3>Registrati</h3>
    <form action="{{route('register')}}" method="POST">
        @csrf
        <div >
            <label for="username"  ></label>
            <input  name="name" type="text" class="form-control" id="username" value="{{old('name')}}" placeholder="Inserisci username">
            @error('name')
            <div class="divErrorBox">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="email" ></label>
            <input placeholder="Inserisci la tua email" name="email" type="email" class="form-control" id="email"value="{{old('email')}}">
            @error('email')
            <div class="divErrorBox">{{ $message }}</div>
            @enderror
        </div>
        <div >
            <label for="password"></label>
            <input placeholder="Inserisci la tua password" name="password" type="password" class="form-control" id="password">
            @error('password')
            <div class="divErrorBox">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="password_confirmation" ></label>
            <input placeholder="Conferma la tua password" name="password_confirmation" type="password" class="form-control"
                id="password_confirmation">
             
        </div>
        
        <button class="bottomLogin" type="submit" >Registrati</button>
        <p style="font-size: clamp(0.7rem, 1vw, 0.9rem)" >Già registrato? <a class="loginAncor" href="{{route('login')}}">Clicca qui</a</a></p>
    </form>
    
        </div>
  </main>


</x-layout>
