<form action="{{ route('books.update', ['book' => $book]) }}" method="post" enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Nome</label>
        <input id="name" name="name" class="form-control" type="text" placeholder="Inserisci il nome"
            value="{{ $book->name }}" />
        @error('name')
            <div class="alert alert-danger mt-2" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="author_id">Autore</label>
        <select name="author_id" id="" class="form-select">
            <option @if (!empty($authors)) selected @endif>Seleziona l'autore</option>
            @foreach ($authors as $author)
                <option @if ($author->id == $book->author_id) selected @endif value="{{ $author->id }}">
                    {{ $author->firstname }} {{ $author->lastname }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        Categorie
        @foreach ($categories as $category)
            <div class="form-check">
                <input @checked($book->categories->contains($category->id))
                name="categories[]"
                class="form-check-input"
                type="checkbox"
                value="{{ $category->id }}"
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
            value="{{ $book->year }}" />
        @error('year')
            <div class="alert alert-danger mt-2" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="page">Totale pagine</label>
        <input id="page" class="form-control" name="page" type="text"
            placeholder="Inserisci il totale pagine" value="{{ $book->page }}" />
        @error('page')
            <div class="alert alert-danger mt-2" role="alert">
                {{ $message }}
            </div>
        @enderror
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
