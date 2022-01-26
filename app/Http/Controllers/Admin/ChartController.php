<?php
/*
 * @Author: your name
 * @Date: 2022-01-26 00:19:00
 * @LastEditTime: 2022-01-26 19:40:12
 * @LastEditors: Please set LastEditors
 * @Description: 打开koroFileHeader查看配置 进行设置: https://github.com/OBKoro1/koro1FileHeader/wiki/%E9%85%8D%E7%BD%AE
 * @FilePath: /practiceProject/app/Http/Controllers/Admin/ChartController.php
 */

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
        $result = DB::select(DB::raw("select salary as total, created_at from users GROUP BY created_at"));
        $data = "";
        // $labels = [];
        foreach ($result as $val) {
            $data.="['".$val->created_at."', '".$val->total."'], ";
            // $labels = $val->created_at;
            // dump($data);
            // dd($data);
           
            // dump($labels);
        }
        // print_r($data);
        // print_r($labels);

        // $data = User::selectRaw('salary as totoalSalary, created_at')->groupBy('created_at')->get();
        return view('home.index', compact('data'));
    }
}
