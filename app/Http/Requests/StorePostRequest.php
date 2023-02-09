<?php

namespace App\Http\Requests;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StorePostRequest extends FormRequest
{

    public function attributes()
    {
        return [
            'title'=>'Sarlavha',
            'conten'=>'Qisqacha mazmun',
            'short_content'=>'Ma`qola',
        ];
    }

    public function authorize()
    {
//        return Gate::authorize('create-post' ,Role::find(3));
        return true;
    }


    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'conten' => 'required',
            'short_content' => 'required',
            'photo'=>'nullable|image|max:2048',
        ];
    }
}
