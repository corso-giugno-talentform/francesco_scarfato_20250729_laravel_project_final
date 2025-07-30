<x-template>
    <h1>Libri <span><a class="btn btn-primary btn-sm" href="{{ route('books.create') }}">Aggiungi libro</a></span></h1>

    @if (session('success'))
        <x-alert type="success">{{ session('success') }}</x-alert>
    @endif

    <ul>
        @foreach ($books as $book)
            <li>{{ $book->name }} - {{ $book->author }}</li>
        @endforeach
    </ul>
</x-template>
