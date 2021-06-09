<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Question;

class DateIntervalsOverlap implements Rule
{
    private $questionId;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($questionId)
    {
        $this->questionId = $questionId;
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
            ->where('id', '!=', $this->questionId)
            ->get();

        return sizeof($questions) == 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'There is already question in given date interval';
    }
}
