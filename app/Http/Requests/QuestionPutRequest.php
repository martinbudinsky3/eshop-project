<?php


namespace App\Http\Requests;


use App\Rules\DateIntervalsOverlap;
use Illuminate\Foundation\Http\FormRequest;

class QuestionPutRequest extends FormRequest
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
            'text' => 'unique:questions,text,' . $this->question->id . ',id|required|string',
            'date_from' => ['required','date', 'before_or_equal:date_to', new DateIntervalsOverlap($this->question->id)],
            'date_to' => ['required', 'date', new DateIntervalsOverlap($this->question->id, $this->date_from)]
        ];
    }

}
