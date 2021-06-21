<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShiftRequest;
use App\Models\Shift;
use Illuminate\Http\Response;

class ShiftController extends Controller
{
    /**
     * List all shifts
     *
     * @return Response
     */
    public function index()
    {
        $shifts = Shift::with('worker')->get();
        return response()->json($shifts);
    }

    /**
     * Create new shift
     *
     * @param  ShiftRequest $request
     * @return Response
     */
    public function store(ShiftRequest $request)
    {
        $shift = new Shift([
            'worker_id' => $request->worker_id,
            'shift_date' => $request->shift_date,
            'shift_time' => $request->shift_time
        ]);

        $shift->save();
        return response()->json($shift);
    }

    /**
     * List shift details
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $shift = Shift::with('worker')->find($id);
        return response()->json($shift);
    }

    /**
     * Update shift details.
     *
     * @param  ShiftRequest $request
     * @param  int  $id
     * @return Response
     */
    public function update(ShiftRequest $request, $id)
    {
        $shift = Shift::with('worker')->find($id);
        $shift->update([
            'worker_id' => $request->worker_id,
            'shift_date' => $request->shift_date,
            'shift_time' => $request->shift_time
        ]);
        return response()->json($shift);
    }

    /**
     * Remove shift
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $shift = Shift::find($id);
        $shift->delete();
        return response()->json(['Shift successfully deleted']);
    }
}
