<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ContactRequest
 * @package App\Http\Requests\Admin
 */
class BrandRequest extends FormRequest {
  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'name' => 'required|max:255',
      'image' => 'sometimes|mimes:png,jpg,jpeg'
    ];
  }

  public function authorize()
  {
    return true;
  }
}