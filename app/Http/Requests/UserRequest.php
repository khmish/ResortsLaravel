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
        if ($this->getMethod() == "POST") {
            return User::VALDATIONS_RULES_CEARTE;
        } else {
            $array = User::VALDATIONS_RULES_CEARTE;

            $collection = collect($array);
            $collection = $collection->except(['username', 'email'])
            ->filter(function ($value, $key) {
                //not empty or whitespace
                if (strlen(trim($key)) > 0) {

                    return $key;
                }
            });

            return $collection->toArray();
        }
    }
}
