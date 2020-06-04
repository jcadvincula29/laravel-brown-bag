<?php

namespace Tests\Feature\Todo;

use App\Models\Todo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

/** @testdox User Task Update */
class UpdateTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function a_user_can_update_task()
    {
        $todo = factory(Todo::class)->create();
        $request = factory(Todo::class)->make()->toArray();

        $this->json('PUT', '/api/todos/' . $todo->id, $request)
            ->assertOk()
            ->assertJsonStructure(array_keys($todo->toArray()));
    }

    public function a_user_cant_update_non_existing_task()
    {
        $this->json('PUT', '/api/todos/' . $this->faker->randomDigit)
            ->assertStatus(Response::HTTP_NOT_FOUND);
    }

    public function a_user_received_error_when_updating_with_missing_parameter()
    {
        $todo = factory(Todo::class)->create();

        $this->json('PUT', '/api/todos/' . $todo->id, [])
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
