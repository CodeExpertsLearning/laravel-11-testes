<form action="{{ route('anuncios.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="titulo">Titulo</label>
        <input type="text" name="titulo" id="titulo">

        @error('titulo')
            <span style="display:block; margin-top: 10px; color: #f00; font-weight: bold;">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="descricao">Descrição</label>
        <input type="text" name="descricao" id="descricao">

        @error('descricao')
            <span style="display:block; margin-top: 10px; color: #f00; font-weight: bold;">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="conteudo">Conteúdo</label>
        <textarea name="conteudo" id="conteudo" cols="30" rows="10"></textarea>
        @error('conteudo')
            <span style="display:block; margin-top: 10px; color: #f00; font-weight: bold;">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="photo">Foto</label>
        <input type="file" name="photo" id="photo">

        @error('photo')
            <span style="display:block; margin-top: 10px; color: #f00; font-weight: bold;">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="anunciante">Anunciante</label>
        <select name="anunciante" id="anunciante">
            <option value="">Selecione o Anunciante</option>
            @foreach ($usuarios as $u)
                <option value="{{ $u->id }}">{{ $u->name }}</option>
            @endforeach
        </select>

        @error('anunciante')
            <span style="display:block; margin-top: 10px; color: #f00; font-weight: bold;">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <button>Salvar</button>
    </div>
</form>
