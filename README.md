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

    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('author', 64)->after('page')->nullable();
            $table->string('image')->after('author')->nullable();
        });
    }


