<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Mobile implements Rule
{
    public function passes($attribute, $value)
    {
        // برای اعتبارسنجی شماره موبایل، شماره موبایل باید با ۰۹ شروع شود و ۱۰ رقم باشد
        return preg_match('/^09[0-9]{9}$/', $value);
    }

    public function message()
    {
        return 'The :attribute must be a valid mobile number.';
    }
}
