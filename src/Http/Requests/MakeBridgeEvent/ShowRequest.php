<?php

namespace Innoboxrr\MakeBridge\Http\Requests\MakeBridgeEvent;

use Innoboxrr\MakeBridge\Models\MakeBridgeEvent;
use Innoboxrr\MakeBridge\Http\Resources\Models\MakeBridgeEventResource;
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

        $makeBridgeEvent = MakeBridgeEvent::findOrFail($this->make_bridge_event_id);

        return $this->user()->can('view', $makeBridgeEvent);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(MakeBridgeEvent::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(MakeBridgeEvent::$loadable_counts)
            ],
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

        $makeBridgeEvent = MakeBridgeEvent::where('id', $this->make_bridge_event_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new MakeBridgeEventResource($makeBridgeEvent);

    }
    
}
