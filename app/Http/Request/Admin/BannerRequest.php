<?php
/**
 *  app/Http/Request/Admin/ProductRequest.php
 *
 * User:
 * Date-Time: 17.12.20
 * Time: 15:24
 * @author Giorgi Bakhbaia <gbaxbaia@gmail.com>
 */

namespace App\Http\Request\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth()->user()->can('isAdmin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'header' => ['required', 'max:255'],
            'header_1' => ['required', 'max:255'],
            'header_2' => ['required', 'max:255'],
            'header_3' => ['required', 'max:255'],
            'text' => ['max:255'],
            'text_1' => ['max:255'],
            'text_2' => ['max:255'],
            'text_3' => ['max:255'],
//            'image' => ['image', Rule::requiredIf(function () {
//                $image = Image::where('imageable_id', $this->news)->first();
//                return $image ? false : true;
//            })],
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ];
    }
}
