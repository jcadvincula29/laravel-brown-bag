<?php

namespace Tests\Feature\Todo;

use App\Models\Todo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

/** @testdox User Todo Show */
class ShowTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function a_user_can_show_particular_task()
    {
        $todo = factory(Todo::class)->create();

        $this->json('GET', '/api/todos/' . $todo->id)
            ->assertOk()
            ->assertJsonStructure(array_keys($todo->toArray()));
    }

    /** @test */
    public function a_user_received_not_found_error_for_nonexisting_task()
    {
        $this->json('GET', '/api/todos/' . $this->faker->randomDigit)
            ->assertStatus(Response::HTTP_NOT_FOUND);
    }
}
