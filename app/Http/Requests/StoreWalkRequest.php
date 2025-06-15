<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWalkRequest extends FormRequest
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
            'date' => 'required|date',
            'time' => 'nullable',
            'location' => 'required|string|max:255',
            'memo' => 'nullable|string|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'date.required' => '日付は必須です。',
            'date.date' => '正しい日付を入力してください。',
            'location.required' => '場所は必須です。',
            'location.string' => '場所は文字列で入力してください。',
            'location.max' => '場所は255文字以内で入力してください。',
            'memo.string' => 'メモは文字列で入力してください。',
            'memo.max' => 'メモは1000文字以内で入力してください。',
        ];
    }
}
