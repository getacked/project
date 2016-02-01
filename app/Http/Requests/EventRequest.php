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
        if( Auth::check() )
        {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
        return [
            'event_name' => 'required|min:3',
            'type' => 'required',
            'tickets' => 'required',
            'event_time' => 'required|after:' . Carbon::now()
        ];
    }

    
    public function messages()
    {   
        return [
            'event_time.after' => "Don't be silly, you can't make an event in the past"
        ];
    }
}
