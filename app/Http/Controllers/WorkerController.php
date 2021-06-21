<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Response;
use App\Http\Requests\WorkerRequest;

class WorkerController extends Controller
{
    /**
     * List workers
     *
     * @return Response
     */
    public function index()
    {
        $workers = Worker::all();
        return response()->json($workers);
    }

    /**
     * Store new worker
     *
     * @param WorkerRequest $request
     * @return Response
     */
    public function store(WorkerRequest $request)
    {
        $worker = new Worker([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email
        ]);
        $worker->save();

        return response()->json($worker);
    }

    /**
     * Show worker
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $worker = Worker::find($id);
        return response()->json($worker);
    }

    /**
     * Update worker
     *
     * @param  WorkerRequest $request
     * @param int $id
     * @return Response
     */
    public function update(WorkerRequest $request, $id)
    {
        $worker = Worker::find($id);
        $worker->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email
        ]);
        return response()->json($worker);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $worker = Worker::find($id);
        $worker->delete();
        return response()->json(['Worker successfully deleted']);
    }
}
