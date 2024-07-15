<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',

            'item_id' => 'required|exists:items,id',
            'user_id' => 'required|exists:users,id',

            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',

            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'zip' => 'nullable|string|max:255',

            'status' => 'nullable|string|in:pending',
            'payment_method' => 'nullable|string|in:midtrans',
            'payment_status' => 'nullable|string|in:pending',

            'payment_url' => 'nullable|string|max:255',

            'total_price' => 'nullable|numeric',
 
        ];
    }
}
