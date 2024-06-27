<x-layout>
    <header>
        <x-navbar-new />
  
        <p>LUCA & APOL</p>
        <h2>Notizie globali e voci locali, il tuo <br>
            spazio per <span class="txt-rotate" data-period="1000"
                data-rotate='[ "informarti","esprimerti.", "manifestarti.", "raccontarti." ]'> </span>
        </h2>
        <div class="containerFeautured">
            <h6>IN EVIDENZA</h6>
            <p><a href="{{route('article.byCategory', ['category' => '1'])}}">Politica</a> - <a href="{{route('article.byCategory', ['category' => '2'])}}">Economia</a> - <a href="{{route('article.byCategory', ['category' => '6'])}}">Tech</a> </p>
        </div>
    </header>
    <main>
        {{-- blocco di codice 1 POLITICA --}}
        <div style="background-color: #f7f7f7;" class="test">
            <div class="boxDivImg">
                <div class="divImg">
                    <div class="boxDivImgGlass">
                        <h2> POLITICA</h2>
                        <p>Tieniti aggiornato sulle ultime novità politiche a livello locale, nazionale e
                            internazionale. Scopri analisi, opinioni e approfondimenti su governi, elezioni,
                            politiche
                            pubbliche e molto altro.
                        </p>
                        <a href="{{route('article.byCategory', ['category' => '1'])}}" class="buttonDivImgCat">Scopri..</a>
                    </div>
                </div>
            </div>
            <div class="boxCards">
                <div class="containerCard1">
                    @foreach ($articlePolitica as $key => $article)
                        @if ($key == 0)
                            <a href="{{ route('article.show', compact('article')) }}" class="cardHomeLarge">
                                <div class="imgCardLarge">
                                    <img src="{{ Storage::exists($article->image) ? Storage::url($article->image) : asset('/default.jpg') }}" alt="">
                                    <div class="divHover"></div>
                                </div>
                                <div class="infoCardLarge">
                                    <div class="infoCardDateLarge">
                                        <p class="categoryCard">{{ $article->category->name }} </p>
                                        <p>{{ $article->created_at }}</p>
                                    </div>
                                    <h4>{{Str::limit($article->title, 36) }}</h4>
                                </div>
                            </a>
                        @elseif ($key == 2)
                           
                        <a href="{{ route('article.show', compact('article')) }}" class="cardHomeSmall">
                                <div class="divHoverSmall"></div>
                                <img src="{{ Storage::exists($article->image) ? Storage::url($article->image) : asset('/default.jpg') }}" alt="">

                                <div class="infoSmallCard">
                                    <div>
                                        <div class="infoCardDateSmall">
                                            <p class="categoryCard">{{ $article->category->name }}</p>
                                            <p>{{ $article->created_at }}</p>
                                        </div>
                                        <h4>{{Str::limit($article->title, 36) }}</h4>
                                    </div>
                                </div>
                            </a>
                            
                        @endif
                    @endforeach
                </div>
                <div class="containerCard2">
                    @foreach ($articlePolitica as $key => $article)
                        @if ($key == 1)
                            <a href="{{ route('article.show', compact('article')) }}" class="cardHomeSmall">
                                <div class="divHoverSmall"></div>
                                <img src="{{ Storage::exists($article->image) ? Storage::url($article->image) : asset('/default.jpg') }}" alt="">
                                <div class="infoSmallCard">
                                    <div>
                                        <div class="infoCardDateSmall">
                                            <p class="categoryCard">{{ $article->category->name }}</p>
                                            <p>{{ $article->created_at }}</p>
                                        </div>
                                        <h4>{{Str::limit($article->title, 36) }}                     </div>
                                </div>
                            </a>
                        @elseif ($key == 3)
                            <a href="{{ route('article.show', compact('article')) }}" class="cardHomeLarge">
                                <div class="imgCardLarge">
                                    <img src="{{ Storage::exists($article->image) ? Storage::url($article->image) : asset('/default.jpg') }}" alt="">
                                    <div class="divHover"></div>
                                </div>
                                <div class="infoCardLarge">
                                    <div class="infoCardDateLarge">
                                        <p class="categoryCard">{{ $article->category->name }} </p>
                                        <p>{{ $article->created_at }}</p>
                                    </div>
                                    <h4>{{Str::limit($article->title, 36) }}</h4>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        {{-- blocco di codice 2 ECONOMIA --}}
        <div id="test2" class="test">
            <div class="boxCards">
                <div class="containerCard1">
                    @foreach ($articleEconomia as $key => $article)
                        @if ($key == 0)
                            <a href="{{ route('article.show', compact('article')) }}" class="cardHomeLarge">
                                <div class="imgCardLarge">
                                    <img src="{{ Storage::exists($article->image) ? Storage::url($article->image) : asset('/default.jpg') }}" alt="">
                                    <div class="divHover"></div>
                                </div>
                                <div class="infoCardLarge">
                                    <div class="infoCardDateLarge">
                                        <p class="categoryCard">{{ $article->category->name }} </p>
                                        <p>{{ $article->created_at }}</p>
                                    </div>
                                    <h4>{{Str::limit($article->title, 36) }}</h4>
                                </div>
                            </a>
                        @elseif ($key == 2)
                            <a href="{{ route('article.show', compact('article')) }}" class="cardHomeSmall">
                                <div class="divHoverSmall"></div>
                                <img src="{{ Storage::exists($article->image) ? Storage::url($article->image) : asset('/default.jpg') }}" alt="">

                                <div class="infoSmallCard">
                                    <div>
                                        <div class="infoCardDateSmall">
                                            <p class="categoryCard">{{ $article->category->name }}</p>
                                            <p>{{ $article->created_at }}</p>
                                        </div>
                                        <h4>{{Str::limit($article->title, 36) }}</h4>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
                <div class="containerCard2">
                    @foreach ($articleEconomia as $key => $article)
                        @if ($key == 1)
                            <a href="{{ route('article.show', compact('article')) }}" class="cardHomeSmall">
                                <div class="divHoverSmall"></div>
                                <img src="{{ Storage::exists($article->image) ? Storage::url($article->image) : asset('/default.jpg') }}" alt="">
                                <div class="infoSmallCard">
                                    <div>
                                        <div class="infoCardDateSmall">
                                            <p class="categoryCard">{{ $article->category->name }}</p>
                                            <p>{{ $article->created_at }}</p>
                                        </div>
                                        <h4>{{Str::limit($article->title, 36) }}</h4>
                                    </div>
                                </div>
                            </a>
                        @elseif ($key == 3)
                            <a href="{{ route('article.show', compact('article')) }}" class="cardHomeLarge">
                                <div class="imgCardLarge">
                                    <img src="{{ Storage::exists($article->image) ? Storage::url($article->image) : asset('/default.jpg') }}" alt="">
                                    <div class="divHover"></div>
                                </div>
                                <div class="infoCardLarge">
                                    <div class="infoCardDateLarge">
                                        <p class="categoryCard">{{ $article->category->name }} </p>
                                        <p>{{ $article->created_at }}</p>
                                    </div>
                                    <h4>{{Str::limit($article->title, 36) }}</h4>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
            <div  class="boxDivImg">
                <div class="divImg">
                    <div class="boxDivImgGlass">
                        <h2> ECONOMIA</h2>
                        <p>Approfondisci le dinamiche economiche a livello globale e locale. Leggi analisi e aggiornamenti su mercati finanziari, politiche economiche, tendenze di mercato e come questi fattori influenzano il mondo degli affari e la vita quotidiana.</p>
                            <a href="{{route('article.byCategory', ['category' => '2'])}}" class="buttonDivImgCat">Scopri..</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- blocco di codice 3 Food&Drink --}}
        <div style="background-color: #f7f7f7;" class="test">
            <div class="boxDivImg">
                <div class="divImg">
                    <div class="boxDivImgGlass">
                        <h2> FOOD&DRINK</h2>
                        <p>Immergiti nel mondo del cibo e delle bevande con ricette, recensioni di ristoranti e consigli su vini e cocktail. Scopri tendenze culinarie, esplora cucine internazionali e trova ispirazione per i tuoi pasti quotidiani e le occasioni speciali.
                        </p>
                        <a href="{{route('article.byCategory', ['category' => '3'])}}" class="buttonDivImgCat">Scopri..</a>
                    </div>
                </div>
            </div>
            <div class="boxCards">
                <div class="containerCard1">
                    @foreach ($articleFood as $key => $article)
                        @if ($key == 0)
                            <a href="{{ route('article.show', compact('article')) }}" class="cardHomeLarge">
                                <div class="imgCardLarge">
                                    <img src="{{ Storage::exists($article->image) ? Storage::url($article->image) : asset('/default.jpg') }}" alt="">
                                    <div class="divHover"></div>
                                </div>
                                <div class="infoCardLarge">
                                    <div class="infoCardDateLarge">
                                        <p class="categoryCard">{{ $article->category->name }} </p>
                                        <p>{{ $article->created_at }}</p>
                                    </div>
                                    <h4>{{Str::limit($article->title, 36) }}</h4>
                                </div>
                            </a>
                        @elseif ($key == 2)
                            <a href="{{ route('article.show', compact('article')) }}" class="cardHomeSmall">
                                <div class="divHoverSmall"></div>
                                <img src="{{ Storage::exists($article->image) ? Storage::url($article->image) : asset('/default.jpg') }}" alt="">

                                <div class="infoSmallCard">
                                    <div>
                                        <div class="infoCardDateSmall">
                                            <p class="categoryCard">{{ $article->category->name }}</p>
                                            <p>{{ $article->created_at }}</p>
                                        </div>
                                        <h4>{{Str::limit($article->title, 36) }}</h4>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
                <div class="containerCard2">
                    @foreach ($articleFood as $key => $article)
                        @if ($key == 1)
                            <a href="{{ route('article.show', compact('article')) }}" class="cardHomeSmall">
                                <div class="divHoverSmall"></div>
                                <img src="{{ Storage::exists($article->image) ? Storage::url($article->image) : asset('/default.jpg') }}" alt="">
                                <div class="infoSmallCard">
                                    <div>
                                        <div class="infoCardDateSmall">
                                            <p class="categoryCard">{{ $article->category->name }}</p>
                                            <p>{{ $article->created_at }}</p>
                                        </div>
                                        <h4>{{Str::limit($article->title, 36) }}</h4>
                                    </div>
                                </div>
                            </a>
                        @elseif ($key == 3)
                            <a href="{{ route('article.show', compact('article')) }}" class="cardHomeLarge">
                                <div class="imgCardLarge">
                                    <img src="{{ Storage::exists($article->image) ? Storage::url($article->image) : asset('/default.jpg') }}" alt="">
                                    <div class="divHover"></div>
                                </div>
                                <div class="infoCardLarge">
                                    <div class="infoCardDateLarge">
                                        <p class="categoryCard">{{ $article->category->name }} </p>
                                        <p>{{ $article->created_at }}</p>
                                    </div>
                                    <h4>{{Str::limit($article->title, 36) }}</h4>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        {{-- blocco di codice 4 SPORT --}}
        <div id="test2" class="test">
            <div class="boxCards">
                <div class="containerCard1">
                    @foreach ($articleSport as $key => $article)
                        @if ($key == 0)
                            <a href="{{ route('article.show', compact('article')) }}" class="cardHomeLarge">
                                <div class="imgCardLarge">
                                    <img src="{{ Storage::exists($article->image) ? Storage::url($article->image) : asset('/default.jpg') }}" alt="">
                                    <div class="divHover"></div>
                                </div>
                                <div class="infoCardLarge">
                                    <div class="infoCardDateLarge">
                                        <p class="categoryCard">{{ $article->category->name }} </p>
                                        <p>{{ $article->created_at }}</p>
                                    </div>
                                    <h4>{{Str::limit($article->title, 36) }}</h4>
                                </div>
                            </a>
                        @elseif ($key == 2)
                            <a href="{{ route('article.show', compact('article')) }}" class="cardHomeSmall">
                                <div class="divHoverSmall"></div>
                                <img src="{{ Storage::exists($article->image) ? Storage::url($article->image) : asset('/default.jpg') }}" alt="">

                                <div class="infoSmallCard">
                                    <div>
                                        <div class="infoCardDateSmall">
                                            <p class="categoryCard">{{ $article->category->name }}</p>
                                            <p>{{ $article->created_at }}</p>
                                        </div>
                                        <h4>{{Str::limit($article->title, 36) }}</h4>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
                <div class="containerCard2">
                    @foreach ($articleSport as $key => $article)
                        @if ($key == 1)
                            <a href="{{ route('article.show', compact('article')) }}" class="cardHomeSmall">
                                <div class="divHoverSmall"></div>
                                <img src="{{ Storage::exists($article->image) ? Storage::url($article->image) : asset('/default.jpg') }}" alt="">
                                <div class="infoSmallCard">
                                    <div>
                                        <div class="infoCardDateSmall">
                                            <p class="categoryCard">{{ $article->category->name }}</p>
                                            <p>{{ $article->created_at }}</p>
                                        </div>
                                        <h4>{{Str::limit($article->title, 36) }}</h4>
                                    </div>
                                </div>
                            </a>
                        @elseif ($key == 3)
                            <a href="{{ route('article.show', compact('article')) }}" class="cardHomeLarge">
                                <div class="imgCardLarge">
                                    <img src="{{ Storage::exists($article->image) ? Storage::url($article->image) : asset('/default.jpg') }}" alt="">
                                    <div class="divHover"></div>
                                </div>
                                <div class="infoCardLarge">
                                    <div class="infoCardDateLarge">
                                        <p class="categoryCard">{{ $article->category->name }} </p>
                                        <p>{{ $article->created_at }}</p>
                                    </div>
                                    <h4>{{Str::limit($article->title, 36) }}</h4>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="boxDivImg">
                <div class="divImg">
                    <div class="boxDivImgGlass">
                        <h2> SPORT</h2>
                        <p>Esplora il mondo dello sport con notizie, risultati e analisi delle tue discipline preferite. Dalle competizioni internazionali ai campionati locali, resta informato su tutto ciò che accade nel mondo dello sport.
                        </p>
                            <a href="{{route('article.byCategory', ['category' => '4'])}}" class="buttonDivImgCat">Scopri..</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- blocco di codice 5 INTRATTENIMENTO --}}
        <div style="background-color: #f7f7f7;" class="test">
            <div class="boxDivImg">
                <div class="divImg">
                    <div class="boxDivImgGlass">
                        <h2 style="text-align: center">INTRATTENIMENTO</h2>
                        <p>Tuffati nel mondo dell'intrattenimento con notizie su film, serie TV, musica e spettacoli dal vivo. Resta aggiornato sulle ultime uscite, leggi recensioni, scopri gossip sulle celebrità e segui gli eventi più importanti del panorama culturale e dello spettacolo.
                        </p>
                        <a href="{{route('article.byCategory', ['category' => '5'])}}" class="buttonDivImgCat">Scopri..</a>
                    </div>
                </div>
            </div>
            <div class="boxCards">
                <div class="containerCard1">
                    @foreach ($articleIntrattenimento as $key => $article)
                        @if ($key == 0)
                            <a href="{{ route('article.show', compact('article')) }}" class="cardHomeLarge">
                                <div class="imgCardLarge">
                                    <img src="{{ Storage::exists($article->image) ? Storage::url($article->image) : asset('/default.jpg') }}" alt="">
                                    <div class="divHover"></div>
                                </div>
                                <div class="infoCardLarge">
                                    <div class="infoCardDateLarge">
                                        <p class="categoryCard">{{ $article->category->name }} </p>
                                        <p>{{ $article->created_at }}</p>
                                    </div>
                                    <h4>{{Str::limit($article->title, 36) }}</h4>
                                </div>
                            </a>
                        @elseif ($key == 2)
                            <a href="{{ route('article.show', compact('article')) }}" class="cardHomeSmall">
                                <div class="divHoverSmall"></div>
                                <img src="{{ Storage::exists($article->image) ? Storage::url($article->image) : asset('/default.jpg') }}" alt="">

                                <div class="infoSmallCard">
                                    <div>
                                        <div class="infoCardDateSmall">
                                            <p class="categoryCard">{{ $article->category->name }}</p>
                                            <p>{{ $article->created_at }}</p>
                                        </div>
                                        <h4>{{Str::limit($article->title, 36) }}</h4>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
                <div class="containerCard2">
                    @foreach ($articleIntrattenimento as $key => $article)
                        @if ($key == 1)
                            <a href="{{ route('article.show', compact('article')) }}" class="cardHomeSmall">
                                <div class="divHoverSmall"></div>
                                <img src="{{ Storage::exists($article->image) ? Storage::url($article->image) : asset('/default.jpg') }}" alt="">
                                <div class="infoSmallCard">
                                    <div>
                                        <div class="infoCardDateSmall">
                                            <p class="categoryCard">{{ $article->category->name }}</p>
                                            <p>{{ $article->created_at }}</p>
                                        </div>
                                        <h4>{{Str::limit($article->title, 36) }}</h4>
                                    </div>
                                </div>
                            </a>
                        @elseif ($key == 3)
                            <a href="{{ route('article.show', compact('article')) }}" class="cardHomeLarge">
                                <div class="imgCardLarge">
                                    <img src="{{ Storage::exists($article->image) ? Storage::url($article->image) : asset('/default.jpg') }}" alt="">
                                    <div class="divHover"></div>
                                </div>
                                <div class="infoCardLarge">
                                    <div class="infoCardDateLarge">
                                        <p class="categoryCard">{{ $article->category->name }} </p>
                                        <p>{{ $article->created_at }}</p>
                                    </div>
                                    <h4>{{Str::limit($article->title, 36) }}</h4>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        {{-- blocco di codice 6 TECH --}}
        <div id="test2" class="test">
            <div class="boxCards">
                <div class="containerCard1">
                    @foreach ($articleTech as $key => $article)
                        @if ($key == 0)
                            <a href="{{ route('article.show', compact('article')) }}" class="cardHomeLarge">
                                <div class="imgCardLarge">
                                    <img src="{{ Storage::exists($article->image) ? Storage::url($article->image) : asset('/default.jpg') }}" alt="">
                                    <div class="divHover"></div>
                                </div>
                                <div class="infoCardLarge">
                                    <div class="infoCardDateLarge">
                                        <p class="categoryCard">{{ $article->category->name }} </p>
                                        <p>{{ $article->created_at }}</p>
                                    </div>
                                    <h4>{{Str::limit($article->title, 36) }}</h4>
                                </div>
                            </a>
                        @elseif ($key == 2)
                            <a href="{{ route('article.show', compact('article')) }}" class="cardHomeSmall">
                                <div class="divHoverSmall"></div>
                                <img src="{{ Storage::exists($article->image) ? Storage::url($article->image) : asset('/default.jpg') }}" alt="">
                                <div class="infoSmallCard">
                                    <div>
                                        <div class="infoCardDateSmall">
                                            <p class="categoryCard">{{ $article->category->name }}</p>
                                            <p>{{ $article->created_at }}</p>
                                        </div>
                                        <h4>{{Str::limit($article->title, 36) }}</h4>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
                <div class="containerCard2">
                    @foreach ($articleTech as $key => $article)
                        @if ($key == 1)
                            <a href="{{ route('article.show', compact('article')) }}" class="cardHomeSmall">
                                <div class="divHoverSmall"></div>
                                <img src="{{ Storage::exists($article->image) ? Storage::url($article->image) : asset('/default.jpg') }}" alt="">
                                <div class="infoSmallCard">
                                    <div>
                                        <div class="infoCardDateSmall">
                                            <p class="categoryCard">{{ $article->category->name }}</p>
                                            <p>{{ $article->created_at }}</p>
                                        </div>
                                        <h4>{{Str::limit($article->title, 36) }}</h4>
                                    </div>
                                </div>
                            </a>
                        @elseif ($key == 3)
                            <a href="{{ route('article.show', compact('article')) }}" class="cardHomeLarge">
                                <div class="imgCardLarge">
                                    <img src="{{ Storage::exists($article->image) ? Storage::url($article->image) : asset('/default.jpg') }}" alt="">
                                    <div class="divHover"></div>
                                </div>
                                <div class="infoCardLarge">
                                    <div class="infoCardDateLarge">
                                        <p class="categoryCard">{{ $article->category->name }} </p>
                                        <p>{{ $article->created_at }}</p>
                                    </div>
                                    <h4>{{Str::limit($article->title, 36) }}</h4>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="boxDivImg">
                <div class="divImg">
                    <div class="boxDivImgGlass">
                        <h2>TECH</h2>
                        <p>Scopri le ultime innovazioni e tendenze nel mondo della tecnologia. Dalle recensioni di nuovi gadget alle novità nel settore dell'IT, resta aggiornato su tutto ciò che riguarda la tecnologia e il suo impatto sul mondo.</p>
                            <a href="{{route('article.byCategory', ['category' => '6'])}}" class="buttonDivImgCat">Scopri..</a>
                    </div>
                </div>
            </div>
        </div>
        
    </main>
    <x-footer/>
</x-layout>
