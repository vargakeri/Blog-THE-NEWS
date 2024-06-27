<table id="kevin" >
    <thead>
        <tr style="    font-size: clamp(0.7rem, 1vw, 0.9rem)">
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roleRequest as $user)
            <tr style="font-size: clamp(0.7rem, 1vw, 0.9rem)">
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @switch($role)
                        @case('amministratore')
                            <form action="{{ route('admin.setAdmin', compact('user')) }}" method="POST">
                                @csrf
                                @method('patch')
                                <button type="submit" class="attivaBottone">Attiva</button>
                            </form>
                        @break

                        @case('revisore')
                            <form action="{{ route('admin.setRevisor', compact('user')) }}" method="POST">
                                @csrf
                                @method('patch')
                                <button type="submit" class="attivaBottone">Attiva</button>
                            </form>
                        @break

                        @case('redattore')
                            <form action="{{ route('admin.setWriter', compact('user')) }}" method="POST">
                                @csrf
                                @method('patch')
                                <button type="submit" class="attivaBottone">Attiva</button>
                            </form>
                        @break

                        @default
                    @endswitch

                </td>
            </tr>
        @endforeach

    </tbody>
</table>
