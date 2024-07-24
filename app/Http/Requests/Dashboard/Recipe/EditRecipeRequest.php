<?php

namespace App\Http\Requests\Dashboard\Recipe;

use Illuminate\Foundation\Http\FormRequest;

class EditRecipeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->author->id == request()->post()["recipe_author"];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'recipe_id'=>'required|numeric|min:1',
            'recipe_author'=>'required|numeric|min:1',
            'title'=>'required',
            'desc'=>'required',
            'cookmeth'=>'required',
            'prep'=>'required',
            'serves'=>'required|numeric|min:1',
            'image'=>'required',
            'image-new'=>'image|nullable|max:1999',
        ];
    }
}
