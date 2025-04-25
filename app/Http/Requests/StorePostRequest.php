<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(Request $request): array
    {
        $param = $request->query('Type');
        if ($param === "texte"){
            return [
                //
                "title"=>"required|min:20|max:300",
                "category"=>"required",
                "content"=>"required|min:20|max:500",
                "allTags"=>"required"
            ];
        }

        return [];
    }
    public function messages()
    {
        return [
            "allTags"=>"The Tags Are required"
        ];
    }
}
