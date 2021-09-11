<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DeterminEndDate implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $special_price_start;
    public function __construct($special_price_start)
    {
        $this->special_price_start=$special_price_start;
    }

    /**
     * Determine if the validation rule passes.
     * check end date to determine in validation
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if($value != null && $value <= $this->special_price_start){
            return false;
        }else{
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('admin/dashboard.pro_end_date');
    }
}
