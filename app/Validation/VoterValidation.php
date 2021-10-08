<?php

namespace App\Validation;

use Config\Validation;

class VoterValidation extends Validation
{
    public $voterPost = [
        'name' => 'required',
        'username' => 'required',
        'password' => 'required',
    ];
}
