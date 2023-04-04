<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateSectors extends FormRequest
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
        $this->name = strtoupper($this->name);
        $id = $this->segment(3);
        $rules = [
            'name' => ['required', 'string', 'uppercase','min:1', 'max:255',"unique:marks,name,{$id},id"],
        ];
        return $rules;

    }
}
