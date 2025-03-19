<?php

namespace Innoboxrr\MakeBridge\Http\Requests\MakeBridgeEvent;

use Innoboxrr\MakeBridge\Models\MakeBridgeEvent;
use Innoboxrr\MakeBridge\Http\Resources\Models\MakeBridgeEventResource;
use Innoboxrr\MakeBridge\Http\Events\MakeBridgeEvent\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $makeBridgeEvent = MakeBridgeEvent::findOrFail($this->make_bridge_event_id);

        return $this->user()->can('delete', $makeBridgeEvent);

    }

    public function rules()
    {
        return [
            'make_bridge_event_id' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }

    public function attributes()
    {
        return [
            //
        ];
    }

    protected function passedValidation()
    {
        //
    }

    public function handle()
    {

        $makeBridgeEvent = MakeBridgeEvent::findOrFail($this->make_bridge_event_id);

        $makeBridgeEvent->deleteModel();

        $response = new MakeBridgeEventResource($makeBridgeEvent);

        event(new DeleteEvent($makeBridgeEvent, $this->all(), $response));

        return $response;

    }
    
}
