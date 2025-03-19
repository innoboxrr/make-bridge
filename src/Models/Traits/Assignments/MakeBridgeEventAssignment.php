<?php

namespace Innoboxrr\MakeBridge\Models\Traits\Assignments;

/* Replace the word "Model" and "model" */

trait MakeBridgeEventAssignment
{

	public function assignModel($request)
	{

        $operationResult = $this->models()->syncWithoutDetaching([
            $request->model_id => [
            	// Pivot values
            ]
        ]);

        return response()->json([
        	'model_id' => $request->model_id,
        	'make_bridge_event_id' => $request->make_bridge_event_id,
        	'operation' => $operationResult
        ]);

	}

	public function deallocateModel($request)
	{

		$operationResult = $this->models()->detach($request->model_id);

		return response()->json([
        	'model_id' => $request->model_id,
        	'make_bridge_event_id' => $request->make_bridge_event_id,
        	'operation' => $operationResult
        ]);

	}

}