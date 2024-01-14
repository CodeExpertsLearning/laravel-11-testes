<h1>Anúncios</h1>
<a href="{{ route('anuncios.create') }}">Criar Anúncio</a>
<hr>

@forelse ($anuncios as $anuncio)
    <h2>{{ $anuncio->titulo }}</h2>
    <p>{{ $anuncio->descricao }}</p>
    <a href="{{ route('anuncios.edit', ['anuncio' => $anuncio->id]) }}">Editar</a>

    <form action="{{ route('anuncios.destroy', $anuncio) }}" method="POST">
        @csrf
        @method('DELETE')

        <button
            style="padding: 0; background: transparent; cursor: pointer; color: #f00 !important; text-decoration: underline; border:none;">Remover</button>
    </form>
@empty
    <h2>Nenhum anúncio cadastrado!</h2>
@endforelse
