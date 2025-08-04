<x-template>
    <form action="{{ route('password.request') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <button type="submit" class="btn btn-primary">Recupera Password</button>

    </form>
</x-template>
