<?php

use Illuminate\Database\Seeder;
use App\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = ['Douala',
            'Yaoundé',
            'Bafoussam',
            'Kribi',
            'Bamenda',
            'Buéa',
            'Garoua',
            'Maroua',
            'Ngaoundéré',
            'Kumba',
            'Edéa',
            'Limbé',
            'Nkongsamba',
            'Foumban',
            'Bertoua',
            'Ebolowa',
            'Mbalmayo',
            'Mbouda',
            'Loum'
        ];
        foreach ($cities as $c) {
            try{
                  $city = new City();
                $city->name = $c;
                $city->slug = str_slug($c);
                $geo = $this->getLatLng($c);
                // $city->lat = 0;
                // $city->lng = 0;
                $city->lat = $geo['lat'];
                $city->lng = $geo['lng'];
                $city->save();
            }catch(\Exception $exception){
                
            }
          
        }
    }

    public function getLatLng($city){
        $ch = curl_init();  
 
        curl_setopt($ch,CURLOPT_URL,"https://geocode.xyz/$city?json=1");
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    //  curl_setopt($ch,CURLOPT_HEADER, false); 
     
        $output=curl_exec($ch);
 
        curl_close($ch);
        sleep(1);
        $data = json_decode($output);
        return ['lat'=>$data->latt,'lng'=>$data->longt];
    }
}

