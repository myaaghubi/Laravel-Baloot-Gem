<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GemTest extends TestCase
{
    public function test_gem_index()
    {
        $response = $this->get('/gem');

        $response->assertStatus(200);

        // $array = $response->decodeResponseJson();
        // $this->assertNotEmpty($array['gems']);

        $response->assertJsonCount(1);
        $response->assertJsonCount(10, 'gems');
    }

    public function test_gem_show()
    {
        // accourding to my seeders, user_id=1 should be exists
        $response = $this->get('/gem/1');

        $response->assertStatus(200);

        $array = $response->decodeResponseJson();
        $this->assertCount(5, $array['gem']['transactions']);

        // $response->assertJsonCount(5, 'gems.transactions');
    }
}
