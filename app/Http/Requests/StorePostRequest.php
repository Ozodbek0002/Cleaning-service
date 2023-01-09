<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'title' => 'required|max:255',
            'conten' => 'required',
            'short_content' => 'required',
            'photo'=>'nullable|image|max:2048',
        ];
    }
}
