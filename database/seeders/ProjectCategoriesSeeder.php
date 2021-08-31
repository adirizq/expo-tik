<?php

namespace Database\Seeders;

use App\Models\ProjectCategories;
use Illuminate\Database\Seeder;

class ProjectCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectCategories::truncate(); 
        foreach($this->getData() as $field){
            $data[] = [
                'name' => $field['name'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
        }
        ProjectCategories::insert($data);
    }
    
    private function getData(){
        return [
            [ "name" => "Bisnis TIK" ],
            [ "name" => "Animasi" ],
            [ "name" => "Cipta Inovasi" ],
            [ "name" => "IoT" ],
        ]; 
    }
}
