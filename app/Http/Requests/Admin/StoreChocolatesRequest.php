<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreChocolatesRequest extends FormRequest
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
            'category_id' => 'required',
            'images_id' => 'required',
            'title' => 'required',
            'full_price' => 'numeric',
            'half_price' => 'numeric',
            'quarter_price' => 'numeric',
            'description' => '',
        ];
    }
}
