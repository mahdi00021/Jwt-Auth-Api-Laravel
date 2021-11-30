<?php
/**
 * Created by PhpStorm.
 * User: MAHDI
 * Date: 29/10/2021
 * Time: 19:28
 */

namespace App\StrategyFeatures;


/**
 * This class get classes Strategy and refer to action method
 * And must using of Decency Injection
 *
 * Class ContextStrategy
 * @package App\StrategyFeatures
 */
class ContextStrategy
{

    private $strategy;

    public function __construct(IFeatures $strategy)
    {
        $this->strategy = $strategy;
    }

    public function action()
    {
        return $this->strategy->action();
    }

}