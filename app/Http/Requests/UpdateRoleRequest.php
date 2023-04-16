<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome'  =>  'string|required|unique:permissions,nome,'.$this->role->id,
            'descricao' =>  'string|required',
        ];
    }
}
