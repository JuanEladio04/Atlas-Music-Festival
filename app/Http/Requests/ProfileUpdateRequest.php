<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;

class ProfileUpdateRequest extends FormRequest
{

    use WithFileUploads;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'dni' => ['required', 'string', 'min:9', 'max:9', Rule::unique(User::class)->ignore($this->user()->id)],
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'f_nac' => ['date'],
            'n_telf' => ['numeric', Rule::unique(User::class)->ignore($this->user()->id)],
            'uImage' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048']
        ];
    }
}
