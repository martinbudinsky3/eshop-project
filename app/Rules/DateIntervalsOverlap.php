<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Question;

class DateIntervalsOverlap implements Rule
{
    private $questionId;
    private $intervalStart;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($questionId=null, $intervalStart=null)
    {
        $this->questionId = $questionId;
        $this->intervalStart = $intervalStart;
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
        $startOrEndOfNewIntervalInsideExisting = Question::where('date_from', '<=', $value)
            ->where('date_to', '>=', $value)
            ->where('id', '!=', $this->questionId)
            ->exists();

        $wholeExistingIntervalInsideNew = $this->intervalStart != null &&
            Question::where('date_from', '>', $this->intervalStart)
                ->where('date_from', '<', $value)
                ->where('id', '!=', $this->questionId)
                ->exists();

        return !$startOrEndOfNewIntervalInsideExisting && !$wholeExistingIntervalInsideNew;
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
