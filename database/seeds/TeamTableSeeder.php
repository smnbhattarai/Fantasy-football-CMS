<?php

use Illuminate\Database\Seeder;
use App\Team;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = array(
            array('id' => '1','country_code' => 'RU','country_name' => 'Russia','country_flag' => 'https://upload.wikimedia.org/wikipedia/en/thumb/f/f3/Flag_of_Russia.svg/35px-Flag_of_Russia.svg.png','created_at' => '2018-05-28 06:00:29','updated_at' => '2018-05-28 06:00:29'),
            array('id' => '2','country_code' => 'BR','country_name' => 'Brazil','country_flag' => 'https://upload.wikimedia.org/wikipedia/en/thumb/0/05/Flag_of_Brazil.svg/33px-Flag_of_Brazil.svg.png','created_at' => '2018-05-28 06:02:27','updated_at' => '2018-05-28 06:02:27'),
            array('id' => '3','country_code' => 'IR','country_name' => 'Iran','country_flag' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/ca/Flag_of_Iran.svg/35px-Flag_of_Iran.svg.png','created_at' => '2018-05-28 06:07:04','updated_at' => '2018-05-28 06:07:04'),
            array('id' => '4','country_code' => 'JP','country_name' => 'Japan','country_flag' => 'https://upload.wikimedia.org/wikipedia/en/thumb/9/9e/Flag_of_Japan.svg/35px-Flag_of_Japan.svg.png','created_at' => '2018-05-28 06:11:01','updated_at' => '2018-05-28 06:11:01'),
            array('id' => '5','country_code' => 'MX','country_name' => 'Mexico','country_flag' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fc/Flag_of_Mexico.svg/35px-Flag_of_Mexico.svg.png','created_at' => '2018-05-28 06:12:54','updated_at' => '2018-05-28 06:12:54'),
            array('id' => '6','country_code' => 'BE','country_name' => 'Belgium','country_flag' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/92/Flag_of_Belgium_%28civil%29.svg/35px-Flag_of_Belgium_%28civil%29.svg.png','created_at' => '2018-05-28 09:32:53','updated_at' => '2018-05-28 09:32:53'),
            array('id' => '7','country_code' => 'KR','country_name' => 'South Korea','country_flag' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/Flag_of_South_Korea.svg/35px-Flag_of_South_Korea.svg.png','created_at' => '2018-05-28 09:34:46','updated_at' => '2018-05-28 09:34:46'),
            array('id' => '8','country_code' => 'SA','country_name' => 'Saudi Arabia','country_flag' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0d/Flag_of_Saudi_Arabia.svg/35px-Flag_of_Saudi_Arabia.svg.png','created_at' => '2018-05-28 09:36:26','updated_at' => '2018-05-28 09:36:26'),
            array('id' => '9','country_code' => 'DE','country_name' => 'Germany','country_flag' => 'https://upload.wikimedia.org/wikipedia/en/thumb/b/ba/Flag_of_Germany.svg/35px-Flag_of_Germany.svg.png','created_at' => '2018-05-28 09:38:57','updated_at' => '2018-05-28 09:38:57'),
            array('id' => '10','country_code' => 'GB','country_name' => 'England','country_flag' => 'https://upload.wikimedia.org/wikipedia/en/thumb/b/be/Flag_of_England.svg/35px-Flag_of_England.svg.png','created_at' => '2018-05-28 09:45:26','updated_at' => '2018-05-28 09:45:26'),
            array('id' => '11','country_code' => 'ES','country_name' => 'Spain','country_flag' => 'https://upload.wikimedia.org/wikipedia/en/thumb/9/9a/Flag_of_Spain.svg/35px-Flag_of_Spain.svg.png','created_at' => '2018-05-28 09:46:23','updated_at' => '2018-05-28 09:46:23'),
            array('id' => '12','country_code' => 'NG','country_name' => 'Nigeria','country_flag' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/79/Flag_of_Nigeria.svg/35px-Flag_of_Nigeria.svg.png','created_at' => '2018-05-28 09:46:47','updated_at' => '2018-05-28 09:46:47'),
            array('id' => '13','country_code' => 'CR','country_name' => 'Costa Rica','country_flag' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f2/Flag_of_Costa_Rica.svg/35px-Flag_of_Costa_Rica.svg.png','created_at' => '2018-05-28 09:47:00','updated_at' => '2018-05-28 09:47:00'),
            array('id' => '14','country_code' => 'PL','country_name' => 'Poland','country_flag' => 'https://upload.wikimedia.org/wikipedia/en/thumb/1/12/Flag_of_Poland.svg/35px-Flag_of_Poland.svg.png','created_at' => '2018-05-28 09:47:08','updated_at' => '2018-05-28 09:47:08'),
            array('id' => '15','country_code' => 'EG','country_name' => 'Egypt','country_flag' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Flag_of_Egypt.svg/35px-Flag_of_Egypt.svg.png','created_at' => '2018-05-28 09:47:16','updated_at' => '2018-05-28 09:47:16'),
            array('id' => '16','country_code' => 'IS','country_name' => 'Iceland','country_flag' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/ce/Flag_of_Iceland.svg/32px-Flag_of_Iceland.svg.png','created_at' => '2018-05-28 09:47:24','updated_at' => '2018-05-28 09:47:24'),
            array('id' => '17','country_code' => 'RS','country_name' => 'Serbia','country_flag' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/ff/Flag_of_Serbia.svg/35px-Flag_of_Serbia.svg.png','created_at' => '2018-05-28 09:47:32','updated_at' => '2018-05-28 09:47:32'),
            array('id' => '18','country_code' => 'PT','country_name' => 'Portugal','country_flag' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Flag_of_Portugal.svg/35px-Flag_of_Portugal.svg.png','created_at' => '2018-05-28 09:47:38','updated_at' => '2018-05-28 09:47:38'),
            array('id' => '19','country_code' => 'FR','country_name' => 'France','country_flag' => 'https://upload.wikimedia.org/wikipedia/en/thumb/c/c3/Flag_of_France.svg/35px-Flag_of_France.svg.png','created_at' => '2018-05-28 09:47:45','updated_at' => '2018-05-28 09:47:45'),
            array('id' => '20','country_code' => 'UY','country_name' => 'Uruguay','country_flag' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Flag_of_Uruguay.svg/35px-Flag_of_Uruguay.svg.png','created_at' => '2018-05-28 09:47:52','updated_at' => '2018-05-28 09:47:52'),
            array('id' => '21','country_code' => 'AR','country_name' => 'Argentina','country_flag' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1a/Flag_of_Argentina.svg/35px-Flag_of_Argentina.svg.png','created_at' => '2018-05-28 09:47:59','updated_at' => '2018-05-28 09:47:59'),
            array('id' => '22','country_code' => 'CO','country_name' => 'Colombia','country_flag' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/Flag_of_Colombia.svg/35px-Flag_of_Colombia.svg.png','created_at' => '2018-05-28 09:48:05','updated_at' => '2018-05-28 09:48:05'),
            array('id' => '23','country_code' => 'PA','country_name' => 'Panama','country_flag' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ab/Flag_of_Panama.svg/35px-Flag_of_Panama.svg.png','created_at' => '2018-05-28 09:48:14','updated_at' => '2018-05-28 09:48:14'),
            array('id' => '24','country_code' => 'SN','country_name' => 'Senegal','country_flag' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fd/Flag_of_Senegal.svg/35px-Flag_of_Senegal.svg.png','created_at' => '2018-05-28 09:48:21','updated_at' => '2018-05-28 09:48:21'),
            array('id' => '25','country_code' => 'MA','country_name' => 'Morocco','country_flag' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Flag_of_Morocco.svg/35px-Flag_of_Morocco.svg.png','created_at' => '2018-05-28 09:48:27','updated_at' => '2018-05-28 09:48:27'),
            array('id' => '26','country_code' => 'TN','country_name' => 'Tunisia','country_flag' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/ce/Flag_of_Tunisia.svg/35px-Flag_of_Tunisia.svg.png','created_at' => '2018-05-28 09:48:36','updated_at' => '2018-05-28 09:48:36'),
            array('id' => '27','country_code' => 'CH','country_name' => 'Switzerland','country_flag' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f3/Flag_of_Switzerland.svg/24px-Flag_of_Switzerland.svg.png','created_at' => '2018-05-28 09:48:44','updated_at' => '2018-05-28 09:48:44'),
            array('id' => '28','country_code' => 'HR','country_name' => 'Croatia','country_flag' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Flag_of_Croatia.svg/35px-Flag_of_Croatia.svg.png','created_at' => '2018-05-28 09:48:50','updated_at' => '2018-05-28 09:48:50'),
            array('id' => '29','country_code' => 'SE','country_name' => 'Sweden','country_flag' => 'https://upload.wikimedia.org/wikipedia/en/thumb/4/4c/Flag_of_Sweden.svg/35px-Flag_of_Sweden.svg.png','created_at' => '2018-05-28 09:48:57','updated_at' => '2018-05-28 09:48:57'),
            array('id' => '30','country_code' => 'DK','country_name' => 'Denmark','country_flag' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9c/Flag_of_Denmark.svg/31px-Flag_of_Denmark.svg.png','created_at' => '2018-05-28 09:49:04','updated_at' => '2018-05-28 09:49:04'),
            array('id' => '31','country_code' => 'AU','country_name' => 'Australia','country_flag' => 'https://upload.wikimedia.org/wikipedia/en/thumb/b/b9/Flag_of_Australia.svg/35px-Flag_of_Australia.svg.png','created_at' => '2018-05-28 09:49:12','updated_at' => '2018-05-28 09:49:12'),
            array('id' => '32','country_code' => 'PE','country_name' => 'Peru','country_flag' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/cf/Flag_of_Peru.svg/35px-Flag_of_Peru.svg.png','created_at' => '2018-05-28 09:49:18','updated_at' => '2018-05-28 09:49:18')
        );


        foreach($teams as $team) {
            Team::create($team);
        }
    }
}
