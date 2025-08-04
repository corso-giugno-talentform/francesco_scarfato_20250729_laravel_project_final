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
        </div>
    </div>

    <div class="col">
        <a href="{{ url()->previous() }}" class="btn btn-primary">Torna in home</a>
    </div>

    </form>

</div>
</x-template>