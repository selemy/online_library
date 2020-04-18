<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books_author extends Model
{
    protected $guarded = [];

    public function book()
    {
        return $this->hasMany(Book::class, 'author_id', 'id');
    }
}
