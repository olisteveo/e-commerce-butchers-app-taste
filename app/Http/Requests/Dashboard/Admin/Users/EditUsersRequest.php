<?php

namespace App\Http\Requests\Dashboard\Admin\Users;

use App\Http\Requests\Dashboard\Admin\AdminRequest;

class EditUsersRequest extends AdminRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "users_id" => "required|numeric|min:1",
            "name" => "required",
            "email" => "required"
        ];
    }
}
