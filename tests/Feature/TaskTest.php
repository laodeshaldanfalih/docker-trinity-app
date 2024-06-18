<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_task()
    {
        $response = $this->post('/tasks', [
            'title' => 'Sample Task',
            'description' => 'This is a sample task',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('tasks', [
            'title' => 'Sample Task',
            'description' => 'This is a sample task',
        ]);
    }

    /** @test */
    public function it_can_read_a_task()
    {
        $task = Task::factory()->create();

        $response = $this->get("/tasks/{$task->id}");

        $response->assertStatus(200);
        $response->assertSee($task->title);
        $response->assertSee($task->description);
    }

    /** @test */
    public function it_can_update_a_task()
    {
        $task = Task::factory()->create();

        $response = $this->put("/tasks/{$task->id}", [
            'title' => 'Updated Task',
            'description' => 'This is an updated description',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('tasks', [
            'title' => 'Updated Task',
            'description' => 'This is an updated description',
        ]);
    }

    /** @test */
    public function it_can_delete_a_task()
    {
        $task = Task::factory()->create();

        $response = $this->delete("/tasks/{$task->id}");

        $response->assertStatus(302);
        $this->assertDatabaseMissing('tasks', [
            'id' => $task->id,
        ]);
    }
}
