<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ContactRequest
 * @package App\Http\Requests\Admin
 */
class ProductRequest extends FormRequest {
  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'name' => 'required|max:255',
      'price' => 'sometimes',
      'type' => 'sometimes',
      'link' => 'sometimes',
      'affiliate_link' => 'sometimes',
      'main_image' => 'sometimes|mimes:png,jpg,jpeg',
      'title' => 'sometimes',
      'seo_description' => 'sometimes',
      'seo_keywords' => 'sometimes',
      'category_id' => 'sometimes',
      'brands_id' => 'sometimes',
    ];
  }

  public function authorize()
  {
    return true;
  }
}