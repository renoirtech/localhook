<?php

namespace App\Http\Controllers\Environments;

use App\Environment;
use App\Http\Controllers\Base\CrudController;

class EnvironmentsController extends CrudController
{
    protected $model = Environment::class;

    protected $validation_store = [
        'name' => 'required',
        'url' => 'required',
    ];

    protected $validation_update = [
        'name' => 'required',
        'url' => 'required',
    ];
}
