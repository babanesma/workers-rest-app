<?php

namespace App\Rules;

use App\Models\Shift;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class OneShiftPerDay implements Rule
{
    /**
     * @var Carbon
     */
    protected $date;

    /**
     * @var Shift
     */
    protected $shift;

    protected $shiftId;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($date, $shiftId = null)
    {
        $this->date = new Carbon($date);
        $this->shift = new Shift();
        $this->shiftId = $shiftId;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $shifts = $this->shift->getShiftsPerDay($value, $this->date, $this->shiftId);
        return $shifts->count() <= 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Worker can have only one shift per day';
    }
}
