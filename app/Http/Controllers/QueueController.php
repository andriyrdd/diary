<?php

namespace App\Http\Controllers;

use App\Models\Queue;
use App\Models\Schedule;
use Illuminate\Http\Request;

class QueueController extends Controller
{
    public function index()
    {
        $queues = Queue::with('schedules')->get();
        // return response()->json(['queues' => $queues]);
        return view('index', compact('queues'))

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'schedules' => 'required|array',
            'schedules.*.state' => 'required|in:disabled,possible,enabled',
            'schedules.*.start_time' => 'required|date_format:H:i',
            'schedules.*.end_time' => 'required|date_format:H:i',
        ]);

        $queue = Queue::create(['name' => $request->input('name')]);

        foreach ($request->input('schedules') as $scheduleData) {
            $queue->schedules()->create($scheduleData);
        }

        return response()->json(['message' => 'Queue created successfully', 'queue' => $queue]);
    }

    public function update(Request $request, Queue $queue)
    {
        $request->validate([
            'name' => 'required|string',
            'schedules' => 'required|array',
            'schedules.*.id' => 'sometimes|exists:schedules,id',
            'schedules.*.state' => 'required|in:disabled,possible,enabled',
            'schedules.*.start_time' => 'required|date_format:H:i',
            'schedules.*.end_time' => 'required|date_format:H:i',
        ]);

        $queue->update(['name' => $request->input('name')]);

        $schedulesData = $request->input('schedules');

        foreach ($schedulesData as $scheduleData) {
            if (isset($scheduleData['id'])) {
                Schedule::where('id', $scheduleData['id'])->update($scheduleData);
            } else {
                $queue->schedules()->create($scheduleData);
            }
        }

        return response()->json(['message' => 'Queue updated successfully', 'queue' => $queue->fresh()]);
    }

    public function destroy(Queue $queue)
    {
        $queue->schedules()->delete();
        $queue->delete();

        return response()->json(['message' => 'Queue deleted successfully']);
    }
}
