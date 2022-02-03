<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CreateLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = json_decode(file_get_contents(base_path('config/Locations/db.json')),true);
        $arrayProvince = $data['province'];
        $arrayDistrict = $data['district'];
        $arrayCommune = $data['commune'];
        $id = (string)\Str::uuid();
        $dataIdProvince = [];
        $dataProvince = [];
        $dataDistrict = [];
        $dataIdDistrict = [];
        $dataCommune = [];
        foreach ($arrayProvince as $province) {
            $dataProvince[] = [
                'id' => $id,
                'name' => $province['name'],
                'type' => 1,
                'code' => $province['idProvince'],
            ];
            $dataIdProvince[$province['idProvince']] = $id;
            $id = (string)\Str::uuid();
        }
        \DB::table('locations')->insert($dataProvince);
        foreach ($arrayDistrict as $district) {
            $parentId = $dataIdProvince[$district['idProvince']];
            $dataDistrict[] = [
                'id' => $id,
                'name' => $district['name'],
                'type' => 2,
                'code' => $district['idDistrict'],
                'parent_id' => $parentId,
            ];
            $dataIdDistrict[$district['idDistrict']] = $id;
            $id = (string)\Str::uuid();
        }
        \DB::table('locations')->insert($dataDistrict);
        foreach ($arrayCommune as $commune) {
            $parentId = $dataIdDistrict[$commune['idDistrict']];
            $dataCommune[] = [
                'id' => $id,
                'name' => $commune['name'],
                'type' => 3,
                'code' => $commune['idCommune'],
                'parent_id' => $parentId,
            ];
            $id = (string)\Str::uuid();
        }
        foreach (array_chunk($dataCommune, 3000) as $item){
            \DB::table('locations')->insert($item);
        }
    }
}
