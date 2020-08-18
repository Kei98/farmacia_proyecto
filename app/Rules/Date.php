<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Date implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
//        Date will be in the next format:
//        DD/MM/YYYY HH:MM
        $nums[] = explode("/", $value);
        $year[] = explode(" ", $nums[2]);
        $time[] = explode(":", $year[1]);
        if($nums[0] > 0 && $nums[0] < 32 && $nums[1] > 0 && $nums[1] < 13
            && $year[0] > 2009 && $year[0] < 2021 && $time[0] > -1 && $time[0] < 24
            && $time[1] > -1 && $time[1] < 60) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
