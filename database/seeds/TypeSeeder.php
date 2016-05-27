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
        $type->name = "Desarrollo Web";
        $type->code = "web";
        $type->save();

        $type = new Type();
        $type->name = "Plataforma";
        $type->code = "platform";
        $type->save();


        $type = new Type();
        $type->name = "MercadoPago";
        $type->code = "mp";
        $type->save();

    }
}
