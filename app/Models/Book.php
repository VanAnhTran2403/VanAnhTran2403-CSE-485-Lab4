<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ["name", "author", "category", "quantity", "year"];
    public function readers() : BelongsToMany
    {
        return $this->belongsToMany(Reader::class, "borrows", 
                "book_id","reader_id")
                ->withPivot('borrow_date', 'return_date', 'status');
    }
}
