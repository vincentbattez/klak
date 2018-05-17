<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name'    => 'required|string|min:1',
            'id_user' => 'required',
            'id_team' => 'required'
        ];
    }

    /**
     * Get the validation messages.
     *
     * @return array
     */
    // public function messages() {
    //     return [
    //         'title.required'    => 'A title is required.',
    //         'name.required'    => 'The name field is required'
    //     ];
    // }
}
