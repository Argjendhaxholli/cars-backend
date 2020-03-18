<?php

namespace Api\Item;

use Infrastructure\Events\EventServiceProvider;
use Api\Items\Events\ItemWasCreated;
use Api\Items\Events\ItemWasDeleted;
use Api\Items\Events\ItemWasUpdated;

class ItemServiceProvider extends EventServiceProvider
{
    protected $listen = [
        ItemWasCreated::class => [
            // listeners for when a item is created
        ],
        ItemWasDeleted::class => [
            // listeners for when a item is deleted
        ],
        ItemWasUpdated::class => [
            // listeners for when a item is updated
        ]
    ];
}
