<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $table = 'item_db';

    protected $primaryKey = 'id';

    public $timestamps = false;

}
