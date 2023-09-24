<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'post.airport' => 'required|string',
            'post.airport_sf' => 'required|string|max:3',
            'post.region' => 'requierd',
            'post.basic_content' => 'required',
            'border_control.arrive_level' => 'nullable',
            'border_control.depature_level' => 'nullable',
        ];
        
    }
}
