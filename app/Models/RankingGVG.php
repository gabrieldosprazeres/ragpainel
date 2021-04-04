<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RankingGVG extends Model
{

    protected $table = 'ranking_woe';

    protected $primaryKey = 'guild_id';

    public $timestamps = false;

}
