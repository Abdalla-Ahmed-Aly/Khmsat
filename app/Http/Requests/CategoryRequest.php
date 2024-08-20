<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [
            'category_name' => 'required|string|max:255',
            'image' => 'required|file|mimes:jpeg,png,jpg,gif,svg,avif|max:2048', // Adjust validation rules as needed
        ];
    }
}
