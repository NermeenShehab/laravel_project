<?php

namespace App\Http\Requests;

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
    {
        return [
             'title' => 'required|min:3|unique:posts,title,',
            // 'title' => 'required|min:3|unique:posts,title,' .  $this->post->id ,
            'description' => 'required|min:10',
            'post_creator' => 'required|exists:users,id'

            // 'title' => 'required|min:3|unique:posts,title,'.$this->post->id,
            // // [
            // //     ' Required', 'min:3 ',     Rule::unique('posts')->ignore($this->route('user_id')),]

            // 'description' => ' Required |min:10',
            // 'user_id' => ' Required | exists:users,id',

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
