<?php

namespace Api\Items\Console;

use Api\Items\Repositories\ItemRepository;
use Illuminate\Console\Command;

class AddItemCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'items:add {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds a new item';

    /**
     * Item repository to persist item in database
     *
     * @var ItemRepository
     */
    protected $itemRepository;

    /**
     * Create a new command instance.
     *
     * @param  ItemRepository  $itemRepository
     * @return void
     */
    public function __construct(ItemRepository $itemRepository)
    {
        parent::__construct();

        $this->itemRepository = $itemRepository;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $item = $this->itemRepository->create([
            'name' => $this->argument('name'),
        ]);

        $this->info(sprintf('A item was created with ID %s', $item->id));
    }
}
