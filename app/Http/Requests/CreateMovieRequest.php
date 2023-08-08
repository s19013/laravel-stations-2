<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return true;
    // }

    //  一部を型変換する
    public function validated()
    {
        // バリデーションチェックを通ったデータだけ取得
	    $validated = $this->validator->validated();
	    // キャストしたデータをarra_mergeで上書き
        return array_merge($validated,[
            'published_year' => (int) $this->published_year,
	        'is_showing' => (int) $this->is_public
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'unique:movies'],
            'image_url' => ['required', 'url'],
            'published_year' => ['required', 'gte:1900'],
            'description' => ['required'],
            'is_showing' => ['required', 'boolean'],
            // 'genre' => ['required'],
        ];
    }
}
