<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shift extends Model
{
    use HasFactory;

    public const SHIFT_TIMES = [
        1 => "0-8",
        2 => "8-16",
        3 => "16-24"
    ];

    /**
     * @return BelongsTo
     */
    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }
}
