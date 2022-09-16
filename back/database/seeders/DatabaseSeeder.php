<?php
namespace Database\Seeders;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create(['first_name' => 'Sim', "last_name" => 'Hul' , 'email' => 'sim.hul@passerellesnueriques.org',  'password' => bcrypt('12345'),'gender' => 'Male', 'profile' => 'https://drjollydiagnostics.com/wp-content/uploads/2017/11/profile-placeholder.png', 'role' => '1']);
    }
}
