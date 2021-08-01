<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;
use Illuminate\Database\Migrations\Migration\users;
class StorePostRequest extends FormRequest
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
    { //dd($this->request->parameters->post_id);
        return [
           // 'title' => 'required|min:3|unique:posts,title_column_to_check,id_to_ignore',
            //'title' => 'required|min:3|unique:posts,title,' .$this->post->id ,
           'title' =>[' Required', 'min:3 ', Rule::unique('posts')->ignore($this->title,'title')],
            'description' => 'required|min:10',
            'post_creator' => 'required|exists:users,id',


        ];



    }

    public function messages()
    {
        return [
            'title.required' => 'title is required',
            'title.min' => 'title the minimum length is 3 chars.',
            'description.required' => 'description is required',
            'description.min' => 'description the minimum length is 10 chars.',


        ];
    }
}
