<?php

namespace Innoboxrr\MakeBridge\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use Innoboxrr\Traits\ModelAppendsTrait;
use Innoboxrr\MakeBridge\Models\Traits\Relations\MakeBridgeEventRelations;
use Innoboxrr\MakeBridge\Models\Traits\Storage\MakeBridgeEventStorage;
use Innoboxrr\MakeBridge\Models\Traits\Assignments\MakeBridgeEventAssignment;
use Innoboxrr\MakeBridge\Models\Traits\Operations\MakeBridgeEventOperations;
use Innoboxrr\MakeBridge\Models\Traits\Mutators\MakeBridgeEventMutators;

class MakeBridgeEvent extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ModelAppendsTrait,
        MakeBridgeEventRelations,
        MakeBridgeEventStorage,
        MakeBridgeEventAssignment,
        MakeBridgeEventOperations,
        MakeBridgeEventMutators;
        
    protected $fillable = [
        //FILLABLE//
    ];

    protected $creatable = [
        //CREATABLE//
    ];

    protected $updatable = [
        //UPDATABLE//
    ];

    protected $casts = [
        //CASTS//
    ];

    protected $protected_metas = [];

    protected $editable_metas = [
        //EDITABLEMETAS//
    ];

    public static $export_cols = [
        //EXPORTCOLS//
    ];

    public static $loadable_relations = [
        //LOADABLERELATIONS//
    ];

    public static $loadable_counts = [
        //LOADABLECOUNTS//
    ];

    /*
    protected static function newFactory()
    {
        return \Innoboxrr\MakeBridge\Database\Factories\MakeBridgeEventFactory::new();
    }
    */

}
