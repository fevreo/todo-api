<?php

namespace Tests\Unit;

use App\Models\Todo;
use Tests\TestCase;

class TodoTest extends TestCase
{
    /**
     * @test
     */
    public function TodoCreation()
    {
        $todo = Todo::factory()->create();

        $this->assertModelExists($todo);
    }

    /**
     * @test
     */
    public function TodoUpdate()
    {
        $todo = Todo::first();

        $todo->update([
            'title' => 'title',
            'memo' => 'memo'
        ]);

        $this->assertDatabaseHas('todos', [
            'title' => 'title',
            'memo' => 'memo'
        ]);
    }

    /**
     * @test
     */
    public function TodoDeletion()
    {
        $todo = Todo::first();

        $todo->delete();

        $this->assertDatabaseMissing('todos', [
            'title' => 'title',
            'memo' => 'memo'
        ]);
    }
}
