<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Carbon\Carbon;
use Auth;

class EventEditRequest extends Request
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
            'tickets' => 'required',
            'event_date' => 'required|after:' . Carbon::now()
        ];
    }

    public function messages()
    {   
        return [
            'event_time.after' => "Don't be silly, you can't make an event in the past"
        ];
    }
}
