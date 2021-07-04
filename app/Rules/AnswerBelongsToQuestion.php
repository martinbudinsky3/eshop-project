<?php

namespace App\Rules;

use App\Models\Answer;
use Illuminate\Contracts\Validation\Rule;

class AnswerBelongsToQuestion implements Rule
{
    private $questionId;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($questionId=null)
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
        return Answer::where('id', $value)
            ->where('question_id', $this->questionId)
            ->exists();
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
