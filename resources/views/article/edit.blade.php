{{-- <!DOCTYPE html>
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
                    <h2 class="h2Category">Modifica articolo</h2>

                </div>
            </div>
            <div class="containerArticleCreate">

                <div class="boxPreviewArticleCreate" >
                    <div  class="containerAllCard ">
                        <img style="object-position: top"  src="{{ Storage::exists($article->image) ? Storage::url($article->image) : asset('/default.jpg') }}"    alt="">
<div class="containerDetailAllCard">
  <div class="articleInfo">
    <p>Redatto il {{ $article->created_at }}</p>
    <h4>{{ $article->title }}</h4>
    <h5>{{ $article->subtitle }}</h5>
  </div>
  <div class="articleMetadata">
    <p><strong>Categoria:</strong> {{ $article->category->name }}</p>
    <p><strong>Tag:</strong> {{ $article->tags->pluck('name')->implode(', ') }}</p>
    <p><strong>Autori:</strong> {{ $article->user->name }}</p>
  </div>
</div>

                    </div>
                </div>
                <div class="containerFormCreateArticle" >
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="formCreateArticle"  action="{{ route('article.store') }}" method="POST" "
                        enctype="multipart/form-data">
                        
                        @csrf
                        <div >
                            <label for="title" class="form-label"></label>
                            <input style="border-radius: 0px" placeholder="{{ $article->title }}" type="text" name="title" class="form-control" id="title"
                                value="{{ old('title') }}">
                        </div>
                        <div >
                            <label for="subtitle" class="form-label"></label>
                            <input style="border-radius: 0px" placeholder="{{ $article->subtitle }}" type="text" name="subtitle" class="form-control" id="subtitle"
                                value="{{ old('subtitle') }}">
                        </div>
                        <div >
                            <label for="image" class="form-label"></label>
                            <input style="border-radius: 0px" placeholder="Immagine" type="file" name="image" class="form-control" id="image">
                        </div>
                        <div >
                            <label for="tags" class="form-label"></label>
                            <input style="border-radius: 0px" placeholder="{{ $article->tags->pluck('name')->implode(', ') }}" name="tags" class="form-control" id="tags" value="{{ old('tags') }}">
                           
                        </div>
                        <div >
                            <label for="category" class="form-label"></label>
                            <select style="border-radius: 0px" name="category" id="category" class="form-control text-capitalize">
                                <option value="">{{ $article->category->name }}</option>
                                @foreach ($categories as $category)
                                    @if ($category->id !== $article->category_id)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div >
                            <label for="body" class="form-label"></label>
                            <textarea style="border-radius: 0px" placeholder="{{ $article->body }}" name="body" id="body" cols="30" rows="7" class="form-control">{{ old('body') }}</textarea>
                            
                        </div>
                       
                         
                             <div>
                                    <button class="bottomFormCreateArticle">
                                        Modifica articolo
                                    </button>
                             </div>
                   
                    </form>
                </div>

            </div>
        </div>

    </main>

    <x-footer />
</body>

</html> --}}

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
                    <h2 class="h2Category">Modifica l'articolo</h2>

                </div>
            </div>
            <livewire-form-create :article="$article" />
        </div>

    </main>

    <x-footer />
</body>

</html>

