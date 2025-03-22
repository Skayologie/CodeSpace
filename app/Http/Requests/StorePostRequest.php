<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
    public function rules(): array
    {
        $param = $_GET["Type"];
        if ($param === "content-texte"){
            return [
                //
                "title"=>"required|min:20|max:300",
                "category"=>"required",
                "content"=>"required|min:20|max:500",
                "allTags"=>"required"
            ];
        }
    }
    public function messages()
    {
        return [
            "allTags"=>"The Tags Are required"
        ];
    }
}
