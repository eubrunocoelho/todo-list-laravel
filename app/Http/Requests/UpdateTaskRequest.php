<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'task' => 'required|string|min:3|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'taks.required' => 'Digite uma tarefa.',
            'task.min' => 'A tarefa deve conter pelo menos :min caracteres.',
            'task.max' => 'A tarefa deve conter no máximo :max caracteres.'
        ];
    }
}
