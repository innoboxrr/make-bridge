<?php

namespace Innoboxrr\MakeBridge\Http\Requests\MakeBridgeEvent;

use Innoboxrr\MakeBridge\Models\MakeBridgeEvent;
use Innoboxrr\MakeBridge\Http\Resources\Models\MakeBridgeEventResource;
use Innoboxrr\MakeBridge\Http\Events\MakeBridgeEvent\Events\RestoreEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RestoreRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $makeBridgeEvent = MakeBridgeEvent::withTrashed()->findOrFail($this->make_bridge_event_id);
        
        return $this->user()->can('restore', $makeBridgeEvent);

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

        $makeBridgeEvent = MakeBridgeEvent::withTrashed()->findOrFail($this->make_bridge_event_id);

        $makeBridgeEvent->restoreModel();

        $response = new MakeBridgeEventResource($makeBridgeEvent);

        event(new RestoreEvent($makeBridgeEvent, $this->all(), $response));

        return $response;

    }
    
}
