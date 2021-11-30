<?php
/**
 * Created by PhpStorm.
 * User: MAHDI
 * Date: 21/11/2021
 * Time: 17:05
 */

namespace App\StrategyFeatures;


use App\Repository\FoodRepository;


class MenuFeature implements IFeatures
{

    /**
     * This method implemented of interface IFeatures
     * For do action and refer to repository food class
     *
     * @return mixed
     */
    public function action()
    {
        $foodRepository = new FoodRepository();
        return $foodRepository->search();
    }
}