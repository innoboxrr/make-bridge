<?php
 
namespace Innoboxrr\MakeBridge\Observers;
 
use Innoboxrr\MakeBridge\Models\MakeBridge;
 
class MakeBridgeObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the MakeBridge "created" event.
     */
    public function created(MakeBridge $makeBridge): void
    {
        // Remove if laravel-audit is used: $makeBridge->log('created');
    }
 
    /**
     * Handle the MakeBridge "updated" event.
     */
    public function updated(MakeBridge $makeBridge): void
    {
        // Remove if laravel-audit is used: $makeBridge->log('updated');
    }
 
    /**
     * Handle the MakeBridge "deleted" event.
     */
    public function deleted(MakeBridge $makeBridge): void
    {
        // Remove if laravel-audit is used: $makeBridge->log('deleted');
    }
 
    /**
     * Handle the MakeBridge "restored" event.
     */
    public function restored(MakeBridge $makeBridge): void
    {
        // Remove if laravel-audit is used: $makeBridge->log('restored');
    }
 
    /**
     * Handle the MakeBridge "forceDeleted" event.
     */
    public function forceDeleted(MakeBridge $makeBridge): void
    {
        // Remove if laravel-audit is used: $makeBridge->log('forceDeleted');
    }
}