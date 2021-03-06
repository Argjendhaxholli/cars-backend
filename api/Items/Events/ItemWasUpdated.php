<?php

namespace Api\Items\Events;

use Infrastructure\Events\Event;
use Api\Items\Models\Item;

class ItemWasUpdated extends Event
{
    public $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }
}
