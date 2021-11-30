<?php
/**
 * Created by PhpStorm.
 * User: MAHDI
 * Date: 21/11/2021
 * Time: 19:02
 */

namespace App\StrategyFeatures;


use App\Orders;
use Illuminate\Support\Facades\DB;

class OrderFeature implements IFeatures
{

    private $data = [];

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    public function action()
    {

        $order = new Orders();
        $order->food_name = $this->data["food_name"];
        $order->food_id = $this->data["food_id"];
        $order->count = $this->data["count"];
        $order->price = $this->data["price"];
        $saved = $order->save();

        if ($saved) {
            try {
                DB::beginTransaction();
                DB::select(DB::raw("
                UPDATE ingredients
                LEFT JOIN foods
                ON foods.id = ingredients.foods_id
                SET ingredients.stock =  IF(ingredients.stock > 0, ingredients.stock - 1, 0)
              "));
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
            }
        } else {
            return "Not saved! Failed";
        }

    }
}