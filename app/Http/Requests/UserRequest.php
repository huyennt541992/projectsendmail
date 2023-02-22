<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        
        $uniqueMail = 'unique:user';
        
        if($this->id)
        {
            $id = $this->id;
            $uniqueMail = 'unique:user,mailaddress,'.$id;
        }
        return [
            'name' => 'required|min:5|max:12',
            "city" => "required|min:5|max:12",
            "mailaddress" => "required|email:rfc,dns|".$uniqueMail
            //.$uniqueMail 
        ];
    }

    public function messages()
    {
        return [
            "required" => ":attributeは必須です。",
            "min" => ":attributeは少しだけでも:min文字入力してください。",
            "max" => "入力した:attributeが長すぎる。下の:max文字入力してください。",
            "email" => ":attributeはは有効なメアドを入力してください。",
            "unique" => ":attributeは既に存じしてます。"
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'ユーザ名',
            'city' => '都道府県',
            'mailaddress' => 'メアド'
        ];
    }

}
