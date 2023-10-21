<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Election extends Model
{
    protected $table = 'elections';

    use HasFactory;

    public function electionType(): BelongsTo
    {
        return $this->belongsTo(DetailReferentiel::class, 'type_election_id', 'id');
    }

    public function electionStatut(): BelongsTo
    {
        return $this->belongsTo(DetailReferentiel::class, 'statut_election_id', 'id');
    }

    protected $guarded = [];
}
