<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * Undocumented class
 */
class Book extends Model
{
    protected $fillable = [
        'name', 'author', 'image', 'page', 'year', 'author_id'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
