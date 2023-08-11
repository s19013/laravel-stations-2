<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MoreThanSomeMinutes implements Rule
{

    private $minutes;
    /** 比較対象 */
    private $comparison;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($minutes,$comparison)
    {
        $this->minutes = $minutes;
        $this->comparison = strtotime($comparison);
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $value = strtotime($value);
        $calculated = abs($value - $this->comparison);

        // 比較対象と指定時間より差があるか
        return ($calculated / 60) > $this->minutes;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "{$this->minutes}分以上の間を開けてください";
    }
}
