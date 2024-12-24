<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Borrow extends Model
{
    use HasFactory;
    public function books() : MorphToMany
    {
        return $this->morphedByMany(Book::class,"");
    }

    public function readers() : MorphToMany
    {
        return $this->morphToMany(Reader::class,"borrows");
    }
}
