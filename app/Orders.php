<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{

    protected $table = "Orders";
    protected $fillable = ["food_name", "food_id", "created_at", "count", "price"];

}
