<?php 
namespace App\Validation\Rules;

/**
 * Class RequiredRule
 */
class RequiredRule extends Rule
{
    /**
     * Check the rule passed or not
     *
     * @param any $field
     * 
     * @param any $value
     * 
     * @return bool
     */
    public function passes($field, $value)
    {
       return !empty($value); 
    }

    /**
     * Set validation message
     *
     * @param any $field
     * 
     * @return string
     */
    public function message($field)
    {
        return $field . " is required";
    }
}