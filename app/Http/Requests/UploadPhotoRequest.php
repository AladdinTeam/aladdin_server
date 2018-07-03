<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadPhotoRequest extends FormRequest
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
        $rules = [
//            'name' => 'required'
        ];
        if($this->has('files')) {
            $photos = count($this->file('files'));
            for($i = 0; $i < $photos; $i++){
                $rules['files.' . $i] = 'image|mimes:jpeg,bmp,png';
            }
        }
        return $rules;
    }
}
