<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class RedisController extends Controller
{
    public function index()
    {
        Redis::set('user:1:first_name', 'Santhiveerapandi');
        Redis::set('user:2:first_name', 'Natarajan');
        Redis::set('user:3:first_name', 'Meenalakshmi');
        Redis::set('user:4:first_name', 'Muthulakshmi');
        Redis::set('user:5:first_name', 'Kamaraj');
        Redis::set('user:6:first_name', 'Rajbhadur');
        Redis::set('user:7:first_name', 'Chitralakshmi');
        Redis::set('user:8:first_name', 'Mithresh');
        Redis::set('user:9:first_name', 'Gomathi');
        Redis::set('user:10:first_name', 'Parvathi');
        Redis::set('user:11:first_name', 'Keerthan');

        for($i=1; $i<=11; $i++) {
            echo Redis::get('user:'.$i.':first_name').'<br/>';
        }
    }
}
