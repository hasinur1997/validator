<?php 
namespace App\Validation\Rules;

/**
 * Class RequiredRule
 */
class BetweenRule extends Rule
{
    /**
     * Store minimum character
     *
     * @var integer
     */
    protected $lower;

    /**
     * Store maximum character
     *
     * @var integer
     */
    protected $upper;

    public function __construct($lower, $upper)
    {
        $this->lower = $lower;
        $this->upper = $upper;
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
        if (strlen($value) < $this->lower) {
            return false;
        }

        if (strlen($value) > $this->upper) {
            return false;
        }

        return true;
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
        return $field . " must be a gratter than of {$this->lower} and less than of {$this->upper} characters";
    }
}