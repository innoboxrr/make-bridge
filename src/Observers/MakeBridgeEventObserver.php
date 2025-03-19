<?php
 
namespace Innoboxrr\MakeBridge\Observers;
 
use Innoboxrr\MakeBridge\Models\MakeBridgeEvent;
 
class MakeBridgeEventObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the MakeBridgeEvent "created" event.
     */
    public function created(MakeBridgeEvent $makeBridgeEvent): void
    {
        // Remove if laravel-audit is used: $makeBridgeEvent->log('created');
    }
 
    /**
     * Handle the MakeBridgeEvent "updated" event.
     */
    public function updated(MakeBridgeEvent $makeBridgeEvent): void
    {
        // Remove if laravel-audit is used: $makeBridgeEvent->log('updated');
    }
 
    /**
     * Handle the MakeBridgeEvent "deleted" event.
     */
    public function deleted(MakeBridgeEvent $makeBridgeEvent): void
    {
        // Remove if laravel-audit is used: $makeBridgeEvent->log('deleted');
    }
 
    /**
     * Handle the MakeBridgeEvent "restored" event.
     */
    public function restored(MakeBridgeEvent $makeBridgeEvent): void
    {
        // Remove if laravel-audit is used: $makeBridgeEvent->log('restored');
    }
 
    /**
     * Handle the MakeBridgeEvent "forceDeleted" event.
     */
    public function forceDeleted(MakeBridgeEvent $makeBridgeEvent): void
    {
        // Remove if laravel-audit is used: $makeBridgeEvent->log('forceDeleted');
    }
}