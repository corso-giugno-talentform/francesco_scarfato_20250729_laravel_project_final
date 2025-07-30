# ############################################################################
# Repo
# ############################################################################

https://github.com/corso-giugno-talentform/francesco_scarfato_20250729_laravel_project_final

Da ora in poi useremo questa repo fino alla fine del progetto finale


# ############################################################################
## 2025.07.30 Migrations
# ############################################################################

Useremo le migrations per creare le nostre tabelle che devono avere un nome in inglese al plurale (ex. users) in maniera tale da sfruttare l'auto-discovering di Laravel che provvederà a generare un oggetto associato (al singolare, user).

Iniziamo con la creazione della prima migration con

##### Creiamo la migration
**php artisan make:migration create_books_table**

##### La eseguiamo
**php artisan migrate***

##### Creiamo il modello
**php artisan make:model Book**

A questo punto in TablePlus possiamo vedere la tabella che è stata creata e aggiungiamo dei records

##### Alter di una tabella
**php artisan make:migration add_to_books_table**

il nome specificato dopo migration è strutturato in
add_to  --> action da eseguire
books   --> tabella
table   --> cosa rappresenta

In questo modo Laravel genererà una nuova migration in cui possiamo specificare le modifiche da apportare alla tabella, ad es. aggiungiamo le colonne **author** e **image**

    ```php
    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('author', 64)->after('page')->nullable();
            $table->string('image')->after('author')->nullable();
        });
    }
    ```

Creiamo il controller e le views per gestire l'elenco dei libri e l'inserimento di un nuovo libro.

##### Creiamo il controller BookController
**php artisan make:controller BookController**

##### Aggiorniamo le routes

    ```php
    Route::get('/', [BookController::class, 'index'])->name('books.index');
    Route::get('/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/salva-libro', [BookController::class, 'store'])->name('books.store');
    ```

##### Creata classe StoreBookRequest
Tramite questa classe possiamo definire le regole di validazione e i relativi messaggi

    ```php
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:100', 'string'],
            'author' => ['required', 'max:64', 'string'],
            'page' => ['nullable', 'integer'],
            'year' => ['integer']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nome libro richiesto',
            'name.max' => 'Nome troppo lungo (max 100 chars)',
            'author.required' => 'Nome autore richiesto',
            'author.max' => 'Nome troppo lungo (max 64 chars)',
            'page.integer' => 'Deve essere un numero intero',
            'year.integer' => 'Deve essere un numero intero',
        ];
    }
    ```

Dopo di che aggiorniamo il metodo store della classe BookController

    ```php
    public function store(StoreBookRequest $request)
    ```