<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $database = \Config\Database::connect();
        $viewData = [];
        if ($database) 
        {
            // check if db exists:
            if($database->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME='codeigniter_db'")) {
                $viewData["dbConnection"] = true;
            } 
        } else {
            //db connection  not initialized
            return redirect()->to('db_setup');
        }
        return view('welcome_message', $viewData);
    }
}
