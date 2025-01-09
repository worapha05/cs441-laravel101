<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateArtistRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required',
                'min:3',
                'max:255',
                Rule::unique('artists', 'name')
                ->ignore($this->artist)]
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'กรุณาระบุชื่อของศิลปิน',
            'name.min' => 'ชื่อของศิลปินต้องมีอย่างน้อย 3 ตัวอักษร',
            'name.max' => 'ชื่อของศิลปินต้องไม่เกิน 255 ตัวอักษร',
            'name.unique' => 'ชื่อศิลปินนี้มีอยู่แล้วในระบบ กรุณาเปลี่ยนเป็นชื่อใหม่',
        ];
    }
}
