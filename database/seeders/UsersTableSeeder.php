<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nombre' => 'seguridad',
            'apellidos' => 'web',
            'dni' => '09637181C',
            'email' => 'seguridadweb' . '@campusviu.es',
            'password' => Hash::make('S3gur1d4d?W3b'),
            'telefono' => '+34789456786',
            'pais' => 'España',
            'iban' => 'ES7921000813610123456789',
            'created_at' => Date::now(),
            'updated_at' => Date::now()

        ]);
    }
}