<?php 
namespace App\Validation\Rules;

/**
 * Class Rule
 */
abstract class Rule 
{
    /**
     * Check the validation rule passed or not
     *
     * @param string $field
     * 
     * @param string $value
     * 
     * @return bool
     */
    abstract public function passes($field, $value);

    /**
     * Set message for validation
     *
     * @param string $field
     * 
     * @return string
     */
    abstract public function message($field);
}