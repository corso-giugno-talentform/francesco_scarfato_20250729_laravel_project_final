<x-template>
    {{-- https://colorlib.com/wp/template/login-form-17/ --}}
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-10">
            <div class="wrap d-md-flex">
                <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                    <div class="text w-100">
                        <h2>Benvenuto su LaraBook</h2>
                        <p>Hai già un account?</p>
                        <a href="{{ route('login') }}" class="btn btn-white btn-outline-white">Accedi</a>
                    </div>
                </div>
                <div class="login-wrap p-4 p-lg-5">
                    <div class="d-flex">
                        <div class="w-100">
                            <h3 class="mb-4">Registrati</h3>
                        </div>
                    </div>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="name" class="form-control" id="name" name="name"
                                value="{{ old('name') }}">
                            @error('name')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email"
                                name="email"value="{{ old('email') }}">
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
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation">
                            @error('password_confirmation')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Registrati</button>


                    </form>
                </div>
            </div>
        </div>
    </div>

</x-template>
