<?php 
namespace App\Validation;

use App\Validation\Errors\ErrorBag;
use App\Validation\Rules\Rule;

/**
 * Class Validator
 */
class Validator 
{
    /**
     * Store validation data
     *
     * @var array
     */
    protected $data = [];

    /**
     * Store validation rules
     *
     * @var array
     */
    protected $rules = [];

    /**
     * Store aliases;
     *
     * @var array
     */
    protected $aliases = [];

    /**
     * Store errors
     *
     * @var object
     */
    protected $errors;

    /**
     * Initialize
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
        $this->errors = new ErrorBag;
    }

    /**
     * Set validation rules
     *
     * @param array $rules
     * 
     * @return void
     */
    public function setRules(array $rules)
    {
        $this->rules = $rules;
    }

    /**
     * Set validation field alis
     *
     * @param array $aliases
     * 
     * @return void
     */
    public function setAliases(array $aliases)
    {
        $this->aliases = $aliases;
    }
    
    /**
     * Validate the rules
     *
     * @return void
     */
    public function validate()
    {
        foreach($this->rules as $field => $rules) {
            foreach($this->resolveRules($rules) as $rule) {
                $this->validateRule($field, $rule);
            }
        }

        return $this->errors->hasError();
    }

    /**
     * Resolve rules
     *
     * @param array $rules
     * 
     * @return array
     */
    protected function resolveRules(array $rules)
    {
        return array_map(function($rule){
            if (is_string($rule)) {
                return $this->getRuleFromString($rule);
            }
            return $rule;
        }, $rules);
    }

    /**
     * Get rule
     *
     * @param string $rule
     * 
     * @return string
     */
    protected function getRuleFromString($rule)
    {
        $exploaded = explode(':', $rule);
        $rule = $exploaded[0];
        $options = explode(',', end($exploaded));

        return RuleMap::resolveRuleMap($rule, $options);;
    }

    /**
     * Validate a single rule
     *
     * @param void $field
     * @param Rule $rule
     * @return bool
     */
    protected function validateRule($field, Rule $rule)
    {
        if (!$rule->passes($field, $this->getFieldValue($field))) {
           $this->errors->add($field, $rule->message($this->getFieldAlias($field)));
        }
    }

    /**
     * Get field value
     *
     * @param any $field
     * 
     * @return void
     */
    protected function getFieldValue($field)
    {
        return $this->data[$field] ?? null;
    }

    /**
     * Get field alias
     *
     * @param string $field
     * 
     * @return string
     */
    protected function getFieldAlias($field)
    {
        return $this->aliases[$field] ?? $field;
    }

    /**
     * Get errors
     *
     * @return array
     */
    public function getErrors()
    {
        return $this->errors->getErrors();
    }
}