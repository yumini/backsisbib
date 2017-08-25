<?php

use Illuminate\Database\Seeder;
use App\Country;
class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create([ 'name' => 'ALEMANIA' ]);
        Country::create([ 'name' => 'ANDORRA' ]);
        Country::create([ 'name' => 'ARGENTINA' ]);
        Country::create([ 'name' => 'AUSTRIA' ]);
        Country::create([ 'name' => 'BELGICA' ]);
        Country::create([ 'name' => 'BOLIVIA' ]);
        Country::create([ 'name' => 'BRASIL' ]);
        Country::create([ 'name' => 'CHILE' ]);
        Country::create([ 'name' => 'CHINA' ]);
        Country::create([ 'name' => 'COLOMBIA' ]);
        Country::create([ 'name' => 'COREA' ]);
        Country::create([ 'name' => 'COSTA RICA' ]);
        Country::create([ 'name' => 'CUBA' ]);
        Country::create([ 'name' => 'DINAMARCA' ]);
        Country::create([ 'name' => 'ECUADOR' ]);
        Country::create([ 'name' => 'EL SALVADOR' ]);
        Country::create([ 'name' => 'ESCOCIA' ]);
        Country::create([ 'name' => 'ESPAÑA' ]);
        Country::create([ 'name' => 'ESTADOS UNIDOS' ]);
        Country::create([ 'name' => 'FRANCIA' ]);
        Country::create([ 'name' => 'GUATEMALA' ]);
        Country::create([ 'name' => 'HOLANDA-PAISES BAJO' ]);
        Country::create([ 'name' => 'HONDURAS' ]);
        Country::create([ 'name' => 'HUNGRIA' ]);
        Country::create([ 'name' => 'INGLATERRA' ]);
        Country::create([ 'name' => 'IRAN' ]);
        Country::create([ 'name' => 'ISRAEL' ]);
        Country::create([ 'name' => 'ITALIA' ]);
        Country::create([ 'name' => 'MEXICO' ]);
        Country::create([ 'name' => 'NICARAGUA' ]);
        Country::create([ 'name' => 'NUEVA ZELANDA' ]);
        Country::create([ 'name' => 'PANAMA' ]);
        Country::create([ 'name' => 'PERÚ' ]);
        Country::create([ 'name' => 'RUSIA' ]);
        Country::create([ 'name' => 'SAN SALVADOR' ]);
        Country::create([ 'name' => 'SUIZA' ]);
        Country::create([ 'name' => 'UKRANIA' ]);
        Country::create([ 'name' => 'VENEZUELA' ]);
    }
}
