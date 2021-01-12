<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        // $productIds = [5541653086263 => 4619270553655, 5541653184567 => 4634901479479, 5541653217335 => 4619274485815];
        // $outproudct = [594068 => 4619270553655, 594104 => 4619274485815, 655163 => 4634901479479];
        // var_dump(array_intersect($productIds, $outproudct));
        // die;
        // date_default_timezone_set('America/New_York');
        // echo date('Y-m-d H:i:s', 1604203200);die;

        // echo date('Y-m-d H:i:s', strtotime("-1 day", strtotime('2020-11-2'))) .'-----------'. date('Y-m-d H:i:s', strtotime('2020-11-2')-1);
        // echo "<br />";
        // echo strtotime(date('Y-m-d H:i:s', strtotime("-1 day", strtotime('2020-11-2')))) .'-----------'. strtotime(date('Y-m-d H:i:s', strtotime('2020-11-2')-1));
        // echo "<br />";
        // echo  strtotime(date('Y-m-d H:i:s', strtotime('2020-11-2')-1)) - strtotime(date('Y-m-d H:i:s', strtotime("-1 day", strtotime('2020-11-2'))));die;



        echo date('Y-m-d H:i:s', strtotime("-1 day", strtotime('2021-1-5'))) .'-----------'. date('Y-m-d H:i:s',strtotime('2021-1-5')-1);
        echo "<br />";
        echo strtotime(date('Y-m-d H:i:s', strtotime("-1 day", strtotime('2021-1-5')))) .'-----------'. strtotime(date('Y-m-d H:i:s', strtotime('2021-1-5')-1));
        echo "<br />";
        echo  strtotime(date('Y-m-d H:i:s', strtotime('2021-1-5')-1)) - strtotime(date('Y-m-d H:i:s', strtotime("-1 day", strtotime('2021-1-5'))));die;


        // $ids = 55;
        // $goodsIds = [1,2,3];

        // foreach($goodsIds as $ids) {
        //     echo $ids;
        // }
        // var_dump($ids);die;
        return view('index.index');
    }

    public function login()
    {
        return json_encode(['code' => 200, 'data' => [5,6,7,8]]);

    }
}
