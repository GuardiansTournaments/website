<?php

namespace App\Http\Requests\tournament;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreTournamentRequest extends FormRequest
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
            'name' => 'required|string',
            'description' => 'required|string',
            'user_id' => 'numeric|min:1|not_in:0',
            'game_id' => 'required|numeric|min:1|not_in:0',
            'start' => 'required|date_format:Y-m-d\TH:i|after:' . Carbon::now(),
            'team_size' => 'numeric|min:1|not_in:0',
            'team_amount' => 'numeric|min:2|not_in:0',
            'format' => 'numeric|min:1|not_in:0',
            'banner' => 'required',
            'banner.*' => 'mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
