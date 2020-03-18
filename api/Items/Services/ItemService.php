<?php

namespace Api\Items\Services;

use Illuminate\Database\DatabaseManager;
use Illuminate\Events\Dispatcher;
use Api\Items\Exceptions\ItemNotFoundException;
use Api\Items\Events\ItemWasCreated;
use Api\Items\Events\ItemWasDeleted;
use Api\Items\Events\ItemWasUpdated;
use Api\Items\Repositories\ItemRepository;
use Illuminate\Support\Facades\Auth;

class ItemService
{
    private $auth;

    private $database;

    private $dispatcher;

    private $itemRepository;

    public function __construct(
        Auth $auth,
        DatabaseManager $database,
        Dispatcher $dispatcher,
        ItemRepository $itemRepository
    ) {
        $this->auth = $auth;
        $this->database = $database;
        $this->dispatcher = $dispatcher;
        $this->itemRepository = $itemRepository;
    }

    public function getAll($options = [])
    {
        return $this->itemRepository->get($options);
    }

    public function getById($itemId, array $options = [])
    {
        $item = $this->getRequestedItem($itemId);

        return $item;
    }

    public function create($data)
    {
        $item = $this->itemRepository->create($data);

        $this->dispatcher->dispatch(new ItemWasCreated($item));

        return $item;
    }

    public function update($itemId, array $data)
    {
        $item = $this->getRequestedItem($itemId);

        $this->itemRepository->update($item, $data);

        $this->dispatcher->dispatch(new ItemWasUpdated($item));

        return $item;
    }

    public function delete($itemId)
    {
        $item = $this->getRequestedItem($itemId);

        $this->itemRepository->delete($itemId);

        $this->dispatcher->dispatch(new ItemWasDeleted($item));
    }

    private function getRequestedItem($itemId)
    {
        $item = $this->itemRepository->getById($itemId);

        if (is_null($item)) {
            throw new ItemNotFoundException();
        }

        return $item;
    }
}
