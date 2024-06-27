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
    <main class="mainShow">
<div style="background-image: url({{ Storage::exists($article->image) ? Storage::url($article->image) : asset('/default.jpg') }})" class="imageShow"></div>
<div class="detailShow" >
    <p>Redatto da <a href="{{ route('article.byUser', ['user' => $article->user->id]) }}"><strong>{{ $article->user->name }}</strong></a> il <strong>{{ $article->created_at->format('d/m/Y') }}</strong></p>
    <h2>{{ $article->title }}</h2>
    <h4>{{ $article->subtitle }}</h4>
    <strong>

    <h5>
       <a href="{{ route('article.byCategory', ['category' => $article->category->id]) }}">
         {{ strtoupper($article->category->name) }}
       </a> | 
       @foreach ($article->tags as $tag)
         <span>{{ $tag->name }}</span>
       @endforeach
     </h5>
     
   
</strong>
 
   <p class="bodyShow">{{ $article->body }}</p>
   @unless(Auth::user() && Auth::user()->is_revisor && $article->is_accepted == NULL)
   <a href="{{ route('article.index') }}" class="bottomTornaIndietro">Torna indietro</a>
 @endunless

   @if(Auth::user() && Auth::user()->is_revisor && $article->is_accepted == NULL)
  <div class="containerFormAcceptReject">
       <form action="{{ route('revisor.acceptArticle', compact('article')) }}" method="POST">
           @csrf
           <button class="bottomTornaAcetta">Accetta articolo</button>
       </form>
       <form action="{{ route('revisor.rejectArticle', compact('article')) }}" method="POST">
           @csrf
           <button class="bottomTornaRifiuta">Rifiuta articolo</button>
       </form>
  </div>
   @endif
    
</div>
 

    </main>

    <x-footer/>
</body>

</html>
