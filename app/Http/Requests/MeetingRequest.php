<?php

namespace App\Http\Requests;

use App\Enums\DepartmentEnum;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class MeetingRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'organizer' => 'required|string|max:255',
            'start_time' => 'required|date|after_or_equal:today',
            'end_time' => 'required|date|after:start_time',
            'participants' => 'array',
            'participants.*' => 'exists:users,id',
            'department' => ['required', 'string', Rule::in(DepartmentEnum::getValues())],
        ];
    }
}
