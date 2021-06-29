<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if($this->getMethod()=="POST"){
            return User::VALDATIONS_RULES_CEARTE;
        }
        else
        {
            $array=User::VALDATIONS_RULES_CEARTE;
            $array=Arr::forget($array, ['email', 'username']);

            //not empty or whitespaces
            $array = Arr::where($array, function ($value, $key) {
                return strlen(trim($value))>0;
            });
            if(Arr::hasAny($array, ['name', 'password']))
            {
                return [];
            }
            return $array;

        }
    }
}
