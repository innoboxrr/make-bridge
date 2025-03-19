<?php

namespace Innoboxrr\MakeBridge\Http\Requests\MakeBridge;

use Innoboxrr\MakeBridge\Models\MakeBridge;
use Innoboxrr\MakeBridge\Http\Resources\Models\MakeBridgeResource;
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
        return $this->user()->can('index', MakeBridge::class);
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

        $query = $builder->get(MakeBridge::class, $this->all());

        return MakeBridgeResource::collection($query);

    }
}
