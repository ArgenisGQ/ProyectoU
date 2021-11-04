<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivityRequest extends FormRequest
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
        $activity = $this->route()->parameter('activity'); // caso NULL

        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:posts',
            'status' => 'required|in:1,2',
            'file' => 'image'
        ];

        if($activity){
            $rules['slug'] = 'required|unique:posts,slug,' . $activity->id;
        }

        if($this->status == 2){
            $rules = array_merge($rules,[
            'category_id' => 'required',
            'tags' => 'required',
            'extract' => 'required',
            'body' => 'required'
            ]);
        }

        return $rules;
    }
}
