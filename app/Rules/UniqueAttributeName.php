<?php

namespace App\Rules;

use App\Models\AttributeTranslation;
use Illuminate\Contracts\Validation\Rule;

class UniqueAttributeName implements Rule
{

    /**
     * Create a new rule instance.
     *
     * @return void
     */

    private $attributeId;

    public function __construct($attributeId)
    {
        $this->attributeId = $attributeId;
    }

    /**
     * Determine if the validation rule passes.
     * get attribute if exists & check it
     * in case of create & update
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if($this->attributeId)
            $attribute=AttributeTranslation::where('name',$value)->where('attribute_id','!=',$this->attributeId)->first();
        else
            $attribute=AttributeTranslation::where('name',$value)->first();

        if($attribute)
            return false;
        else
            return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('admin/dashboard.attr_validation_unique');
    }
}
