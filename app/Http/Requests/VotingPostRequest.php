<?php

namespace App\Http\Requests;

use App\Rules\AnswerBelongsToQuestion;
use Illuminate\Foundation\Http\FormRequest;

class VotingPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'answer_id' => new AnswerBelongsToQuestion($this->question->id)
        ];
    }
}
