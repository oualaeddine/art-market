<?php

namespace Database\Seeders;

use App\Models\YalidineWilaya;
use Illuminate\Database\Seeder;

class YalidineWilayaArab extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json_wilaya = array(
            0 =>
            array(
                'id' => '1',
                'code' => '1',
                'name' => 'Adrar',
                'ar_name' => 'أدرار',
                'longitude' => '27.9766155',
                'latitude' => '-0.20396',
            ),
            1 =>
            array(
                'id' => '2',
                'code' => '2',
                'name' => 'Chlef',
                'ar_name' => 'الشلف',
                'longitude' => '36.1691245',
                'latitude' => '1.3539002',
            ),
            2 =>
            array(
                'id' => '3',
                'code' => '3',
                'name' => 'Laghouat',
                'ar_name' => 'الأغواط',
                'longitude' => '33.7873735',
                'latitude' => '2.8829115',
            ),
            3 =>
            array(
                'id' => '4',
                'code' => '4',
                'name' => 'Oum El Bouaghi',
                'ar_name' => 'أم البواقي',
                'longitude' => '35.8726014',
                'latitude' => '7.1180248',
            ),
            4 =>
            array(
                'id' => '5',
                'code' => '5',
                'name' => 'Batna',
                'ar_name' => 'باتنة',
                'longitude' => '35.32147',
                'latitude' => '3.1066502',
            ),
            5 =>
            array(
                'id' => '6',
                'code' => '6',
                'name' => 'Béjaïa',
                'ar_name' => 'بجاية',
                'longitude' => '36.7695969',
                'latitude' => '5.0085855',
            ),
            6 =>
            array(
                'id' => '7',
                'code' => '7',
                'name' => 'Biskra',
                'ar_name' => 'بسكرة',
                'longitude' => '34.8515041',
                'latitude' => '5.7246709',
            ),
            7 =>
            array(
                'id' => '8',
                'code' => '8',
                'name' => 'Bechar',
                'ar_name' => 'بشار',
                'longitude' => '31.5977602',
                'latitude' => '-1.8540446',
            ),
            8 =>
            array(
                'id' => '9',
                'code' => '9',
                'name' => 'Blida',
                'ar_name' => 'البليدة',
                'longitude' => '36.4803023',
                'latitude' => '2.8009379',
            ),
            9 =>
            array(
                'id' => '10',
                'code' => '10',
                'name' => 'Bouira',
                'ar_name' => 'البويرة',
                'longitude' => '36.2084234',
                'latitude' => '3.925049',
            ),
            10 =>
            array(
                'id' => '11',
                'code' => '11',
                'name' => 'Tamanrasset',
                'ar_name' => 'تمنراست',
                'longitude' => '22.2746227',
                'latitude' => '5.6754684',
            ),
            11 =>
            array(
                'id' => '12',
                'code' => '12',
                'name' => 'Tbessa',
                'ar_name' => 'تبسة',
                'longitude' => '35.4117259',
                'latitude' => '8.110545',
            ),
            12 =>
            array(
                'id' => '13',
                'code' => '13',
                'name' => 'Tlemcen',
                'ar_name' => 'تلمسان',
                'longitude' => '34.8959541',
                'latitude' => '-1.3150979',
            ),
            13 =>
            array(
                'id' => '14',
                'code' => '14',
                'name' => 'Tiaret',
                'ar_name' => 'تيارت',
                'longitude' => '35.3599899',
                'latitude' => '1.3916159',
            ),
            14 =>
            array(
                'id' => '15',
                'code' => '15',
                'name' => 'Tizi Ouzou',
                'ar_name' => 'تيزي وزو',
                'longitude' => '36.7002068',
                'latitude' => '4.075957',
            ),
            15 =>
            array(
                'id' => '16',
                'code' => '16',
                'name' => 'Alger',
                'ar_name' => 'الجزائر',
                'longitude' => '36.7538259',
                'latitude' => '3.057841',
            ),
            16 =>
            array(
                'id' => '17',
                'code' => '17',
                'name' => 'Djelfa',
                'ar_name' => 'الجلفة',
                'longitude' => '34.6672467',
                'latitude' => '3.2993118',
            ),
            17 =>
            array(
                'id' => '18',
                'code' => '18',
                'name' => 'Jijel',
                'ar_name' => 'جيجل',
                'longitude' => '36.7962714',
                'latitude' => '5.7504845',
            ),
            18 =>
            array(
                'id' => '19',
                'code' => '19',
                'name' => 'Se9tif',
                'ar_name' => 'سطيف',
                'longitude' => '36.1905173',
                'latitude' => '5.4202134',
            ),
            19 =>
            array(
                'id' => '20',
                'code' => '20',
                'name' => 'Saefda',
                'ar_name' => 'سعيدة',
                'longitude' => '34.841945',
                'latitude' => '0.1483583',
            ),
            20 =>
            array(
                'id' => '21',
                'code' => '21',
                'name' => 'Skikda',
                'ar_name' => 'سكيكدة',
                'longitude' => '36.8777912',
                'latitude' => '6.9357204',
            ),
            21 =>
            array(
                'id' => '22',
                'code' => '22',
                'name' => 'Sidi Bel Abbes',
                'ar_name' => 'سيدي بلعباس',
                'longitude' => '35.206334',
                'latitude' => '-0.6301368',
            ),
            22 =>
            array(
                'id' => '23',
                'code' => '23',
                'name' => 'Annaba',
                'ar_name' => 'عنابة',
                'longitude' => '36.9184345',
                'latitude' => '7.7452755',
            ),
            23 =>
            array(
                'id' => '24',
                'code' => '24',
                'name' => 'Guelma',
                'ar_name' => 'قالمة',
                'longitude' => '36.4569088',
                'latitude' => '7.4334312',
            ),
            24 =>
            array(
                'id' => '25',
                'code' => '25',
                'name' => 'Constantine',
                'ar_name' => 'قسنطينة',
                'longitude' => '36.319475',
                'latitude' => '6.7370571',
            ),
            25 =>
            array(
                'id' => '26',
                'code' => '26',
                'name' => 'Medea',
                'ar_name' => 'المدية',
                'longitude' => '36.2838408',
                'latitude' => '2.7728462',
            ),
            26 =>
            array(
                'id' => '27',
                'code' => '27',
                'name' => 'Mostaganem',
                'ar_name' => 'مستغانم',
                'longitude' => '35.9751841',
                'latitude' => '0.1149273',
            ),
            27 =>
            array(
                'id' => '28',
                'code' => '28',
                'name' => 'M\'Sila',
                'ar_name' => 'المسيلة',
                'longitude' => '35.7211476',
                'latitude' => '4.5187283',
            ),
            28 =>
            array(
                'id' => '29',
                'code' => '29',
                'name' => 'Mascara',
                'ar_name' => 'معسكر',
                'longitude' => '35.382998',
                'latitude' => '0.1542592',
            ),
            29 =>
            array(
                'id' => '30',
                'code' => '30',
                'name' => 'Ouargla',
                'ar_name' => 'ورقلة',
                'longitude' => '32.1961967',
                'latitude' => '4.9634113',
            ),
            30 =>
            array(
                'id' => '31',
                'code' => '31',
                'name' => 'Oran',
                'ar_name' => 'وهران',
                'longitude' => '35.7066928',
                'latitude' => '-0.6405861',
            ),
            31 =>
            array(
                'id' => '32',
                'code' => '32',
                'name' => 'El Bayadh',
                'ar_name' => 'البيض',
                'longitude' => '32.5722756',
                'latitude' => '0.950011',
            ),
            32 =>
            array(
                'id' => '33',
                'code' => '33',
                'name' => 'Illizi',
                'ar_name' => 'إليزي',
                'longitude' => '26.5065999',
                'latitude' => '8.480587',
            ),
            33 =>
            array(
                'id' => '34',
                'code' => '34',
                'name' => 'Bordj Bou Arreridj',
                'ar_name' => 'برج بوعريريج',
                'longitude' => '36.0686488',
                'latitude' => '4.7691823',
            ),
            34 =>
            array(
                'id' => '35',
                'code' => '35',
                'name' => 'Boumerdes',
                'ar_name' => 'بومرداس',
                'longitude' => '36.7564181',
                'latitude' => '3.4917212',
            ),
            35 =>
            array(
                'id' => '36',
                'code' => '36',
                'name' => 'El Tarf',
                'ar_name' => 'الطارف',
                'longitude' => '36.7534258',
                'latitude' => '8.2984543',
            ),
            36 =>
            array(
                'id' => '37',
                'code' => '37',
                'name' => 'Tindouf',
                'ar_name' => 'تندوف',
                'longitude' => '27.2460501',
                'latitude' => '-6.3252899',
            ),
            37 =>
            array(
                'id' => '38',
                'code' => '38',
                'name' => 'Tissemsilt',
                'ar_name' => 'تيسمسيلت',
                'longitude' => '35.6021906',
                'latitude' => '1.802187',
            ),
            38 =>
            array(
                'id' => '39',
                'code' => '39',
                'name' => 'El Oued',
                'ar_name' => 'الوادي',
                'longitude' => '33.3714492',
                'latitude' => '6.8573436',
            ),
            39 =>
            array(
                'id' => '40',
                'code' => '40',
                'name' => 'Khenchela',
                'ar_name' => 'خنشلة',
                'longitude' => '35.4263293',
                'latitude' => '7.1414137',
            ),
            40 =>
            array(
                'id' => '41',
                'code' => '41',
                'name' => 'Souk Ahras',
                'ar_name' => 'سوق أهراس',
                'longitude' => '36.277849',
                'latitude' => '7.9592299',
            ),
            41 =>
            array(
                'id' => '42',
                'code' => '42',
                'name' => 'Tipaza',
                'ar_name' => 'تيبازة',
                'longitude' => '36.5980966',
                'latitude' => '2.4085379',
            ),
            42 =>
            array(
                'id' => '43',
                'code' => '43',
                'name' => 'Mila',
                'ar_name' => 'ميلة',
                'longitude' => '36.4514882',
                'latitude' => '6.2487316',
            ),
            43 =>
            array(
                'id' => '44',
                'code' => '44',
                'name' => 'Ain Defla',
                'ar_name' => 'عين الدفلى',
                'longitude' => '36.1283915',
                'latitude' => '2.1772514',
            ),
            44 =>
            array(
                'id' => '45',
                'code' => '45',
                'name' => 'Naama',
                'ar_name' => 'النعامة',
                'longitude' => '33.1995605',
                'latitude' => '-0.8021968',
            ),
            45 =>
            array(
                'id' => '46',
                'code' => '46',
                'name' => 'Ain Temouchent',
                'ar_name' => 'عين تموشنت',
                'longitude' => '35.404044',
                'latitude' => '-1.0580975',
            ),
            46 =>
            array(
                'id' => '47',
                'code' => '47',
                'name' => 'Ghardaefa',
                'ar_name' => 'غرداية',
                'longitude' => '32.5891743',
                'latitude' => '3.7455655',
            ),
            47 =>
            array(
                'id' => '48',
                'code' => '48',
                'name' => 'Relizane',
                'ar_name' => 'غليزان',
                'longitude' => '35.8050195',
                'latitude' => '0.867381',
            ),
        );

        $yaldine_wilaya = YalidineWilaya::get();

        foreach($yaldine_wilaya as $y){
            $y->name_ar = $json_wilaya[$y->id-1]['ar_name'];
            $y->save();
        }
    }
}
