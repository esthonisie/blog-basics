<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
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
            'title' => ['required','min:2', 'max:255', Rule::unique('posts', 'title')->ignore($this->post->id)],
            'body' => ['required'],
            'image_post' => ['image', 'max:1024'],
            'category_id' => ['required', 'array', 'min:1', 'max:3'],
            'category_id.*' => ['integer'],
        ];
    }
}