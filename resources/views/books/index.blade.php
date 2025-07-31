<x-template>
    <h1>Libri <span><a class="btn btn-primary btn-sm" href="{{ route('books.create') }}">Aggiungi libro</a></span></h1>

    @if (session('success'))
        <x-alert type="success">{{ session('success') }}</x-alert>
    @endif

    <ul class="list-group">
        @foreach ($books as $book)
            <li class="list-group-item"> 
                
                @if (!empty($book->image))
                    <img width="96" src="{{ Storage::url($book->image) }}" alt=""
                        class="img-fluid img-thumbnail"
                    >                    
                @else
                        <img width="96" src="{{ Storage::url('cover/missing-image.jpg') }}" alt=""
                        class="img-fluid img-thumbnail"
                    >                
                @endif
                {{ $book->name }} - {{ $book->author }}</li>
        @endforeach
    </ul>
</x-template>
