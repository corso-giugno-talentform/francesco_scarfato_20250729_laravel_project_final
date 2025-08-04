<form action="{{ route('authors.store') }}" 
    method="post">

    @csrf

    <div class="form-group">
        <label for="name">Nome</label>
        <input id="firstname" name="firstname" class="form-control"
            type="text" placeholder="Inserisci il nome"
            value="{{ old('firstname') }}" />
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
            value="{{ old('lastname') }}" />
        @error('lastname')
            <div class="alert alert-danger mt-2" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Salva</button>
    <a href="{{ route('authors.index') }}" class="btn btn-primary">Annulla</a>
</form>
