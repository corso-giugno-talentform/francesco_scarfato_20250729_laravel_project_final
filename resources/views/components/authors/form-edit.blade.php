<form action="{{ route('authors.update', ['author' => $author]) }}" 
    method="post">

    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Nome</label>
        <input id="firstname" name="firstname" class="form-control"
            type="text" placeholder="Inserisci il nome"
            value="{{ $author->firstname }}" />
        @error('firstname')
            <div class="alert alert-danger mt-2" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="author">Cognome</label>
        <input id="lastname" name="lastname" class="form-control"
            type="text" placeholder="Inserisci cognome"
            value="{{ $author->lastname }}" />
        @error('lastname')
            <div class="alert alert-danger mt-2" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Salva</button>
    <a href="{{ route('authors.index') }}" class="btn btn-primary">Annulla</a>
</form>
