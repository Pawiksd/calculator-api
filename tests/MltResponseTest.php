<?php

namespace App\Tests;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;

class MltResponseTest extends ApiTestCase
{
    public function testMltIndex(): void
    {
        $response = static::createClient()->request('GET', '/api/calculation/mlt');
        $this->assertResponseIsSuccessful();
        $this->assertJsonContains(['success' => true]);
    }
    
    public function testMltOneDigit(): void
    {
        $response = static::createClient()->request('GET', '/api/calculation/mlt/2');
        $this->assertResponseIsSuccessful();
        $this->assertJsonContains(['success' => false]);
    }
    
    public function testMltNoneNumber(): void
    {
        $response = static::createClient()->request('GET', '/api/calculation/mlt/a');
        $this->assertResponseIsSuccessful();
        $this->assertJsonContains(['success' => false]);
    }
    
    public function testMltTwoDigits(): void
    {
        $response = static::createClient()->request('GET', '/api/calculation/mlt/1/2');
        $this->assertResponseIsSuccessful();
        $this->assertJsonContains(['success' => true]);
    }
    
}
