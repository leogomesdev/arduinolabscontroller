<?php

use Illuminate\Database\Seeder;

class add_reles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    // to run: php artisan db:seed --class add_reles
    public function run()
    {
        DB::table('reles')->insert(array(
            array('name' => 'Rele 1','pin'=>'2', 'lab_id'=> '12'),
            array('name' => 'Rele 2','pin'=>'3', 'lab_id'=> '12'),
            array('name' => 'Rele 3','pin'=>'3', 'lab_id'=> '12'),
            array('name' => 'Rele 4','pin'=>'5', 'lab_id'=> '12')
        ));

    }
}
