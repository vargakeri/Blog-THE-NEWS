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
    <div class="headerIndexCategory">


    </div>
    <main class="mainAllCard">

        <div class="container text-center ">
            <div class="boxh2Category">
                <div class="hoverBoxh2Category">
                    <h2 class="h2Category">{{ $category->name }}</h2>
                </div>

            </div>
            <div class="row ">

                @if (session('message'))
                    <div class="alert alert-success text-center">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="container my-5">
                    <div  style="background-color:white;" class="row p-3">
                  @foreach ($articles as $article)
                     
                          <div  class="col-12 col-md-6 col-lg-4 col-ml-4 col-sm-12 p-2">
                              <x-card title="{{ $article->title }}" subtitle="{{ $article->subtitle }}"
                                  image="{{ $article->image }}" category="{{ $article->category->name }}"
                                  data="{{ $article->created_at->format('d/m/Y') }}"
                                  url="{{ route('article.show', compact('article')) }}"
                                  user="{{ $article->user->name }}"
                                  urlCategory="{{ route('article.byCategory', ['category' => $article->category->id]) }}"
                                  urlUser="{{ route('article.byUser', ['user' => $article->user->id]) }}"
                                  :tags="$article->tags" readDuration="{{ $article->readDuration() }}" />
                          </div>
                      @endforeach
                      
                        
                    </div>
                </div>


            </div>
        </div>

    </main>

    <x-footer/>
</body>

</html>
