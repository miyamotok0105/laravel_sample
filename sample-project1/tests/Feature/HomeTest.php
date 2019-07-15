<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomeTest extends TestCase
{
    /**
     * Test Status Code.
     *
     * @return void
     */
    public function testStatusCode()
    {
        $resp = $this->get('/home');
        $resp->assertStatus(200);
        $this->assertTrue(true);
    }

    public function testBody()
    {
        $resp = $this->get('/home');
        $resp->assertSeeText('こんにちは！');
    }
}
