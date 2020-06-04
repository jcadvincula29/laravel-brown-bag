<?php

namespace Tests\Feature\Todo;

use App\Models\Todo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

/** @testdox User Task Deletion */
class DeleteTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function a_user_can_delete_task()
    {
        $todo = factory(Todo::class)->create();
        
        $this->json('DELETE', '/api/todos/' . $todo->id)
            ->assertJsonStructure(['status', 'message'])
            ->assertOk();   
    }

    /** @test */
    public function a_user_will_receive_404_for_non_existing_task()
    {
        $this->json('DELETE', '/api/todos/' . $this->faker->randomDigit)
            ->assertStatus(Response::HTTP_NOT_FOUND);   
    }
}
