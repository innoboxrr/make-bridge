<?php

namespace Innoboxrr\MakeBridge\Http\Requests\MakeBridge;

use Innoboxrr\MakeBridge\Models\MakeBridge;
use Innoboxrr\MakeBridge\Http\Resources\Models\MakeBridgeResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShowRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $makeBridge = MakeBridge::findOrFail($this->make_bridge_id);

        return $this->user()->can('view', $makeBridge);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(MakeBridge::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(MakeBridge::$loadable_counts)
            ],
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

        $makeBridge = MakeBridge::where('id', $this->make_bridge_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new MakeBridgeResource($makeBridge);

    }
    
}
