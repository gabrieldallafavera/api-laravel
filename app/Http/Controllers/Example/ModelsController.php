<?php

namespace App\Http\Controllers\Example;

class ModelsController extends BaseModelsController
{
    public function __construct()
    {
        $this->class = Models::class;
    }
}
