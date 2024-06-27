<x-layout>
    <x-navbar-new />
    
  <main class="mainLogin">
    
        <div class="boxImgLogin">
           <div class="logoMobileLogin"> </div>
           <div class="boxGlassLogin" ><p>ACCEDI AL TUO ACCOUNT IN MODO SICURO PER VISUALIZZARE E GESTIRE I TUOI ANNUNCI INSERISCI LA TUA EMAIL E PASSWORD PER INIZIARE.</p></div>
        </div>
    
     
        <div class="boxForm">
            <div class="logoLogin">
                <a  href="{{route('home')}}">
                    <h1> THE|POST</h1>
                </a>
            </div>
           
          
    <h3>Accedi</h3>

    <form  action="{{route('login')}}" method="POST">
        @csrf
        <div >
            <label for="email" class="form-label"></label>
            <input placeholder="Inserisci la tua email" name="email" type="email" class="form-control" id="email"value="{{old('email')}}">
            @error('email')
            <div class="divErrorBox">{{ $message }}</div>
            @enderror
        </div>
        <div >
            <label for="password" class="form-label"></label>
            <input name="password" type="password" class="form-control" id="Inserisci la tua password" placeholder="Password" >
        </div>
      

        <button class="bottomLogin" type="submit" >Accedi</button>
        <p style="font-size: clamp(0.7rem, 1vw, 0.9rem)" >Non sei ancora registrato? <a class="loginAncor" href="{{route('register')}}">Clicca qui</a></p>
    </form>
    
        </div>
  </main>




</x-layout>