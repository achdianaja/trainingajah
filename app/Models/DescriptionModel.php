<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DescriptionModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'description'  
    ];

    /**
     * Get the user that owns the DescriptionModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
