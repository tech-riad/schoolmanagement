<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSessionRequest extends FormRequest
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
        // return [
        //     'title' => 'required|Rule::unique("sessions")->ignore(Helper::, "institute")',
        // ];
    }

    public function messages()
    {
        return [
            // 'title.required' => 'Session Must Be Current Year',
            // 'is_current.required' => 'Must Be Checked',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            // 'is_current' => $this->boolean('is_current'),
        ]);
    }
}
