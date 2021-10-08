<?php

namespace App\Validation;

use Config\Validation;

class AdminValidation extends Validation
{
    public $voterPost = [
        'name' => 'required',
        'username' => 'required',
        'password' => 'required',
    ];
}
