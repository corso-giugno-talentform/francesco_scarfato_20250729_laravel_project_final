<form action="{{ route('books.update', ['book' => $book]) }}" 
    method="post"
    enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Nome</label>
        <input id="name" name="name" class="form-control"
            type="text" placeholder="Inserisci il nome"
            value="{{ $book->name }}" />
        @error('name')
            <div class="alert alert-danger mt-2" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="author_id">Autore</label>
    <select name="author_id" id="author_id" class="form-select">
        <option @if(!empty( $authors ))selected @endif>Seleziona l'autore</option>
        @foreach($authors as $author)
        <option @if($author->id == $book->author_id )selected @endif value="{{ $author->id }}">{{ $author->firstname }}  {{ $author->lastname }}</option>
        @endforeach
    </select>

        {{-- <input id="author" class="form-control" name="author" type="text" placeholder="Inserisci l'autore"
            value="{{ $book->author }}" />
        @error('author')
            <div class="alert alert-danger mt-2" role="alert">
                {{ $message }}
            </div>
        @enderror --}}
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
