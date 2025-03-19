<?php

namespace Innoboxrr\MakeBridge\Http\Requests\MakeBridge;

use Innoboxrr\MakeBridge\Models\MakeBridge;
use Innoboxrr\MakeBridge\Http\Resources\Models\MakeBridgeResource;
use Innoboxrr\MakeBridge\Http\Events\MakeBridge\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $makeBridge = MakeBridge::findOrFail($this->make_bridge_id);

        return $this->user()->can('delete', $makeBridge);

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

        $makeBridge = MakeBridge::findOrFail($this->make_bridge_id);

        $makeBridge->deleteModel();

        $response = new MakeBridgeResource($makeBridge);

        event(new DeleteEvent($makeBridge, $this->all(), $response));

        return $response;

    }
    
}
