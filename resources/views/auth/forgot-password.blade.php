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
                            <h3 class="mb-4">Password dimenticata</h3>
                        </div>
                    </div>
                    <form action="{{ route('password.request') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                            @error('email')
                                <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Recupera Password</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

</x-template>
