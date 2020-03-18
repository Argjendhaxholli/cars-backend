<?php

namespace Infrastructure\Console;

use Illuminate\Console\Command;

class CreateModuleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:create {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates new module as a folder in api';


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $model = $this->argument('name');
        if ($model && $model !== '') {

            $modelWithoutS = (substr($model, -1) == 's') ? $str = substr($model, 0, -1) : $model;

            //Create directories
            if (!is_dir(dirname(__FILE__) . "/../../api/$model")) mkdir(dirname(__FILE__) . "/../../api/$model");
            if (!is_dir(dirname(__FILE__) . "/../../api/" . $model . "/Console")) mkdir(dirname(__FILE__) . "/../../api/" . $model . "/Console");
            if (!is_dir(dirname(__FILE__) . "/../../api/" . $model . "/Controllers")) mkdir(dirname(__FILE__) . "/../../api/" . $model . "/Controllers");
            if (!is_dir(dirname(__FILE__) . "/../../api/" . $model . "/Events")) mkdir(dirname(__FILE__) . "/../../api/" . $model . "/Events");
            if (!is_dir(dirname(__FILE__) . "/../../api/" . $model . "/Exceptions")) mkdir(dirname(__FILE__) . "/../../api/" . $model . "/Exceptions");
            if (!is_dir(dirname(__FILE__) . "/../../api/" . $model . "/Models")) mkdir(dirname(__FILE__) . "/../../api/" . $model . "/Models");
            if (!is_dir(dirname(__FILE__) . "/../../api/" . $model . "/Repositories")) mkdir(dirname(__FILE__) . "/../../api/" . $model . "/Repositories");
            if (!is_dir(dirname(__FILE__) . "/../../api/" . $model . "/Requests")) mkdir(dirname(__FILE__) . "/../../api/" . $model . "/Requests");
            if (!is_dir(dirname(__FILE__) . "/../../api/" . $model . "/Services")) mkdir(dirname(__FILE__) ."/../../api/" . $model . "/Services");


            //Console Data
            $filecontent = file_get_contents(dirname(__FILE__) . '/../../api/Examples/Console/AddUserCommand.php', FILE_USE_INCLUDE_PATH);
            $edited = str_replace(["User","Example"], $modelWithoutS, $filecontent);
            $edited = str_replace("AddUser", "Add" . $modelWithoutS, $edited);
            $edited = str_replace("user", $this->from_camel_case(lcfirst($modelWithoutS)), $edited);
            $file_contents = file_put_contents(dirname(__FILE__) . "/../../api/" . $model . "/Console/Add" . $modelWithoutS . "Command.php", $edited);


            //Controller Data
            $filecontent = file_get_contents(dirname(__FILE__) . '/../../api/Examples/Controllers/UserController.php', FILE_USE_INCLUDE_PATH);
            $edited = str_replace(["User","Example"], $modelWithoutS, $filecontent);
            $edited = str_replace("user", $this->from_camel_case(lcfirst($modelWithoutS)), $edited);
            $file_contents = file_put_contents(dirname(__FILE__) . "/../../api/" . $model . "/Controllers/" . $modelWithoutS . "Controller.php", $edited);


            //Events
            $filecontent = file_get_contents(dirname(__FILE__) . '/../../api/Examples/Events/UserWasCreated.php', FILE_USE_INCLUDE_PATH);
            $edited = str_replace(["User","Example"], $modelWithoutS, $filecontent);
            $edited = str_replace("user", $this->from_camel_case(lcfirst($modelWithoutS)), $edited);

            $file_contents = file_put_contents(dirname(__FILE__) . "/../../api/" . $model . "/Events/" . $modelWithoutS . "WasCreated.php", $edited);

            $edited = str_replace($modelWithoutS . "WasCreated", $modelWithoutS . "WasUpdated", $edited);
            $file_contents = file_put_contents(dirname(__FILE__) . "/../../api/" . $model . "/Events/" . $modelWithoutS . "WasUpdated.php", $edited);
            $edited = str_replace($modelWithoutS . "WasUpdated", $modelWithoutS . "WasDeleted", $edited);
            $file_contents = file_put_contents(dirname(__FILE__) . "/../../api/" . $model . "/Events/" . $modelWithoutS . "WasDeleted.php", $edited);

            //Exceptions
            $filecontent = file_get_contents(dirname(__FILE__) . '/../../api/Examples/Exceptions/UserNotFoundException.php', FILE_USE_INCLUDE_PATH);
            $edited = str_replace(["User","Example"], $modelWithoutS, $filecontent);
//    $edited = str_replace($model."s",$model,$edited);
            $edited = str_replace("user", $this->from_camel_case(lcfirst($modelWithoutS)), $edited);
            $file_contents = file_put_contents(dirname(__FILE__) . "/../../api/" . $model . "/Exceptions/" . $modelWithoutS . "NotFoundException.php", $edited);

            //Models
            $filecontent = file_get_contents(dirname(__FILE__) . '/../../api/Examples/Models/User.php', FILE_USE_INCLUDE_PATH);
            $edited = str_replace(["User","Example"], $modelWithoutS, $filecontent);
//    $edited = str_replace($model."s",$model,$edited);
            $edited = str_replace("user", $this->from_camel_case(lcfirst($modelWithoutS)), $edited);
            $file_contents = file_put_contents(dirname(__FILE__) . "/../../api/" . $model . "/Models/" . $modelWithoutS . ".php", $edited);

            //Repositories
            $filecontent = file_get_contents(dirname(__FILE__) . '/../../api/Examples/Repositories/UserRepository.php', FILE_USE_INCLUDE_PATH);
            $edited = str_replace(["User","Example"], $modelWithoutS, $filecontent);
//    $edited = str_replace($model."s",$model,$edited);
            $edited = str_replace("user", $this->from_camel_case(lcfirst($modelWithoutS)), $edited);
            $file_contents = file_put_contents(dirname(__FILE__) . "/../../api/" . $model . "/Repositories/" . $modelWithoutS . "Repository.php", $edited);

            //Requests
            $filecontent = file_get_contents(dirname(__FILE__) . '/../../api/Examples/Requests/CreateUserRequest.php', FILE_USE_INCLUDE_PATH);
            $edited = str_replace(["User","Example"], $modelWithoutS, $filecontent);
//    $edited = str_replace($model."s",$model,$edited);
            $edited = str_replace("user", $this->from_camel_case(lcfirst($modelWithoutS)), $edited);
            $file_contents = file_put_contents(dirname(__FILE__) . "/../../api/" . $model . "/Requests/Create" . $modelWithoutS . "Request.php", $edited);

            //Services
            $filecontent = file_get_contents(dirname(__FILE__) . '/../../api/Examples/Services/UserService.php', FILE_USE_INCLUDE_PATH);
            $edited = str_replace(["User","Example"], $modelWithoutS, $filecontent);
//    $edited = str_replace($model."s",$model,$edited);
            $edited = str_replace("user", $this->from_camel_case(lcfirst($modelWithoutS)), $edited);
            $file_contents = file_put_contents(dirname(__FILE__) . "/../../api/" . $model . "/Services/" . $modelWithoutS . "Service.php", $edited);

            //routes
            $filecontent = file_get_contents(dirname(__FILE__) . '/../../api/Examples/routes.php', FILE_USE_INCLUDE_PATH);
            $edited = str_replace("UserController", $modelWithoutS . "Controller", $filecontent);
            $edited = str_replace(["User","Example"], $modelWithoutS, $edited);
//    $edited = str_replace($model."s",$model,$edited);
            $edited = str_replace("users", $this->from_camel_case(lcfirst($model)), $edited);
            $file_contents = file_put_contents(dirname(__FILE__) . "/../../api/" . $model . "/routes.php", $edited);

            //Providers
            $filecontent = file_get_contents(dirname(__FILE__) . '/../../api/Examples/UserServiceProvider.php', FILE_USE_INCLUDE_PATH);
            $edited = str_replace(["User","Example"], $modelWithoutS, $filecontent);

            $edited = str_replace("user", $this->from_camel_case(lcfirst($modelWithoutS)), $edited);
            $file_contents = file_put_contents(dirname(__FILE__) . "/../../api/" . $model . "/" . $modelWithoutS . "ServiceProvider.php", $edited);
        }

        $this->info(sprintf('Module %s Created. See Api/%s for all details', $modelWithoutS, $modelWithoutS));
    }

    public function from_camel_case($input)
    {
        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $input, $matches);
        $ret = $matches[0];
        foreach ($ret as &$match) {
            $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }
        return implode('_', $ret);
    }
}
