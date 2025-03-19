<?php

namespace Innoboxrr\MakeBridge\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use Innoboxrr\Traits\ModelAppendsTrait;
use Innoboxrr\MakeBridge\Models\Traits\Relations\MakeBridgeRelations;
use Innoboxrr\MakeBridge\Models\Traits\Storage\MakeBridgeStorage;
use Innoboxrr\MakeBridge\Models\Traits\Assignments\MakeBridgeAssignment;
use Innoboxrr\MakeBridge\Models\Traits\Operations\MakeBridgeOperations;
use Innoboxrr\MakeBridge\Models\Traits\Mutators\MakeBridgeMutators;

class MakeBridge extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ModelAppendsTrait,
        MakeBridgeRelations,
        MakeBridgeStorage,
        MakeBridgeAssignment,
        MakeBridgeOperations,
        MakeBridgeMutators;
        
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
        return \Innoboxrr\MakeBridge\Database\Factories\MakeBridgeFactory::new();
    }
    */

}
