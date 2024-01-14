<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Anuncio extends Model
{
    use HasFactory;

    protected $guarded = []; //prefira explicitar o que vai receber valores...

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
