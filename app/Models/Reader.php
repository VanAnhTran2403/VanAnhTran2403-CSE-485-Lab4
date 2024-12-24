<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Reader extends Model
{
    use HasFactory;
    protected $fillable = ["name", "birthday", "address", "phone"];
    public function books() : BelongsToMany
    {
        return $this->belongsToMany(Book::class, "borrows",
                        "reader_id", "book_id")
                        ->withPivot('borrow_date', 'return_date', 'status');
    }
}
