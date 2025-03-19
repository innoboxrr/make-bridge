<?php

namespace Innoboxrr\MakeBridge\Http\Requests\MakeBridgeEvent;

use Innoboxrr\MakeBridge\Models\MakeBridgeEvent;
use Innoboxrr\MakeBridge\Http\Resources\Models\MakeBridgeEventResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Innoboxrr\SearchSurge\Search\Builder;

class IndexRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        return $this->user()->can('index', MakeBridgeEvent::class);
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

        $builder = new Builder();

        $query = $builder->get(MakeBridgeEvent::class, $this->all());

        return MakeBridgeEventResource::collection($query);

    }
}
