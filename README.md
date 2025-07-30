# ############################################################################
# Repo
# ############################################################################

https://github.com/corso-giugno-talentform/francesco_scarfato_20250729_laravel_project_final

Da ora in poi useremo questa repo fino alla fine del progetto finale


# ############################################################################
# 2025.07.30 Migrations
# ############################################################################

Useremo le migrations per creare le nostre tabelle che devono avere un nome in inglese al plurale (ex. users) in maniera tale da sfruttare l'auto-discovering di Laravel che provvederà a generare un oggetto associato (al singolare, user).

Iniziamo con la creazione della prima migration con

** php artisan make:migration create_books_table

eseguiamo la migration con
** php artisan migrate

Creiamo il modello con 
**php artisan make:model Book**

A questo punto in TablePlus possiamo vedere la tabella che è stata creata e aggiungiamo dei records

