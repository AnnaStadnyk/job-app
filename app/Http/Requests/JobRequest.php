<?php

namespace App\Http\Requests;

use App\Models\Jobs\Distionaries\Currency;
use App\Models\Jobs\Distionaries\Location;
use App\Models\Jobs\Distionaries\Payment;
use App\Models\Jobs\Distionaries\Type;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class JobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'min:3', 'max:250'],
            'type_id' => [Rule::in(Type::query()->pluck('id')->all())],
            'location_id' => [Rule::in(Location::all()->pluck('id')->all())],
            'salary' => ['decimal:0,4'],
            'currency_id' => [Rule::in(Currency::all()->pluck('id')->all())],
            'payment_id' => [Rule::in(Payment::all()->pluck('id')->all())],
            'description' => ['required', 'min:3', 'max:1000', 'string'],
            'requirements' => ['required', 'min:3', 'max:1000', 'string'],
            'duties' => ['required', 'min:3', 'max:1000', 'string'],
            'tags' => ['required', 'min:3', 'max:1000', 'string']
        ];
    }
}
