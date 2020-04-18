<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        return [
            'cover_path' => 'required|image|mimes:jpeg,bmp,png|max:2000',
            'file_path' => 'required|file|mimes:fb2,doc,txt,xml|max:10000',
            'title' => 'required|string',
            'year' => 'required|integer|max:9999',
            'author_id' => 'required|string',
            'description' => 'required|string',
        ];
    }
}
