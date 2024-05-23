<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageBannerPostRequest extends FormRequest
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
            'about_banner' => 'image|dimensions:min_width=1920,min_height=700',
            'contact_banner' => 'image|dimensions:min_width=1920,min_height=700',
            'faqs_banner' => 'image|dimensions:min_width=1920,min_height=700',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'dimensions' => 'The :attribute should be minimun width :min_width and minimum height :min_height.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'about_banner' => 'About Banner',
            'contact_banner' => 'Contact Banner',
            'faqs_banner' => 'FAQs Banner',
        ];
    }
}
