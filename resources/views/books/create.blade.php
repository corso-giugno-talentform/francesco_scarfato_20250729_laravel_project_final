<x-template>
    <div class="row">
        <div id="contact-form">
            <h1>Inserisci un nuovo libro</h1>
            <x-books.form-create :$authors :$categories />
        </div>
    </div>
</x-template>
