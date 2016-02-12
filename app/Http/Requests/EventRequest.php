<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;
use Carbon\Carbon;

class EventRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
        return [
            'name' => 'required|min:3',
            'type' => 'required',
            'ticket_cap' => 'required',
            'event_date' => 'required|after:' . Carbon::now(),
            // 'customTags' => 'alpha_dash'
        ];
    }

    
    public function messages()
    {   
        return [
            'event_date.after' => "Don't be silly, you can't make an event in the past"
        ];
    }
}
