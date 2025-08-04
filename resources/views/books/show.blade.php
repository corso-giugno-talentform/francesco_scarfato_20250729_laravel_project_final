<x-template>
    <div class="row">

    <div class="card mb-3 p-1" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">



                @if (!empty($book->image))
                    <img src="{{ Storage::url($book->image) }}" class="img-fluid rounded-start" alt="">
                @else
                    <img src="{{ Storage::url('cover/missing-image.jpg') }}" class="img-fluid rounded-start"
                        alt="">
                @endif

            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $book->name }}</h5>
                    <p class="card-text">{{ $book->author }}</p>
                    <p class="card-text">
                        <small class="text-muted">{{ $book->year }} - {{ $book->page }}</small>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <a href="{{ url()->previous() }}" class="btn btn-primary">Torna in home</a>
    </div>

    </form>

</div>
</x-template>