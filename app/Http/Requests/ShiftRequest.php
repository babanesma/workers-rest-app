<?php

namespace App\Http\Requests;

use App\Models\Shift;
use App\Rules\OneShiftPerDay;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class ShiftRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $payload = $this->request->all();
        return [
            'worker_id' => [
                'required',
                'numeric',
                $this->method() == "PUT" ?
                    new OneShiftPerDay($payload['shift_date'], $this->route('id')) :
                    new OneShiftPerDay($payload['shift_date'])
            ],
            'shift_date' => 'required|date',
            'shift_time' => [
                'required',
                Rule::in(Shift::SHIFT_TIMES)
            ]
        ];
    }
}
