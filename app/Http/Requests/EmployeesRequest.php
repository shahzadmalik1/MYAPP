<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeesRequest extends FormRequest
{
    public function storeValidator(Request $request)
    {
        return Validator::make($request->all(), [
            'first_name'=> 'required',
            'last_name' => 'required',
            'email'     => 'required|email|unique:companies,email',
            'pone'      => 'integer',
            'company_id'=> 'integer|exists:companies,id',
        ]);
    }


    public function rules()
    {
        return [
            //
        ];
    }
}
