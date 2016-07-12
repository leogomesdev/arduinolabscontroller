<?php

use Illuminate\Database\Seeder;

class add_computers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('computers')->insert(array(
            array('name' => 'Computador 1','ip'=>'192.168.0.102','mac'=>'00:1E:7C:FC:2A:43', 'lab_id'=> '11'),
            array('name' => 'Computador 2','ip'=>'192.168.0.93','mac'=>'00:1E:7C:FC:2A:22', 'lab_id'=> '11'),
            array('name' => 'Computador 3','ip'=>'192.168.0.65','mac'=>'00:1E:7C:FC:2A:44', 'lab_id'=> '11'),
            array('name' => 'Computador 4','ip'=>'192.168.0.67','mac'=>'00:1E:7C:FC:2A:05', 'lab_id'=> '11'),
            array('name' => 'Computador 6','ip'=>'192.168.0.97','mac'=>'00:1E:7C:FC:2A:13', 'lab_id'=> '11'),
        ));
    }
}
