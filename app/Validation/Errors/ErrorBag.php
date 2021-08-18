<?php 
namespace App\Validation\Errors;

/**
 * Class ErrorBag
 */
class ErrorBag 
{
    /**
     * Store errors
     *
     * @var array
     */
    protected $errors = [];

    /**
     * Add error
     *
     * @param string $key
     * 
     * @param string $value
     * 
     * @return void
     */
    public function add($key, $value)
    {
        $this->errors[$key][] =  $value;
    }

    /**
     * Get errors
     *
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Check has errors
     *
     * @return boolean
     */
    public function hasError()
    {
        return empty($this->errors);
    }
}