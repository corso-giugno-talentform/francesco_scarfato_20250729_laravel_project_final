<x-template>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('authors.create') }}"class="btn btn-success">
                    <i class="bi bi-plus-circle-fill"></i>
                </a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" width="5%">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Cognome</th>
                            <th scope="col" width="10%">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($authors as $author)
                            <tr>
                                <th scope="row">{{ $author->id }}</th>
                                <td>{{ $author->firstname }}</td>
                                <td>{{ $author->lastname }}</td>
                                <td>
                                    <a href="{{ route('authors.show', ['author' => $author]) }}">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('authors.edit', ['author' => $author]) }}">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <button type="button"
                                        onclick="setAuthorId({{ $author->id }})"
                                        class="btn-danger"
                                        data-bs-toggle="modal"                                           
                                        data-bs-target="#deleteModal">
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
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel">Conferma Cancellazione</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="mb-0">Sei sicuro di voler cancellare questo autore?<br />Questa azione non è reversibile.</p>
            </div>
            
            <form id="modal-delete-form" class="d-flex" action="#" role="search" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" id="modal-author-id" name="modal-movie-id" value="" />
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <button type="submit" class="btn btn-danger" id="confirmDelete">Cancella</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
function setAuthorId(authorId) {
    let modalForm = document.getElementById('modal-delete-form');
    let modalValue = document.getElementById('modal-author-id');
    modalForm.action = 'authors/' + authorId;

}
</script>