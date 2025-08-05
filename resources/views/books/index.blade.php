<x-template>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('books.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle-fill"></i>
                </a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" width="5%">#</th>
                            <th scope="col">cover</th>
                            <th scope="col">Titolo</th>
                            <th scope="col">Autore</th>
                            <th scope="col">Anno</th>
                            <th scope="col">Pagine</th>
                            <th scope="col" width="10%">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <th scope="row">{{ $book->id }}</th>
                                <td>
                                    @if (!empty($book->image))
                                        <img width="96" src="{{ Storage::url($book->image) }}" alt=""
                                            class="img-fluid">
                                    @else
                                        <img width="96" src="{{ Storage::url('cover/missing-image.jpg') }}"
                                            alt="" class="img-fluid">
                                    @endif
                                </td>
                                <td>{{ $book->name }}</td>
                                <td>
                                    {{ $book->author->firstname ?? '' }} {{ $book->author->lastname ?? '' }}
                                </td>
                                <td>{{ $book->year }}</td>
                                <td>{{ $book->page }}</td>
                                <td width="10%">
                                    <a href="{{ route('books.show', ['book' => $book]) }}">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('books.edit', ['book' => $book]) }}">
                                        <i class="bi bi-pencil"></i>                                    </a>
                                    <button type="button" class="btn-danger"> 
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-template>
