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
use Illuminate\Validation\Rule;

class EventRequest extends FormRequest
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
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:512'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
            'location'=>['required','max:255'],
//            'image' => ['image', Rule::requiredIf(function () {
//                $image = Image::where('imageable_id', $this->news)->first();
//                return $image ? false : true;
//            })],
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ];
    }
}
