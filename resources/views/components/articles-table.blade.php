<table class="table m-0">
    <thead >
        <tr  style="font-size: clamp(0.5rem, 1vw, 0.9rem)">
      
            <th  scope="col">Titolo</th>
            <th scope="col">Sottotitolo</th>
            <th scope="col">Redattore</th>
            <th scope="col">Azione</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
            <tr style="font-size: clamp(0.7rem, 1vw, 0.9rem);">
               
                <td >{{ $article->title }}</td>
                <td >{{ $article->subtitle }}</td>
                <td>{{ $article->user->name }}</td>
                <td style="padding-left: 0px;padding-right: 0px;" >
                    @if (is_null($article->is_accepted))
                        <a  href="{{ route('article.show', compact('article')) }}" class=""><button class="revisioneBottone">Leggi l'articolo</button></a>
                    @else
                        <form action="{{ route('revisor.undoArticle', compact('article')) }}" method="POST">
                            @csrf
                            <button class="revisioneBottone">Riporta in revisione</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>

</table>
