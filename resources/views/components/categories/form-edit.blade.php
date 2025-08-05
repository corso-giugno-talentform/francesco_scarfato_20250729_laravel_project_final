<form action="{{ route('categories.update', ['category' => $category]) }}" 
    method="post">

    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Nome</label>
        <input id="name" name="name" class="form-control"
            type="text" placeholder="Inserisci il nome"
            value="{{ $category->name }}" />
        @error('name')
            <div class="alert alert-danger mt-2" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Salva</button>
    <a href="{{ route('categories.index') }}" class="btn btn-primary">Annulla</a>
</form>
