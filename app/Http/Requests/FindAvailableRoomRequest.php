<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FindAvailableRoomRequest extends FormRequest
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
            'day'=> 'required',
            'from' => 'required',
            'to' => 'required|after:from',
            'number' => 'required|numeric|min:5',
            'meeting_name'=>'required',
            'responsible_person'=>'required',
            'need_tv'=>'nullable',
            'repeat'=>'nullable',
        ];
    }
}
