<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaillesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('tailles')->insert([
            
            'taille' => '41',
            
        ]); 
        DB::table('tailles')->insert([
            
            'taille' => '42',
            
        ]); 

        DB::table('tailles')->insert([
            
            'taille' => '43',
            
        ]); 
        DB::table('tailles')->insert([
            
            'taille' => '44',
            
        ]); 
        DB::table('tailles')->insert([
            
            'taille' => '45',
            
        ]); 
        DB::table('tailles')->insert([
           
            'taille' => '46',
            
        ]); 
        DB::table('tailles')->insert([
           
            'taille' => '47',
           
        ]); 
        DB::table('tailles')->insert([
            
            'taille' => '48',
        ]); 
    }
}
