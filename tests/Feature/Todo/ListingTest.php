<?php

namespace Tests\Feature\Todo;

use App\Models\Todo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/** @testdox User Task Listing */
class ListingTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function a_user_can_list_all_the_task()
    {
        factory(Todo::class, 20)->create();
        
        $response = $this->json('GET', '/api/todos');
        $response->assertOk();

        $responseAsArray = json_decode($response->content(), true);

        $this->assertArrayHasKey('data', $responseAsArray);
    }
}
