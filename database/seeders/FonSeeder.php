<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fons')->insert([
            'code' => 'IPB',
            'name' => 'Birinci Değişken Fon',
            'description' => 'Fon yatırım stratejisi çerçevesinde sabit bir varlık dağılımı hedefi olmayıp değişken piyasa koşullarına göre esnek olarak yönetilmesi esasına dayanır. Fon yönetiminde yatırım yapılacak sermaye piyasası araçlarının seçiminde, getiri potansiyeli yüksek, likit varlıklar tercih edilir. Fon, olumsuz piyasa şartlarının hakim olduğu dönemlerde yatırımcıyı piyasa kayıplarından korumak amaçlı, fon portföyünde bulunan hisse senedi ağırlığını vadeli işlem sözleşmelerinde alacağı ters pozisyonlarla -%30 a (eksi yüzde otuz) çekebilir. Fon, iyimser piyasa koşullarının hakim olduğu dönemlerde portföyündeki yatırım amaçlı hisse senedi ağırlığını vadeli işlemler sözleşmelerini kullanarak +%60 a (artı yüzde altmış) çekebilir',
            'author' => 'İSTANBUL PORTFÖY YÖNETİMİ A.Ş.',
        ]);

        DB::table('fons')->insert([
            'code' => 'IIH',
            'name' => 'Üçüncü Hisse Senedi Fonu (Hisse Senedi Yoğun Fon)',
            'description' => 'Fon hisse senedi şemsiye fona bağlı olup, Fon toplam değerinin en az %80 i devamlı olarak yurtiçi ihraçcı paylarından oluşur. Yatırım yapılacak sermaye piyasası araçlarının seçiminde, risk/getiri değerlendirmeleri sonucunda belirlenenler ve nakde dönüşümü kolay olanlar tercih edilir. Fon portföy sınırlamaları itibariyle Tebliğ in 6. maddesi çerçevesinde Hisse Senedi Şemsiye Fon a bağlı Hisse Senedi Yoğun Fon niteliğinde olup; Fon portföy değerinin en az %80 i devamlı olarak menkul kıymet yatırım ortaklıkları payları hariç olmak üzere BİAŞ a işlem gören ihraççı paylarından oluşur. Fon portföyünde yer alan ihraççı paylarına ve pay endekslerine dayalı olarak yapılan vadeli işlem sözleşmelerinin nakit teminatları, ihraççı paylarına ve pay endekslerine dayalı opsiyon sözleşmelerinin primleri ile borsada işlem gören ihraççı paylarına ve pay endekslerine dayalı aracı kuruluş varantları %80 lik oranın hesaplanmasına dahil edilir.',
            'author' => 'İSTANBUL PORTFÖY YÖNETİMİ A.Ş.',
        ]);
    }
}
