<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Contract;

class ContractController
{
    public function index()
    {
        $contracts = Contract::findAll();
        View::render([
            "view" => "Contracts",
            "title" => "Contracts",
            "layout" => "MainLayout",
            "data" => ["contracts" => $contracts]
        ]);
    }
}