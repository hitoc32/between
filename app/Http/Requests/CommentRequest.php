<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required | max:40',
            'comment' => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'title.rquired' => 'タイトルを入力してください',
            'tiele.max' => 'タイトルは40文字以内で入力してください',
            'comment.required' => 'コメント本文を入力してください',
        ];
    }
}
