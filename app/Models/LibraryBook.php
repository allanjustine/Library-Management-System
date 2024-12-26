<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibraryBook extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function borrowers()
    {
        return $this->hasMany('App\Models\Borrower');
    }
}
