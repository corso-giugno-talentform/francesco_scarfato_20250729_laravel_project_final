<x-template>

    <div class="position-relative p-5 text-center text-muted bg-body border border-dashed rounded-5">
        <h1 class="text-body-emphasis">Placeholder jumbotron</h1>
        <p class="col-lg-6 mx-auto mb-4">
            This faded back jumbotron is useful for placeholder content. It's also a great way to add a bit of context
            to a page or section when no content is available and to encourage visitors to take a specific action.
        </p>
        <a href="{{ route('books.catalog') }}" class="btn btn-primary">
                Vai all'elenco completo
            </button>
        </a>
    </div>

    <div class="row">

        @foreach ($books as $book)
            <div class="card mb-3 w-30">
                <div class="row g-0">
                    <div class="col-md-4 p-2">
                        @if (!empty($book->image))
                            <img width="96" src="{{ Storage::url($book->image) }}" alt="" class="img-fluid">
                        @else
                            <img width="96" src="{{ Storage::url('cover/missing-image.jpg') }}" alt=""
                                class="img-fluid">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="">{{ $book->name }}</h5>
                            <p class="">{{ $book->author->firstname }} {{ $book->author->lastname }}</p>
                            <p class="">
                                <small class="text-body-secondary">Anno {{ $book->year }}
                                    Pagine{{ $book->page }}</small>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</x-template>
