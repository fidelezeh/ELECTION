<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Referentiel extends Model
{
    protected $table = 'referentiels';

    use HasFactory;

    public function details_referentiel(): HasMany
    {
        return $this->hasMany(DetailReferentiel::class, 'referentiel_id', 'id');
    }

    protected $guarded = [];
}
