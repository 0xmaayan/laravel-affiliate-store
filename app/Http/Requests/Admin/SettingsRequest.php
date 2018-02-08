<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ContactRequest
 * @package App\Http\Requests\Admin
 */
class SettingsRequest extends FormRequest {
  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'logo' => 'mimes:png,jpg,jpeg|sometimes',
      'title' => 'max:255|sometimes',
      'seo_description' => 'sometimes',
      'seo_keywords' => 'sometimes',
      'email' => 'email|sometimes',
      'instagram' => 'max:255|sometimes',
      'pinterest' => 'max:255|sometimes',
    ];
  }

  public function authorize()
  {
    return true;
  }
}