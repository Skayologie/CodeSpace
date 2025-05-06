<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommunityRequest extends FormRequest
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
        return [
            'name' => 'required|string|unique:communities|min:3|max:255',
            'description' => 'required|string|max:1000',
            'banner' => 'nullable|file',
            'icon' => 'nullable|file',
            'type' => 'required|string|in:public,private',
            'community_rules' => 'nullable',
        ];
    }
}
