<?php

namespace App\Tests;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;

class AddResponseTest extends ApiTestCase
{
    public function testAddIndex(): void
    {
        $response = static::createClient()->request('GET', '/api/calculation/add');
        $this->assertResponseIsSuccessful();
        $this->assertJsonContains(['success' => true]);
    }
    
    public function testAddOneDigit(): void
    {
        $response = static::createClient()->request('GET', '/api/calculation/add/2');
        $this->assertResponseIsSuccessful();
        $this->assertJsonContains(['success' => false]);
    }
    
    public function testAddNoneNumber(): void
    {
        $response = static::createClient()->request('GET', '/api/calculation/add/a');
        $this->assertResponseIsSuccessful();
        $this->assertJsonContains(['success' => false]);
    }
    
    public function testAddTwoDigits(): void
    {
        $response = static::createClient()->request('GET', '/api/calculation/add/1/2');
        $this->assertResponseIsSuccessful();
        $this->assertJsonContains(['success' => true]);
    }
    
}
