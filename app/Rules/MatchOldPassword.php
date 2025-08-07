<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Hash;

class MatchOldPassword implements Rule
{
    public function passes($attribute, $value)

    {

        return Hash::check($value, auth()->user()->password);
    }

    public function message()

    {

        return 'The :attribute is match with old password.';
    }
}
