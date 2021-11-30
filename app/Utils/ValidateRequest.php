<?php
/**
 * Created by PhpStorm.
 * User: MAHDI
 * Date: 21/11/2021
 * Time: 20:40
 */

namespace App\Utils;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ValidateRequest
{

    public static function checkOrder(Request $request)
    {
        $data = [];
        $validator = Validator::make($request->all(), [
            'food_name' => 'required',
            'food_id' => 'required|max:250',
            'count' => 'required|max:250',
            'price' => 'required|max:250',

        ]);

        if ($validator->fails()) {

            return "Please Enter Fields";

        } else {

            $data["food_name"] = $request->input('food_name');
            $data["food_id"] = $request->input('food_id');
            $data["count"] = $request->input('count');
            $data["price"] = $request->input('price');


        }

        return $data;
    }

}