<table class="table m-0">
    <thead>
        <tr style="font-size: clamp(0.5rem, 1vw, 0.9rem); ">

            <th scope="col">Titolo</th>
            <th scope="col">Sottotitolo</th>
            <th scope="col">Categoria</th>
            <th scope="col">Creato il</th>
            <th scope="col">Azione</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
            <tr style="font-size: clamp(0.7rem, 1vw, 0.9rem);">

                <td> {{ $article->title }}</td>
                <td  style="width: 10%"  >{{ $article->subtitle }}</td>
                <td>{{ $article->category->name ?? 'Non categorizzato' }}</td>
            
                <td  >{{ $article->created_at->format('d/m/Y') }}</td>
                <td style="display: flex;flex-direction:column;    align-items: center;justifly-content:center;padding:0px; width:100%; ">
                    <div class="divBoxButtonReddatore"  >
                        
                      <div class="divBoxBotton">
                            <a id="aRedatoreVisualiza" href="{{ route('article.show', compact('article')) }}" >
                              <span class="spanIconRedattoreVisualiza">
        
                                    <svg  xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-newspaper" viewBox="0 0 16 16">
                                        <path
                                            d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5z" />
                                        <path
                                            d="M2 3h10v2H2zm0 3h4v3H2zm0 4h4v1H2zm0 2h4v1H2zm5-6h2v1H7zm3 0h2v1h-2zM7 8h2v1H7zm3 0h2v1h-2zm-3 2h2v1H7zm3 0h2v1h-2zm-3 2h2v1H7zm3 0h2v1h-2z" />
                                    </svg>
                              </span>
                             <span class="spanTextRedatore">Visualiza</span>
                            </a>
                      </div>
    
                      <div class="divBoxBotton">
                            <a id="aRedatoreModifica"  href="{{ route('article.edit', compact('article')) }}">
                               <span class="spanIconRedattoreModifica">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                    </svg>
                               </span>
                              <span class="spanTextRedatore"> Modifica</span>
                            </a>
                      </div>
    
                      <div class="divBoxBotton">
                            <form  action="{{ route('article.destroy', compact('article')) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button id="aWriterDelete" class="aWriter" type="submit" >
                                    <span class="spanIconRedattoreElimina">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path
                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                        </svg>
                                    </span>
                                <span class="spanTextRedatore">    Elimina</span>
                                </button>
                            </form>
                       </div>
                    </div>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>
