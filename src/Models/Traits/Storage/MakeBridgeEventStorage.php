<?php

namespace Innoboxrr\MakeBridge\Models\Traits\Storage;

// use Innoboxrr\MakeBridge\Models\MakeBridgeEventMeta;

trait MakeBridgeEventStorage
{

    public function createModel($request)
    {

        $makeBridgeEvent = $this->create($request->only($this->creatable));

        return $makeBridgeEvent;

    }

    public function updateModel($request)
    {
     
        $this->update($request->only($this->updatable));

        return $this;

    }

    /*
    public function updateModelMetas($request)
    {

        $this->update_metas($request, MakeBridgeEventMeta::class, 'make_bridge_event_id')->updatePayload();

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