<?php

namespace Innoboxrr\MakeBridge\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Innoboxrr\MakeBridge\Tests\TestCase;

class MakeBridgeEventEndpointsTest extends TestCase
{

    use RefreshDatabase,
        WithFaker;

    public function test_make_bridge_event_policies_endpoint()
    {

        $makeBridgeEvent = \Innoboxrr\MakeBridge\Models\MakeBridgeEvent::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $makeBridgeEvent->id
        ];

        $this->json('GET', '/api/innoboxrr/makebridge/make-bridge-event/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_make_bridge_event_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/innoboxrr/makebridge/make-bridge-event/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_make_bridge_event_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/makebridge/make-bridge-event/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_make_bridge_event_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/makebridge/make-bridge-event/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_make_bridge_event_show_auth_endpoint()
    {

        $makeBridgeEvent = \Innoboxrr\MakeBridge\Models\MakeBridgeEvent::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'make_bridge_event_id' => $makeBridgeEvent->id
        ];

        $this->json('GET', '/api/innoboxrr/makebridge/make-bridge-event/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_make_bridge_event_show_guest_endpoint()
    {

        $makeBridgeEvent = \Innoboxrr\MakeBridge\Models\MakeBridgeEvent::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'make_bridge_event_id' => $makeBridgeEvent->id
        ];

        $this->json('GET', '/api/innoboxrr/makebridge/make-bridge-event/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_make_bridge_event_create_endpoint()
    {

        $user = \Innoboxrr\MakeBridge\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \Innoboxrr\MakeBridge\Models\MakeBridgeEvent::factory()->make()->getAttributes();

        $this->json('POST', '/api/innoboxrr/makebridge/make-bridge-event/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_make_bridge_event_update_endpoint()
    {

        $makeBridgeEvent = \Innoboxrr\MakeBridge\Models\MakeBridgeEvent::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\Innoboxrr\MakeBridge\Models\MakeBridgeEvent::factory()->make()->getAttributes(),
            'make_bridge_event_id' => $makeBridgeEvent->id
        ];

        $this->json('PUT', '/api/innoboxrr/makebridge/make-bridge-event/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_make_bridge_event_delete_endpoint()
    {

        $makeBridgeEvent = \Innoboxrr\MakeBridge\Models\MakeBridgeEvent::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'make_bridge_event_id' => $makeBridgeEvent->id
        ];

        $this->json('DELETE', '/api/innoboxrr/makebridge/make-bridge-event/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_make_bridge_event_restore_endpoint()
    {

        $makeBridgeEvent = \Innoboxrr\MakeBridge\Models\MakeBridgeEvent::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'make_bridge_event_id' => $makeBridgeEvent->id
        ];

        $this->json('POST', '/api/innoboxrr/makebridge/make-bridge-event/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_make_bridge_event_force_delete_endpoint()
    {

        $makeBridgeEvent = \Innoboxrr\MakeBridge\Models\MakeBridgeEvent::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'make_bridge_event_id' => $makeBridgeEvent->id
        ];

        $this->json('DELETE', '/api/innoboxrr/makebridge/make-bridge-event/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_make_bridge_event_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/innoboxrr/makebridge/make-bridge-event/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}
