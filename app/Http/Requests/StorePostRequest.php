<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
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
        return [
            'title' => ['required','min:2', 'max:255', Rule::unique('posts', 'title')],
            'body' => ['required'],
            'image_post' => ['required', 'image', 'max:1024'],
            'chosen_categories' => ['required', 'array', 'min:1', 'max:3'],
            'chosen_categories.*' => ['integer'],
        ];
    }
}