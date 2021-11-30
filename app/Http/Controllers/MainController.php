<?php

namespace App\Http\Controllers;

use App\StrategyFeatures\ContextStrategy;
use App\StrategyFeatures\MenuFeature;
use App\StrategyFeatures\OrderFeature;
use App\Utils\ValidateRequest;
use Illuminate\Http\Request;

class MainController extends Controller
{

    /**
     * Endpoint for search foods menu
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {

        $foodsMenu = new ContextStrategy(new MenuFeature());

        return response()->json($foodsMenu->action());
    }


    /**
     * create order from user
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function orderFood(Request $request)
    {

        $checkOrderData = ValidateRequest::checkOrder($request);
        $foodsMenu = new ContextStrategy(new OrderFeature($checkOrderData));
        return response()->json($foodsMenu->action());
    }
}
