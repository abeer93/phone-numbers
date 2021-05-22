<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            [
                'name' => 'Walid Hammadi',
                'phone' => '(212) 6007989253'
            ],
            [
                'name' => 'Yosaf Karrouch',
                'phone' => '(212) 698054317'
            ],
            [
                'name' => 'Younes Boutikyad',
                'phone' => '(212) 6546545369'
            ],
            [
                'name' => 'Houda Houda',
                'phone' => '(212) 6617344445'
            ],
            [
                'name' => 'Chouf Malo',
                'phone' => '(212) 691933626'
            ],
            [
                'name' => 'soufiane fritisse',
                'phone' => '(212) 633963130'
            ],
            [
                'name' => 'Nada Sofie',
                'phone' => '(212) 654642448'
            ],
            [
                'name' => 'Edunildo Gomes Alberto',
                'phone' => '(258) 847651504'
            ],
            [
                'name' => 'Walla\'s Singz Junior',
                'phone' => '(258) 846565883'
            ],
            [
                'name' => 'sevilton sylvestre',
                'phone' => '(258) 849181828'
            ],
            [
                'name' => 'Tanvi Sachdeva',
                'phone' => '(258) 84330678235'
            ],
            [
                'name' => 'Florencio Samuel',
                'phone' => '(258) 847602609'
            ],
            [
                'name' => 'Solo Dolo',
                'phone' => '(258) 042423566'
            ],
            [
                'name' => 'Pedro B 173',
                'phone' => '(258) 823747618'
            ],
            [
                'name' => 'Ezequiel Fenias',
                'phone' => '(258) 848826725'
            ],
            [
                'name' => 'JACKSON NELLY',
                'phone' => '(256) 775069443'
            ],
            [
                'name' => 'Kiwanuka Budallah',
                'phone' => '(256) 7503O6263'
            ],
            [
                'name' => 'VINEET SETH',
                'phone' => '(256) 704244430'
            ],
            [
                'name' => 'Jokkene Richard',
                'phone' => '(256) 7734127498'
            ],
            [
                'name' => 'Ogwal David',
                'phone' => '(256) 7771031454'
            ],
            [
                'name' => 'pt shop 0901 Ultimo',
                'phone' => '(256) 3142345678'
            ],
            [
                'name' => 'Daniel Makori',
                'phone' => '(256) 714660221'
            ],
            [
                'name' => 'shop23 sales',
                'phone' => '(251) 9773199405'
            ],
            [
                'name' => 'Filimon Embaye',
                'phone' => '(251) 914701723'
            ],
            [
                'name' => 'ABRAHAM NEGASH',
                'phone' => '(251) 911203317'
            ],
            [
                'name' => 'ZEKARIAS KEBEDE',
                'phone' => '(251) 9119454961'
            ],
            [
                'name' => 'EPHREM KINFE',
                'phone' => '(251) 914148181'
            ],
            [
                'name' => 'Karim Niki',
                'phone' => '(251) 966002259'
            ],
            [
                'name' => 'Frehiwot Teka',
                'phone' => '(251) 988200000'
            ],
            [
                'name' => 'Fanetahune Abaia',
                'phone' => '(251) 924418461'
            ],
            [
                'name' => 'Yonatan Tekelay',
                'phone' => '(251) 911168450'
            ],
            [
                'name' => 'EMILE CHRISTIAN KOUKOU DIKANDA HONORE',
                'phone' => '(237) 697151594'
            ],
            [
                'name' => 'MICHAEL MICHAEL',
                'phone' => '(237) 677046616'
            ],
            [
                'name' => 'ARREYMANYOR ROLAND TABOT',
                'phone' => '(237) 6A0311634'
            ],
            [
                'name' => 'LOUIS PARFAIT OMBES NTSO',
                'phone' => '(237) 673122155'
            ],
            [
                'name' => 'JOSEPH FELICIEN NOMO',
                'phone' => '(237) 695539786'
            ],
            [
                'name' => 'SUGAR STARRK BARRAGAN',
                'phone' => '(237) 6780009592'
            ],
            [
                'name' => 'WILLIAM KEMFANG',
                'phone' => '(237) 6622284920'
            ],
            [
                'name' => 'THOMAS WILFRIED LOMO LOMO',
                'phone' => '(237) 696443597'
            ],
            [
                'name' => 'Dominique mekontchou',
                'phone' => '(237) 691816558'
            ],
            [
                'name' => 'Nelson Nelson',
                'phone' => '(237) 699209115'
            ]
        ]);
    }
}
