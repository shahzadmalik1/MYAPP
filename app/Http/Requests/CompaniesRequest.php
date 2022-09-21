<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompaniesRequest extends FormRequest
{

    public function storeValidator(Request $request)
    {
        return Validator::make($request->all(), [
            'name'  => 'required',
            'email' => 'required|email|unique:companies,email',
            'url'   => 'url',
            'logo'  => 'image|mimes:jpg,jpeg,png|dimensions:max_width=100,max_height=100',
        ]);
    }
    public function rules()
    {
        return  [];
    }
}
