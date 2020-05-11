<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
    public function rules()
    {
        $rules = [
          'page_id'       => 'filled|numeric',
          'actress_name'  => 'max:50',
          'genre_ids'     => 'array',
          'item_id'       => 'filled|regex:/^[a-zA-Z0-9-]+$/',
        ];

        return $rules;
    }
}
