<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nickname' => ['string','max:25'],
            'email' => ['string', 'email:rfc,dns', 'max:50', 'unique:users'],
            'birth' => ['date', 'before:-15 years'],
            'platform' => ['string'],
            'password' => ['string', 'min:8'],
        ];
    }
}
