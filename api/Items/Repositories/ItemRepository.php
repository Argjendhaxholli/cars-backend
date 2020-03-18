<?php

namespace Api\Items\Repositories;

use Api\Items\Models\Item;
use Infrastructure\Database\Eloquent\Repository;

class ItemRepository extends Repository
{
    public function getModel()
    {
        return new Item();
    }

    public function create(array $data)
    {
        $item = $this->getModel();
        $item->fill($data);
        $item->save();

        return $item;
    }

    public function update(Item $item, array $data)
    {
        $item->fill($data);
        $item->save();

        return $item;
    }
}
