<?php

namespace Tests\Feature;

use App\Models\Shift;
use App\Models\Worker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class ShiftControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testList()
    {
        $worker = Worker::factory()->create();
        Shift::factory()->create([
            'worker_id' => $worker->id
        ]);
        $response = $this->get('/api/shifts');
        $this->assertCount(1, $response->json());
    }

    public function testOneShiftPerDay()
    {
        $this->expectException(ValidationException::class);
        $worker = Worker::factory()->create();
        Shift::factory()->create([
            'worker_id' => $worker->id,
            'shift_date' => date('Y-m-d')
        ]);
        $this->post('/api/shifts', [
            'worker_id' => $worker->id,
            'shift_date' => date('Y-m-d')
        ])->json();
    }
}
