<?php

namespace Api\Example\Events;

use Infrastructure\Events\Event;
use Api\Users\Models\User;

class UserWasUpdated extends Event
{
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
