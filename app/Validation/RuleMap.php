<?php 
namespace App\Validation;

use App\Validation\Rules\BetweenRule;
use App\Validation\Rules\MaxRule;
use App\Validation\Rules\RequiredRule;

class RuleMap
{
    /**
     * Store rules
     *
     * @var array
     */
    protected static $map = [
        'required'  =>  RequiredRule::class,
        'max'       =>  MaxRule::class,
        'between'   =>  BetweenRule::class
    ];

    /**
     * Mapping all rules
     *
     * @param object $rule
     * @param array $options
     * @return object
     */
    public static function resolveRuleMap($rule, $options)
    {
        return new static::$map[$rule](...$options);
    }
}