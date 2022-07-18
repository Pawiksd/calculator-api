<?php

namespace App\Tests;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;

class SubResponseTest extends ApiTestCase
{
    public function testSubIndex(): void
    {
        $response = static::createClient()->request('GET', '/api/calculation/sub');
        $this->assertResponseIsSuccessful();
        $this->assertJsonContains(['success' => true]);
    }
    
    public function testSubOneDigit(): void
    {
        $response = static::createClient()->request('GET', '/api/calculation/sub/2');
        $this->assertResponseIsSuccessful();
        $this->assertJsonContains(['success' => false]);
    }
    
    public function testSubNoneNumber(): void
    {
        $response = static::createClient()->request('GET', '/api/calculation/sub/a');
        $this->assertResponseIsSuccessful();
        $this->assertJsonContains(['success' => false]);
    }
    
    public function testSubTwoDigits(): void
    {
        $response = static::createClient()->request('GET', '/api/calculation/sub/1/2');
        $this->assertResponseIsSuccessful();
        $this->assertJsonContains(['success' => true]);
    }
    
}
