<?php

namespace Innoboxrr\MakeBridge\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Innoboxrr\MakeBridge\Tests\TestCase;

class MakeBridgeEndpointsTest extends TestCase
{

    use RefreshDatabase,
        WithFaker;

    public function test_make_bridge_policies_endpoint()
    {

        $makeBridge = \Innoboxrr\MakeBridge\Models\MakeBridge::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $makeBridge->id
        ];

        $this->json('GET', '/api/innoboxrr/makebridge/make-bridge/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_make_bridge_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/innoboxrr/makebridge/make-bridge/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_make_bridge_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/makebridge/make-bridge/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_make_bridge_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/makebridge/make-bridge/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_make_bridge_show_auth_endpoint()
    {

        $makeBridge = \Innoboxrr\MakeBridge\Models\MakeBridge::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'make_bridge_id' => $makeBridge->id
        ];

        $this->json('GET', '/api/innoboxrr/makebridge/make-bridge/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_make_bridge_show_guest_endpoint()
    {

        $makeBridge = \Innoboxrr\MakeBridge\Models\MakeBridge::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'make_bridge_id' => $makeBridge->id
        ];

        $this->json('GET', '/api/innoboxrr/makebridge/make-bridge/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_make_bridge_create_endpoint()
    {

        $user = \Innoboxrr\MakeBridge\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \Innoboxrr\MakeBridge\Models\MakeBridge::factory()->make()->getAttributes();

        $this->json('POST', '/api/innoboxrr/makebridge/make-bridge/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_make_bridge_update_endpoint()
    {

        $makeBridge = \Innoboxrr\MakeBridge\Models\MakeBridge::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\Innoboxrr\MakeBridge\Models\MakeBridge::factory()->make()->getAttributes(),
            'make_bridge_id' => $makeBridge->id
        ];

        $this->json('PUT', '/api/innoboxrr/makebridge/make-bridge/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_make_bridge_delete_endpoint()
    {

        $makeBridge = \Innoboxrr\MakeBridge\Models\MakeBridge::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'make_bridge_id' => $makeBridge->id
        ];

        $this->json('DELETE', '/api/innoboxrr/makebridge/make-bridge/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_make_bridge_restore_endpoint()
    {

        $makeBridge = \Innoboxrr\MakeBridge\Models\MakeBridge::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'make_bridge_id' => $makeBridge->id
        ];

        $this->json('POST', '/api/innoboxrr/makebridge/make-bridge/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_make_bridge_force_delete_endpoint()
    {

        $makeBridge = \Innoboxrr\MakeBridge\Models\MakeBridge::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'make_bridge_id' => $makeBridge->id
        ];

        $this->json('DELETE', '/api/innoboxrr/makebridge/make-bridge/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_make_bridge_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/innoboxrr/makebridge/make-bridge/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}
