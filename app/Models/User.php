<?php
/*
 * @Author: your name
 * @Date: 2021-05-23 10:19:54
 * @LastEditTime: 2021-10-18 22:32:39
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /practiceProject/app/Models/User.php
 */

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable, EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function createRoles()
    {
        // 创建第一个角色
        $roleModel               = new Role();
        $roleModel->name         = 'admins'; //角色名称
        $roleModel->display_name = '管理员'; //角色可读名称
        $roleModel->save();
    }
}
