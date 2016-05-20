<?php

use App\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = new Type();
        $type->name = "Web";
        $type->code = "web";
        $type->save();

        $type = new Type();
        $type->name = "Plataforma Online";
        $type->code = "platform";
        $type->save();


        $type = new Type();
        $type->name = "Integración MercadoPago";
        $type->code = "mp";
        $type->save();

    }
}
