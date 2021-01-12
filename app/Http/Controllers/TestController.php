<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
