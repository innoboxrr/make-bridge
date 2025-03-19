<?php

namespace Innoboxrr\MakeBridge\Policies;

use App\Models\User;
use Innoboxrr\MakeBridge\Models\MakeBridge;
use Illuminate\Auth\Access\HandlesAuthorization;

class MakeBridgePolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {

        $exceptAbilities = [];

        if($user->isAdmin() && !in_array($ability, $exceptAbilities)){
        
            return true;
            
        }

    }

    public function index(User $user)
    {
        return false;
    }

    public function viewAny(User $user)
    {
        return false;
    }

    public function view(User $user, MakeBridge $makeBridge)
    {
        return false;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, MakeBridge $makeBridge)
    {
        return false;
    }

    public function delete(User $user, MakeBridge $makeBridge)
    {
        return false;
    }

    public function restore(User $user, MakeBridge $makeBridge)
    {
        return false;
    }

    public function forceDelete(User $user, MakeBridge $makeBridge)
    {
        return false;
    }

    public function export(User $user)
    {
        return false;
    }

}
