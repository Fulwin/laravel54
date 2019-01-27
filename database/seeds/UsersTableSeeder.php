<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // times 接受一个参数用于指定要创建的模型数量，make 方法调用后将为模型创建一个 集合。
        $users = factory(User::class)->times(50)->make();

        // makeVisible 方法临时显示 User 模型里指定的隐藏属性 $hidden
        User::insert($users->makeVisible(['password', 'remember_token'])->toArray());

        $user = User::first();
        $user->account = 'Fulwin';
        $user->name = 'Fulwin';
        $user->password = bcrypt('secret');
        $user->email = 'developer.fulwin@outlook.com';
        $user->gender = 1;
        $user->department_id = null;
        $user->level_id = null;
        $user->report_id = 0;
        $user->is_admin = true;
        $user->activated = true;
        $user->save();
    }
}
