<?php

namespace Innoboxrr\MakeBridge\Http\Requests\MakeBridgeEvent;

use Innoboxrr\MakeBridge\Models\MakeBridgeEvent;
use Innoboxrr\MakeBridge\Http\Resources\Models\MakeBridgeEventResource;
use Innoboxrr\MakeBridge\Http\Events\MakeBridgeEvent\Events\CreateEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        return $this->user()->can('create', MakeBridgeEvent::class);

    }

    public function rules()
    {
        return [
            //
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

        $makeBridgeEvent = (new MakeBridgeEvent)->createModel($this);

        $response = new MakeBridgeEventResource($makeBridgeEvent);

        event(new CreateEvent($makeBridgeEvent, $this->all(), $response));

        return $response;

    }
    
}
