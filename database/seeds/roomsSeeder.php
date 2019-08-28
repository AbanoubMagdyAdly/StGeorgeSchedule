<?php

use App\Models\Room;
use Illuminate\Database\Seeder;

class roomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = array(
            array('id' => '2','name' => 'المدرج','building' => 'EL-Knesa','capacity' => '100','has_air_conditioner' => '1','has_tv' => '1','created_at' => '2019-08-28 18:49:17','updated_at' => '2019-08-28 18:49:17','in_maintenance' => '0'),
            array('id' => '3','name' => 'السطح 1','building' => 'EL-Knesa','capacity' => '20','has_air_conditioner' => '1','has_tv' => '0','created_at' => '2019-08-28 18:49:42','updated_at' => '2019-08-28 18:49:42','in_maintenance' => '0'),
            array('id' => '4','name' => 'السطح 2','building' => 'EL-Knesa','capacity' => '20','has_air_conditioner' => '1','has_tv' => '0','created_at' => '2019-08-28 18:49:57','updated_at' => '2019-08-28 18:49:57','in_maintenance' => '0'),
            array('id' => '5','name' => 'السطح 3','building' => 'EL-Knesa','capacity' => '20','has_air_conditioner' => '0','has_tv' => '0','created_at' => '2019-08-28 18:50:13','updated_at' => '2019-08-28 18:50:13','in_maintenance' => '0'),
            array('id' => '6','name' => 'السطح 4','building' => 'EL-Knesa','capacity' => '20','has_air_conditioner' => '1','has_tv' => '0','created_at' => '2019-08-28 18:50:24','updated_at' => '2019-08-28 18:50:24','in_maintenance' => '0'),
            array('id' => '7','name' => 'السطح 5','building' => 'EL-Knesa','capacity' => '20','has_air_conditioner' => '0','has_tv' => '0','created_at' => '2019-08-28 18:50:36','updated_at' => '2019-08-28 18:50:36','in_maintenance' => '0'),
            array('id' => '8','name' => 'السطح 6','building' => 'EL-Knesa','capacity' => '20','has_air_conditioner' => '1','has_tv' => '0','created_at' => '2019-08-28 18:50:52','updated_at' => '2019-08-28 18:50:52','in_maintenance' => '0'),
            array('id' => '9','name' => 'السطح 7','building' => 'EL-Knesa','capacity' => '20','has_air_conditioner' => '1','has_tv' => '0','created_at' => '2019-08-28 18:51:05','updated_at' => '2019-08-28 18:51:05','in_maintenance' => '0'),
            array('id' => '10','name' => 'الاول الامير','building' => 'EL-Amir','capacity' => '100','has_air_conditioner' => '1','has_tv' => '1','created_at' => '2019-08-28 18:51:44','updated_at' => '2019-08-28 18:51:44','in_maintenance' => '0'),
            array('id' => '11','name' => '1 الرابع الامير','building' => 'EL-Amir','capacity' => '20','has_air_conditioner' => '1','has_tv' => '0','created_at' => '2019-08-28 18:52:10','updated_at' => '2019-08-28 18:52:10','in_maintenance' => '0'),
            array('id' => '12','name' => 'الرابع الامير 2','building' => 'EL-Amir','capacity' => '20','has_air_conditioner' => '1','has_tv' => '0','created_at' => '2019-08-28 18:52:42','updated_at' => '2019-08-28 18:52:42','in_maintenance' => '0'),
            array('id' => '13','name' => 'الرابع الامير 3','building' => 'EL-Amir','capacity' => '20','has_air_conditioner' => '1','has_tv' => '0','created_at' => '2019-08-28 18:52:53','updated_at' => '2019-08-28 18:52:53','in_maintenance' => '0'),
            array('id' => '14','name' => 'الخامس الامير 1','building' => 'EL-Amir','capacity' => '20','has_air_conditioner' => '1','has_tv' => '0','created_at' => '2019-08-28 18:53:13','updated_at' => '2019-08-28 18:53:13','in_maintenance' => '0'),
            array('id' => '15','name' => 'الخامس الامير 2','building' => 'EL-Amir','capacity' => '20','has_air_conditioner' => '1','has_tv' => '0','created_at' => '2019-08-28 18:53:23','updated_at' => '2019-08-28 18:53:23','in_maintenance' => '0'),
            array('id' => '16','name' => 'المكتبة','building' => 'EL-Amir','capacity' => '50','has_air_conditioner' => '1','has_tv' => '0','created_at' => '2019-08-28 18:53:40','updated_at' => '2019-08-28 18:53:40','in_maintenance' => '0'),
            array('id' => '17','name' => 'السابع الامير','building' => 'EL-Amir','capacity' => '75','has_air_conditioner' => '1','has_tv' => '1','created_at' => '2019-08-28 18:53:59','updated_at' => '2019-08-28 18:53:59','in_maintenance' => '0'),
            array('id' => '18','name' => 'الثامن الامير','building' => 'EL-Amir','capacity' => '75','has_air_conditioner' => '1','has_tv' => '1','created_at' => '2019-08-28 18:54:15','updated_at' => '2019-08-28 18:54:15','in_maintenance' => '0'),
            array('id' => '19','name' => 'الاول الروماني','building' => 'EL-Romany','capacity' => '100','has_air_conditioner' => '1','has_tv' => '1','created_at' => '2019-08-28 18:54:44','updated_at' => '2019-08-28 18:54:44','in_maintenance' => '0'),
            array('id' => '20','name' => 'الثالث الروماني','building' => 'EL-Amir','capacity' => '75','has_air_conditioner' => '1','has_tv' => '1','created_at' => '2019-08-28 18:55:07','updated_at' => '2019-08-28 18:55:57','in_maintenance' => '0'),
            array('id' => '21','name' => 'الرابع الروماني 1','building' => 'EL-Romany','capacity' => '20','has_air_conditioner' => '0','has_tv' => '0','created_at' => '2019-08-28 18:55:37','updated_at' => '2019-08-28 18:55:37','in_maintenance' => '0'),
            array('id' => '22','name' => 'الرابع الروماني 2','building' => 'EL-Romany','capacity' => '20','has_air_conditioner' => '0','has_tv' => '0','created_at' => '2019-08-28 18:56:18','updated_at' => '2019-08-28 18:56:18','in_maintenance' => '0'),
            array('id' => '23','name' => 'الرابع الروماني 3','building' => 'EL-Romany','capacity' => '20','has_air_conditioner' => '0','has_tv' => '0','created_at' => '2019-08-28 18:56:31','updated_at' => '2019-08-28 18:56:31','in_maintenance' => '0'),
            array('id' => '24','name' => 'الثاني البطل','building' => 'EL-Batal','capacity' => '100','has_air_conditioner' => '0','has_tv' => '0','created_at' => '2019-08-28 18:56:51','updated_at' => '2019-08-28 18:56:51','in_maintenance' => '0'),
            array('id' => '25','name' => 'الخامس البطل 1','building' => 'EL-Batal','capacity' => '20','has_air_conditioner' => '0','has_tv' => '0','created_at' => '2019-08-28 18:57:24','updated_at' => '2019-08-28 18:57:24','in_maintenance' => '0'),
            array('id' => '26','name' => 'الخامس البطل 2','building' => 'EL-Batal','capacity' => '20','has_air_conditioner' => '0','has_tv' => '0','created_at' => '2019-08-28 18:57:34','updated_at' => '2019-08-28 18:57:34','in_maintenance' => '0'),
            array('id' => '27','name' => 'الخامس البطل 3','building' => 'EL-Batal','capacity' => '20','has_air_conditioner' => '0','has_tv' => '0','created_at' => '2019-08-28 18:57:44','updated_at' => '2019-08-28 18:57:44','in_maintenance' => '0'),
            array('id' => '28','name' => 'الخامس البطل 4','building' => 'EL-Batal','capacity' => '20','has_air_conditioner' => '0','has_tv' => '0','created_at' => '2019-08-28 18:57:56','updated_at' => '2019-08-28 18:57:56','in_maintenance' => '0'),
            array('id' => '29','name' => 'اجيا صوفيا','building' => 'EL-Batal','capacity' => '20','has_air_conditioner' => '1','has_tv' => '1','created_at' => '2019-08-28 18:58:21','updated_at' => '2019-08-28 18:58:21','in_maintenance' => '0')
          );
          
        Room::insert($rooms);
    }
}
