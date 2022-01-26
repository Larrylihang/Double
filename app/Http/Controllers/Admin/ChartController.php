<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\User;
use DB;

class ChartController extends Controller
{
    //
    public function pieChart()
    {
        // $query = DB::select(DB::raw("select salary as total, created_at from users"));
        // $result = mysqli_query($query);
        // // $result=mysqli_query($query);
        // while ($row = mysqli_fetch_array($result)) {
        //     $labels = "'" . $row['created_at'] ."',";
        //     $data = "'" . $row['salary'] ."',";
        // $labe  .= array("$result=>created_at" . ",");
        // }
        $result = DB::select(DB::raw("select salary as total, created_at from users "));
        $data = [];
        $labels = [];
        foreach ($result as $val) {
            $data = "$val->total";
            $labels = $val->created_at;
            // dump($data);
            // dump($labels);
        }

        // $data = User::selectRaw('salary as totoalSalary, created_at')->groupBy('created_at')->get();
        return view('home.index', ['data'=>$data, 'labels'=>$labels]);
    }
}
