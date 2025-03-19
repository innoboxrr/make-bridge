<?php

namespace Innoboxrr\MakeBridge\Models\Traits\Storage;

// use Innoboxrr\MakeBridge\Models\MakeBridgeMeta;

trait MakeBridgeStorage
{

    public function createModel($request)
    {

        $makeBridge = $this->create($request->only($this->creatable));

        return $makeBridge;

    }

    public function updateModel($request)
    {
     
        $this->update($request->only($this->updatable));

        return $this;

    }

    /*
    public function updateModelMetas($request)
    {

        $this->update_metas($request, MakeBridgeMeta::class, 'make_bridge_id')->updatePayload();

        return $this;

    }
    */

    public function deleteModel()
    {

        $this->delete();

    }

    public function restoreModel()
    {

        $this->restore();

    }

    public function forceDeleteModel()
    {

        abort(403);

        $this->forceDelete();
        
    }

}