<?php

namespace Api\Examples\Console;

use Api\Users\Repositories\UserRepository;
use Illuminate\Console\Command;

class AddUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:add {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds a new user';

    /**
     * User repository to persist user in database
     *
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * Create a new command instance.
     *
     * @param  UserRepository  $userRepository
     * @return void
     */
    public function __construct(UserRepository $userRepository)
    {
        parent::__construct();

        $this->userRepository = $userRepository;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $user = $this->userRepository->create([
            'name' => $this->argument('name'),
        ]);

        $this->info(sprintf('A user was created with ID %s', $user->id));
    }
}
