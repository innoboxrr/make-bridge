<?php

namespace Innoboxrr\MakeBridge\Http\Requests\MakeBridgeEvent;

use Innoboxrr\MakeBridge\Models\MakeBridgeEvent;
use Innoboxrr\MakeBridge\Http\Resources\Models\MakeBridgeEventResource;
use Innoboxrr\MakeBridge\Http\Events\MakeBridgeEvent\Events\UpdateEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $makeBridgeEvent = MakeBridgeEvent::findOrFail($this->make_bridge_event_id);

        return $this->user()->can('update', $makeBridgeEvent);

    }

    public function rules()
    {
        return [
            //
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

        $makeBridgeEvent = $makeBridgeEvent->updateModel($this);

        $response = new MakeBridgeEventResource($makeBridgeEvent);

        event(new UpdateEvent($makeBridgeEvent, $this->all(), $response));

        return $response;

    }

}
