<?php

namespace Innoboxrr\MakeBridge\Exports;

use Innoboxrr\MakeBridge\Models\MakeBridge;
use Innoboxrr\SearchSurge\Search\Builder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MakeBridgesExports implements FromView
{

    protected $data;

    public function __construct( array $data) 
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view(
            config(
                'innoboxrrmakebridge.excel_view', 
                'innoboxrrmakebridge::excel.'
            ) . 'make_bridge', 
            [
                'make_bridges' => $this->getQuery(),
                'exportCols' => MakeBridge::$export_cols
            ]
        );
    }

    public function getQuery()
    {   
        $builder = new Builder();
        return $builder->get(MakeBridge::class, $this->data);
    }

}