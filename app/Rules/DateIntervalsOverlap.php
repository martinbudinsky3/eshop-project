<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DateIntervalsOverlap implements Rule
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
        $questions = Question::where('date_from', '<=', $value)
            ->where('date_to', '>=', $value)
            ->get();

        return sizeof($questions) == 0 ? false : true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'There is already question overlapping given date interval';
    }
}
