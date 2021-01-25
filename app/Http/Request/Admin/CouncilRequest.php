<?php
/**
 *  app/Http/Request/Admin/CouncilRequest.php
 *
 * User: 
 * Date-Time: 25.01.21
 * Time: 12:39
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Http\Request\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CouncilRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Auth()->user()->can('isAdmin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'biography' => 'required|string',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'slug' => ['required','alpha_dash', Rule::unique('councils', 'slug')->ignore($this->council)],
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096|nullable'
        ];
    }
}
