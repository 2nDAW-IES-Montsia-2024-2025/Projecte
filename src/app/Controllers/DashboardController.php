<?php

namespace App\Controllers;

use App\Core\View;

class DashboardController
{
    public function index($queryParams)
    {
        View::render([
            'view' => 'Dashboard',
            'title' => 'Worker Dashboard',
            'layout' => 'WorkerLayout',
        ]);
    }
}
