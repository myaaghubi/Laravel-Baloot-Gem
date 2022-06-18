<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GemTransactionsTest extends TestCase
{
    public function test_gem_transaction_index()
    {
        // accourding to my seeders, user_id=1 should be exists
        $response = $this->get('/gem/transactions/user/1');

        $response->assertStatus(200);

        $array = $response->decodeResponseJson();
        $this->assertNotEmpty($array['transactions']);
    }

    public function test_gem_transactoin_show()
    {
        // accourding to my seeders, id=1 should be exists
        $response = $this->get('/gem/transactions/1');

        $response->assertStatus(200);

        $array = $response->decodeResponseJson();

        $this->assertNotEmpty($array['transaction']);
        $this->assertEquals(1, $array['transaction']['id']);


        // $response->assertStatus(200)->assertJsonFragment([
        //     'transaction'
        // ]);
    }
}
