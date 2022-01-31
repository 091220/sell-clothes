<?php 

namespace Infrastructure\Testing\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Infrastructure\Testing\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/api');

        $response->assertStatus(200);
    }
}