<?php

namespace App\Http\Requests\Dashboard\Admin\Category;

use App\Http\Requests\Dashboard\Admin\AdminRequest;

class EditCategoryRequest extends AdminRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "category_id" => "required|numeric|min:1",
            "name" => "required",
            "desc" => "required"
        ];
    }
}
