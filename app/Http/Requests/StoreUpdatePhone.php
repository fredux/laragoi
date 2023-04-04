<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePhone extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
     
        $id = $this->segment(3);
        $rules = [
            'fone' => ['required', 'string', 'min:1', 'max:255',"unique:phones,fone,{$id},id"],
        ];
        return $rules;
    
     
    }
}
