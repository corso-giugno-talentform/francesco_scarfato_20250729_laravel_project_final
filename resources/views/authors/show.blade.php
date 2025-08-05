<x-template>
    <div class="row">

    <div class="card mb-3 p-1" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-8">
                <div class="card-body">
                    <p class="card-text">{{ $author->firstname }}</p>
                    <p class="card-text">{{ $author->lastname }}</p>
                </div>
            </div>
            <div class="col-md-8">
                @forelse ($author->books as $book)
                    {{ $book->name }}
                    <small class="text-muted">{{ $book->year }} - {{ $book->page }}</small>

                    @if (!empty($book->image))
                        <img src="{{ Storage::url($book->image) }}" class="img-fluid rounded-start" alt="">
                    @else
                        <img src="{{ Storage::url('cover/missing-image.jpg') }}" class="img-fluid rounded-start"
                            alt="">
                    @endif
                @empty
                    Nessun Libro
                @endforelse
            </div>
        </div>
    </div>

    <div class="col">
        <a href="{{ url()->previous() }}" class="btn btn-primary">Indietro</a>
    </div>

    </form>

</div>
</x-template>