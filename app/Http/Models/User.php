<?php
/*
 * @Author: your name
 * @Date: 2021-05-22 04:30:24
 * @LastEditTime: 2022-01-10 19:06:39
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /practiceProject/app/Http/Models/User.php
 */

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey='id';
    public $timestamp=false;
    protected $fillable = ['username', 'email', 'salary','name','password', 'permission', 'created_at'];
}

// class User extends Authenticatable
// {
//     use EntrustUserTrait;
//     use Notifiable;
// }
