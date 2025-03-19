<?php

namespace Innoboxrr\MakeBridge\Http\Requests\MakeBridge;

use Innoboxrr\MakeBridge\Models\MakeBridge;
use Innoboxrr\MakeBridge\Http\Resources\Models\MakeBridgeResource;
use Innoboxrr\MakeBridge\Http\Events\MakeBridge\Events\RestoreEvent;
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
        
        $makeBridge = MakeBridge::withTrashed()->findOrFail($this->make_bridge_id);
        
        return $this->user()->can('restore', $makeBridge);

    }

    public function rules()
    {
        return [
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

        $makeBridge = MakeBridge::withTrashed()->findOrFail($this->make_bridge_id);

        $makeBridge->restoreModel();

        $response = new MakeBridgeResource($makeBridge);

        event(new RestoreEvent($makeBridge, $this->all(), $response));

        return $response;

    }
    
}
