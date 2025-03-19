<?php

namespace Innoboxrr\MakeBridge\Exports;

use Innoboxrr\MakeBridge\Models\MakeBridgeEvent;
use Innoboxrr\SearchSurge\Search\Builder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MakeBridgeEventsExports implements FromView
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
            ) . 'make_bridge_event', 
            [
                'make_bridge_events' => $this->getQuery(),
                'exportCols' => MakeBridgeEvent::$export_cols
            ]
        );
    }

    public function getQuery()
    {   
        $builder = new Builder();
        return $builder->get(MakeBridgeEvent::class, $this->data);
    }

}