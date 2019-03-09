<?php
use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Admin $admin)
    {
        //
        $faker = \Faker\Factory::create('zh_CN');
        $admin->truncate();
        for ($i=1;$i<=100;$i++){
            $admin->create([
                'username'=>$faker->unique()->userName,
                'password'=>bcrypt('123456'),
                'avatar'=>$faker->unique()->imageUrl(),
                'sex'=>rand(0,1),
                'nickname'=>$faker->unique()->name,
                'phone'=>$faker->unique()->phoneNumber,
                'email'=>$faker->unique()->email,
                'role_id'=>mt_rand(0,6)
            ]);
        }
    }
}
