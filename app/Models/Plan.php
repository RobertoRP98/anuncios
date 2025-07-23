<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Plan extends Model
{
    protected $table = 'plans';

    /**
     * Get the user that owns the Plan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function anuncio(): BelongsTo
    {
        return $this->belongsTo(Anuncio::class);
    }
}
