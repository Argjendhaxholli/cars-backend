<?php

namespace Api\Items\Controllers;

use Illuminate\Http\Request;
use Infrastructure\Http\Controller;
use Api\Items\Requests\CreateItemRequest;
use Api\Items\Services\ItemService;

class ItemController extends Controller
{
    private $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    public function getAll()
    {

        $resourceOptions = $this->parseResourceOptions();

        $data = $this->itemService->getAll($resourceOptions);
        $parsedData = $this->parseData($data, $resourceOptions);

        return $this->response($parsedData);
    }

    public function getById($itemId)
    {
        $resourceOptions = $this->parseResourceOptions();

        $data = $this->itemService->getById($itemId, $resourceOptions);
        $parsedData = $this->parseData($data, $resourceOptions);

        return $this->response($parsedData);
    }

    public function create(CreateItemRequest $request)
    {
        $data = $request->get('item', []);

        return $this->response($this->itemService->create($data), 201);
    }

    public function update($itemId, Request $request)
    {
        $data = $request->get('item', []);

        return $this->response($this->itemService->update($itemId, $data));
    }

    public function delete($itemId)
    {
        return $this->response($this->itemService->delete($itemId));
    }
}
