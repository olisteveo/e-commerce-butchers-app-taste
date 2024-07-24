<?php

namespace App\Http\Requests\Dashboard\Admin\Pages;

use App\Http\Requests\Dashboard\Admin\AdminRequest;

class EditPageRequest extends AdminRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "page_id" => "required|numeric|min:1",
            "title" => "required",
            "content" => "required"
        ];
    }
}
