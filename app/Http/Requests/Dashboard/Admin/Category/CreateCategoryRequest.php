<?php

namespace App\Http\Requests\Dashboard\Admin\Category;

use App\Http\Requests\Dashboard\Admin\AdminRequest;

class CreateCategoryRequest extends AdminRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => "required",
            "desc" => "required"
        ];
    }
}
