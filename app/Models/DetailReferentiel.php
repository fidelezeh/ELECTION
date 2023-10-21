<?php

namespace App\Models;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class DetailReferentiel extends Model
{
    /**
     * @var array|Application|\Illuminate\Foundation\Application|Request|mixed|string|null
     */
    protected $table = 'detail_referentiels';

    use HasFactory;

    public function detail_referentiel(): BelongsTo
    {
        return $this->belongsTo(Referentiel::class, 'referentiel_id', 'id');
    }
    public function detail_parents(): HasMany
    {
        return $this->hasMany(DetailReferentiel::class, 'parent_id', 'id');
    }

    public function types_elections(): HasMany
    {
        return $this->hasMany(Election::class, 'type_election_id', 'id');
    }

    public function statuts_elections(): HasMany
    {
        return $this->hasMany(Election::class, 'statut_election_id', 'id');
    }

    protected $guarded = [];
}
