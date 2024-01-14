<form action="{{ route('anuncios.update', $anuncio) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div style="width: 100%; margin-bottom: 10px;">
        <label for="titulo">Titulo</label>
        <input type="text" name="titulo" id="titulo" value="{{ $anuncio->titulo }}">

        @error('titulo')
            <span style="color: #f00; display:block; margin-top: 10px;  font-weight: bold;">{{ $message }}</span>
        @enderror
    </div>

    <div style="width: 100%; margin-bottom: 10px;">
        <label for="descricao">Descrição</label>
        <input type="text" name="descricao" id="descricao" value="{{ $anuncio->descricao }}">
        @error('descricao')
            <span style="display:block; margin-top: 10px; color: #f00; font-weight: bold;">{{ $message }}</span>
        @enderror
    </div>

    <div style="width: 100%; margin-bottom: 10px;">
        <label for="conteudo">Conteúdo</label>
        <textarea name="conteudo" id="conteudo" cols="30" rows="10">{{ $anuncio->conteudo }}</textarea>
        @error('conteudo')
            <span style="display:block; margin-top: 10px; color: #f00; font-weight: bold;">{{ $message }}</span>
        @enderror
    </div>

    <div style="width: 100%; margin-bottom: 10px;">
        @if ($anuncio->photo)
            <img src="{{ asset('storage/' . $anuncio->photo) }}" alt="Foto Anúncio {{ $anuncio->titulo }}"
                style="width: 200px;">
        @endif

        <label for="photo">Foto</label>
        <input type="file" name="photo" id="photo">

        @error('photo')
            <span style="display:block; margin-top: 10px; color: #f00; font-weight: bold;">{{ $message }}</span>
        @enderror
    </div>


    <div style="width: 100%; margin-bottom: 10px;">
        <label for="anunciante">Anunciante</label>
        <select name="anunciante" id="anunciante">
            <option value="">Selecione o Anunciante</option>
            @foreach ($usuarios as $u)
                <option value="{{ $u->id }}" @if ($u->id == $anuncio->user_id) selected @endif>
                    {{ $u->name }}</option>
            @endforeach
        </select>

        @error('anunciante')
            <span style="display:block; margin-top: 10px; color: #f00; font-weight: bold;">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <button>Atualizar</button>
    </div>
</form>
