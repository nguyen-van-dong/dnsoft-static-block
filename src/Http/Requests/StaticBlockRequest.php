<?php

namespace Module\StaticBlock\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaticBlockRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'content' => 'required',
            'slug' => 'required|unique:static_blocks,slug,'.$this->route('id'),
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => __('static-block::message.name'),
            'content' => __('static-block::message.content'),
            'slug' => __('static-block::message.slug'),
        ];
    }
}
