<x-template>
    {{-- https://colorlib.com/wp/template/login-form-17/ --}}
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-10">
            <div class="wrap d-md-flex">
                <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                    <div class="text w-100">
                        <h2>Benvenuto su LaraBook</h2>
                        <p>Non hai un account?</p>
                        <a href="{{ route('register') }}" class="btn btn-white btn-outline-white">Sign Up</a>
                    </div>
                </div>
                <div class="login-wrap p-4 p-lg-5">
                    <div class="d-flex">
                        <div class="w-100">
                            <h3 class="mb-4">Accedi</h3>
                        </div>
                    </div>
                    <form action="{{ route('login') }}" method="POST" class="signin-form">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                            @error('email')
                                <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            @error('password')
                                <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit"
                                class="form-control btn btn-primary submit px-3">Log In
                            </button>
                        </div>
                        <div class="form-group d-md-flex">
                            <div class="w-50 text-left">
                                <label class="checkbox-wrap checkbox-primary mb-0">Ricordami                                 <input type="checkbox" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="w-50 text-md-right">
                                <a href="{{ route('password.request') }}">Password dimenticata</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-template>
