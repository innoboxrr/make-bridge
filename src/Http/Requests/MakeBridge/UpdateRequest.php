<?php

namespace Innoboxrr\MakeBridge\Http\Requests\MakeBridge;

use Innoboxrr\MakeBridge\Models\MakeBridge;
use Innoboxrr\MakeBridge\Http\Resources\Models\MakeBridgeResource;
use Innoboxrr\MakeBridge\Http\Events\MakeBridge\Events\UpdateEvent;
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
        
        $makeBridge = MakeBridge::findOrFail($this->make_bridge_id);

        return $this->user()->can('update', $makeBridge);

    }

    public function rules()
    {
        return [
            //
            'make_bridge_id' => 'required|numeric'
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

        $makeBridge = MakeBridge::findOrFail($this->make_bridge_id);

        $makeBridge = $makeBridge->updateModel($this);

        $response = new MakeBridgeResource($makeBridge);

        event(new UpdateEvent($makeBridge, $this->all(), $response));

        return $response;

    }

}
