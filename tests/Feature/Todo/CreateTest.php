<?php

namespace Tests\Feature\Todo;

use App\Models\Todo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

/** @testdox User Todo Creation */
class CreateTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function a_user_can_add_task()
    {
        $this->withExceptionHandling();

        $request = factory(Todo::class)
            ->make()
            ->toArray();

        $this->json('POST', '/api/todos', $request)
            ->assertStatus(Response::HTTP_CREATED);
    }
}
