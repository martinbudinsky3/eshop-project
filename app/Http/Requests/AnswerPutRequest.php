<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AnswerPutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'text' => ['required', 'string',
                Rule::unique('answers')
                    ->ignore($this->answer->id)
                    ->where(function ($query) {
                        return $query->where('question_id', $this->answer->question->id);
                    })
            ],
        ];
    }
}
