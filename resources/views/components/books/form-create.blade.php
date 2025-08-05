<form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">

    @csrf

    <div class="form-group">
        <label for="name">Nome</label>
        <input id="name" class="form-control" name="name" type="text" placeholder="Inserisci il nome"
            value="{{ old('name') }}" />
        @error('name')
            <div class="alert alert-danger mt-2" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group">
        Categorie
        @foreach ($categories as $category)
            <div class="form-check">
                <input name="categories[]"
                class="form-check-input"
                type="checkbox" value="{{ $category->id}}"
                id="category-{{ $category->id }}">
                <label class="form-check-label" for="category-{{ $category->id }}">
                    {{ $category->name }}
                </label>
            </div>
        @endforeach
    </div>

    <div class="form-group">
        <label for="year">Anno</label>
        <input id="year" class="form-control" name="year" type="text" placeholder="Inserisci l'anno"
            value="{{ old('year') }}" />
        @error('year')
            <div class="alert alert-danger mt-2" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="page">Totale pagine</label>
        <input id="page" class="form-control" name="page" type="text"
            placeholder="Inserisci il totale pagine" value="{{ old('page') }}" />
        @error('page')
            <div class="alert alert-danger mt-2" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="author_id">Autore</label>
        <select name="author_id" id="author_id">
            <option selected>Seleziona l'autore</option>
            @foreach ($authors as $author)
                <option value="{{ $author->id }}">{{ $author->firstname }} {{ $author->lastname }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="formFile" class="form-label">Default file input example</label>
        <input class="form-control" type="file" id="image" name="image">
        @error('image')
            <div class="alert alert-danger mt-2" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Salva</button>
    <a href="{{ route('books.index') }}" class="btn btn-primary">Annulla</a>
</form>
