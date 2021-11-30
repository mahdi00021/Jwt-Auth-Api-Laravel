<?php

namespace App\Repository;

use Illuminate\Support\Facades\Cache;


class FoodRepository implements FoodRepositoryInterface
{

    /**
     * Repository Pattern method search foods
     *
     *
     * We using of Cache::remember because this method will cache mysql query for 10 min
     * And if item wasn't in redis then cache::remember first add to redis
     * And after cached item and show to user
     *
     * @return mixed
     */
    public function search()
    {

        $list = Cache::remember('foods', 600, function () {

            return DB::select(
                DB::raw("
                 SELECT foods.id,foods.name FROM
                 foods LEFT JOIN
                 ingredients ON
                 foods.id = ingredients.foods_id WHERE
                 ingredients.stock > 0 AND
                 ingredients.expiry_date > NOW() ORDER BY DATE(ingredients.best_before) DESC
                 , ingredients.best_before ASC
                  ")
            );

        });

        return $list;
    }

}