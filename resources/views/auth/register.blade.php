<x-template>
    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nome</label>
            <input type="name" class="form-control" id="name" name="name" value="{{ old('name') }}">
            @error('name')
            <div class="alert alert-danger mt-2" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email"value="{{ old('email') }}">
            @error('email')
            <div class="alert alert-danger mt-2" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            @error('password')
            <div class="alert alert-danger mt-2" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation">Conferma Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            @error('password_confirmation')
            <div class="alert alert-danger mt-2" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Registrati</button>

        <a href="{{ route('login') }}">Login</a>
    </form>
</x-template>
