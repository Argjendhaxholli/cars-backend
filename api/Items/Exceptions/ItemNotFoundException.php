<?php

namespace Api\Items\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ItemNotFoundException extends NotFoundHttpException
{
    public function __construct()
    {
        parent::__construct('The item was not found.');
    }
}
