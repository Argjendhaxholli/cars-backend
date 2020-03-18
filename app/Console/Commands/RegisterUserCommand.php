<?php

namespace App\Console\Commands;

use Api\Users\Models\User;
use Illuminate\Console\Command;

class RegisterUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'register:new-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Register new user';

    /**
     * User model.
     *
     * @var object
     */
    private $user;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        parent::__construct();
        $this->user = $user;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $details = $this->getDetails();

        $user = $this->user->createUser($details);

        $this->display($user);
    }

    public function getDetails() : array 
    {
        $details['name'] = $this->ask('Name');
        $details['email'] = $this->ask('Email');
        $details['password'] = $this->secret('password');

        while(! $this->isValidPassword($details['password'])){
            if(! $this->isRequiredLength($details['password'])){
                $this->error('Password must be more than six characters');
            }

            $details['password'] = $this->secret('Password');
        }

        return $details;
    }

       /**
     * Display created user.
     *
     * @param array $user
     * @return void
     */
    private function display(User $user) : void
    {
        $headers = ['Name', 'Email', 'Password'];

        $fields = [
            'Name' => $user->name,
            'email' => $user->email,
            'password' => $user->password
        ];

        $this->info('User created');
        $this->table($headers, [$fields]);
    }

    /**
     * Check if password is vailid
     *
     * @param string $password
     * @param string $confirmPassword
     * @return boolean
     */
    private function isValidPassword(string $password) : bool
    {
        return $this->isRequiredLength($password);
    }

     /**
     * Checks if password is longer than eight characters.
     *
     * @param string $password
     * @return bool
     */
    private function isRequiredLength(string $password) : bool
    {
        return strlen($password) > 8;
    }
}

