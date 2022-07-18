<?php

namespace App\Tests;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;

class DivResponseTest extends ApiTestCase
{
    public function testDivIndex(): void
    {
        $response = static::createClient()->request('GET', '/api/calculation/div');
        $this->assertResponseIsSuccessful();
        $this->assertJsonContains(['success' => true]);
    }
    
    public function testDivOneDigit(): void
    {
        $response = static::createClient()->request('GET', '/api/calculation/div/2');
        $this->assertResponseIsSuccessful();
        $this->assertJsonContains(['success' => false]);
    }
    
    public function testDivByZero(): void
    {
        $response = static::createClient()->request('GET', '/api/calculation/div/5/0');
        $this->assertResponseIsSuccessful();
        $this->assertJsonContains(['success' => false]);
    }
    
    public function testDivNoneNumber(): void
    {
        $response = static::createClient()->request('GET', '/api/calculation/div/a');
        $this->assertResponseIsSuccessful();
        $this->assertJsonContains(['success' => false]);
    }
    
    public function testDivTwoDigits(): void
    {
        $response = static::createClient()->request('GET', '/api/calculation/div/1/2');
        $this->assertResponseIsSuccessful();
        $this->assertJsonContains(['success' => true]);
    }
}
