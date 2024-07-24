<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadRecipeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'=>'required',
            'desc'=>'required',
            'cookmeth'=>'required',
            'prep'=>'required',
            'serves'=>'required|numeric|min:1',
            'image'=>'image|nullable|max:1999',
        ];
    }
}
