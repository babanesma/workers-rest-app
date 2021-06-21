<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Shift
 *
 * @property int $id
 * @property int $worker_id
 * @property string $shift_date
 * @property string $shift_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Worker $worker
 */
class Shift extends Model
{
    use HasFactory;

    public const SHIFT_TIMES = [
        1 => '0-8',
        2 => '8-16',
        3 => '16-24'
    ];

    protected $fillable = [
        'worker_id',
        'shift_date',
        'shift_time'
    ];

    protected $dates = [
        'shift_date'
    ];

    /**
     * @return BelongsTo
     */
    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }

    public function getShiftsPerDay($workerId, Carbon $date, $shiftId = null)
    {
        $shifts = $this->query()->where('worker_id', $workerId)
            ->where('shift_date', $date);
        if ($shiftId) {
            $shifts->whereNotIn('id', [$shiftId]);
        }
        return $shifts->get();
    }
}
