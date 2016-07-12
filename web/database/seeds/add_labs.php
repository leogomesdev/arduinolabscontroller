<?php

use Illuminate\Database\Seeder;

class add_labs extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('labs')->insert(array(
            array('number' => '1','linux_user'=>'aluno','linux_password'=>'*iff1234','windows_user'=>'aluno','windows_password'=>'*iff1234'),
            array('number' => '2','linux_user'=>'aluno','linux_password'=>'*iff1234','windows_user'=>'aluno','windows_password'=>'*iff1234'),
            array('number' => '3','linux_user'=>'aluno','linux_password'=>'*iff1234','windows_user'=>'aluno','windows_password'=>'*iff1234'),
            array('number' => '4','linux_user'=>'aluno','linux_password'=>'*iff1234','windows_user'=>'aluno','windows_password'=>'*iff1234'),
            array('number' => '5','linux_user'=>'aluno','linux_password'=>'*iff1234','windows_user'=>'aluno','windows_password'=>'*iff1234'),
            array('number' => '6','linux_user'=>'aluno','linux_password'=>'*iff1234','windows_user'=>'aluno','windows_password'=>'*iff1234'),
            array('number' => '7','linux_user'=>'aluno','linux_password'=>'*iff1234','windows_user'=>'aluno','windows_password'=>'*iff1234'),
            array('number' => '8','linux_user'=>'aluno','linux_password'=>'*iff1234','windows_user'=>'aluno','windows_password'=>'*iff1234'),
            array('number' => '9','linux_user'=>'aluno','linux_password'=>'*iff1234','windows_user'=>'aluno','windows_password'=>'*iff1234'),
            array('number' => '10','linux_user'=>'aluno','linux_password'=>'*iff1234','windows_user'=>'aluno','windows_password'=>'*iff1234'),
            array('number' => '11','linux_user'=>'aluno','linux_password'=>'*iff1234','windows_user'=>'aluno','windows_password'=>'*iff1234'),
        ));
    }
}
