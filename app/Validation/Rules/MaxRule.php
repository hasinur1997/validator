<?php 
namespace App\Validation\Rules;

/**
 * Class RequiredRule
 */
class MaxRule extends Rule
{
    /**
     * Store max character
     *
     * @var [type]
     */
    protected $max;

    public function __construct($max)
    {
        $this->max = $max;
    }

    /**
     * Check the rule passed or not
     *
     * @param any $field
     * 
     * @param string $value
     * 
     * @return bool
     */
    public function passes($field, $value)
    {
       return strlen($value) < $this->max; 
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
        return $field . " must be a gratter than of {$this->max} characters";
    }
}