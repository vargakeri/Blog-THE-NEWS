<x-layout>


    <x-nav-bar-white />
    <div class="headerIndex">
    </div>
    <main class="mainAllCard">
        <div class="container text-center ">
            <div class="Boxh2Index">
                <div class="hoverBoxh2Index">
                    <h2 class="h2Category">Tutti gli articoli</h2>
                </div>
            </div>
            <div style="width: 100%;display:flex;justify-content: space-between;">
                <form class="BoxSelect" action="{{ route('article.indexFilter') }}" method="POST">
                    @csrf
                    {{-- ordina per categoria --}}
                    <div class="containerSelect">
                        <select name="byCategory" id="">
                            <option value="">Filtra per categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if (isset($byCategory) && $byCategory == $category->id) selected @endif>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- ordina per data creazione --}}
                    <div class="containerSelect">
                        <select name="byDate" id="">
                            <option value="">Ordina per</option>
                            <option value="desc" @if (isset($byDate) && $byDate == 'desc') selected @endif>Più recente
                            </option>
                            <option value="asc" @if (isset($byDate) && $byDate == 'asc') selected @endif>Meno recente
                            </option>
                            <option value="readTime" @if (isset($byDate) && $byDate == 'readTime') selected @endif>Tempo di lettura
                            </option>
                        </select>
                    </div>
                    {{-- tempo di lettura --}}
                    <div class="containerSelect">
                        <select name="byReadTime" id="">
                            <option value="">Tempo di lettura</option>
                            <option value="less_equal_5" @if (isset($byReadTime) && $byReadTime == 'less_equal_5') selected @endif>5 minuti o
                                inferiore</option>
                            <option value="between_5_10" @if (isset($byReadTime) && $byReadTime == 'between_5_10') selected @endif> 5 -10 minuti
                            </option>
                            <option value="greater_equal_10" @if (isset($byReadTime) && $byReadTime == 'greater_equal_10') selected @endif>10 minuti
                                o più</option>
                        </select>
                    </div>
                    <button>cerca</button>
                </form>
            </div>
            <div style="background-color:white;" class="row ">
                @foreach ($articles as $article)
                    @if ($article->category_id)
                        @php
                            $varCategory = $article->category->name;
                            $varUrlCategory = route('article.byCategory', ['category' => $article->category->id]);
                        @endphp
                    @else
                        @php
                            $varCategory = '';
                            $varUrlCategory = '#';
                        @endphp
                    @endif
                    <div class="col-12 col-md-6 col-lg-4 col-ml-4 col-sm-12 p-2">
                        <x-card title="{{ $article->title }}" subtitle="{{ $article->subtitle }}"
                            image="{{ $article->image }}" category="{{ $varCategory }}"
                            urlCategory="{{ $varUrlCategory }}" data="{{ $article->created_at->format('d/m/Y') }}"
                            url="{{ route('article.show', compact('article')) }}" user="{{ $article->user->name }}"
                            urlUser="{{ route('article.byUser', ['user' => $article->user->id]) }}" :tags="$article->tags"
                            readDuration="{{ $article->readDuration() }}" />
                    </div>
                @endforeach
            </div>
        </div>
    </main>

</x-layout>
<x-footer/>
