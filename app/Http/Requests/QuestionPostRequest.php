<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\DateIntervalsOverlap;
use Illuminate\Validation\Rule;


class QuestionPostRequest extends FormRequest
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
            'text' => 'unique:questions,text|required|string',
            'date_from' => ['required','date', 'before_or_equal:date_to', new DateIntervalsOverlap],
            'date_to' => ['required', 'date', new DateIntervalsOverlap]
        ];
    }
}
