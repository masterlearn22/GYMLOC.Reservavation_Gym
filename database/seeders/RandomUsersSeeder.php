<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RandomUsersSeeder extends Seeder
{
    public function run()
    {
        // Daftar nama lengkap
        $fullNames = [
            'Evika Pitaloka',
            'Khaisa Zumma Salsabhila',
            'Raditya Rahmatullah M.P',
            'Akbar Zahron Jiwa Yanu',
            'Noga Salsabilla Alfalfa',
            'Nindhary Endriya',
            'Reynaldi Susilo Waskito',
            'Arya Maulana',
            'Andino Ferdiansah',
            'Fikri Ardiansyah',
            'Elia Sari',
            'Vanesha Amanda Yatinde',
            'Aisha Laily Purwanto',
            'Defrian Bagus Dewanta Putra',
            'Risfiana Nur Farida',
            'Kenzie Maulana Hugo Aurich',
            'Diandra Kautsar Meila Dhofani',
            'Nauval Januarta Putra Aryanto',
            'Awaulangga Dwi Ariyanto',
            'Artha Gandhi Wardana Aksa',
            'Sherly Tanti Virginia',
            'Ananda Nouval Aryanta',
            'Cindy Permatasari Lubis',
            'George Misael Gantume',
            'Seri Muliani Lubis',
            'Nisrin Raihana',
            'Muhammad Zaky Irly Alqifari',
            'Affan Rido Harris Berliansyah',
            'Festiana Ramaya',
            'Daexza Alfiantineora S',
            'Safina Rahmani Maulidiyah',
            'Aleron Maulana Firjatullah',
            'Adinda Rizki Amaliyah',
            'Nur Azizah',
            'Noor Fariha',
            'Fitria Indah',
            'Carakacatya',
            'Muhammad Ridha Hafidz',
            'Falih Dwi Anggara',
            'Felicia Paramdayani Aidilya Putri',
            'Muhammad Faidzin Aslam',
            'Yuro Arumandji',
            'Mohammad Hafidz Al Maaher',
            'Agnesti Wulansari',
            'Muhammad Farid Luqman Hakim',
            'Panji Bachtiar',
            'Daniel Situmorang',
            'Naurah Dila Fitriah',
            'Cindy Alfira',
            'Shendy Tria Amelyana',
            'SHELYNA RISKA AMANATULLAH',
            'ADITYA PRATAMA',
            'ESALINA PRISA WANUDIA',
            'SOFIE KUSUMA ANGGRAINI',
            'AURELI ECI SALSABILA',
            'REVIKA AMELINDA FEFTYANA',
            'WAFI HUSNA SALSABILA',
            'DHAFINA BENING NAJWA BRILLIAN',
            'SAFRIZAL HUDA KURNIAWAN',
            'FAIZATUN NI\'MAH',
            'ABDUL ALIM',
            'NAHDAH ZAFIRAH BR TAMPUBOLON',
            'ARYO PRABOWO',
            'FAZA ULUL ILMA',
            'MUHAMMAD DUTA ZAINUL HAKIM',
            'MELLINDA IMPIAWATI DWINORI',
            'AHMAD LAZIM',
            'KAMILATUS SA\'ADAH',
            'CHRISTYA WAHYUHANATALIA ERFACHRY',
            'MUHAMMAD RAFLI ADITYA PRATAMA',
            'DAFFA SURYA ARRAYAN',
            'PUTU BAGUS WEDHA WIDAGDHA',
            'RAISYA ADREL ANANDA',
            'DIVA DWI BERENZA',
            'SURYA DWI SATRIA',
            'FIKRI FIRMANSYAH',
            'MUHAMMAD ALIF ADIAWAN',
            'ABDILLAH MUHARRARUL WIBOWO',
            'M ARVIN NUR MADINAH',
            'MUHAMMAD ABIDDAR PUTRA MIRZA',
            'DZIKRI HIDAYAT',
 'MUHAMMAD WILDAN ADYATMA SATRIA',
            'TALITHA SABIYA NUR AZIGHAH',
            'INUNK RODLIYAH',
            'FAHAD USMAN',
            'AYUNDA RISKI NURVIANA',
            'NABILA RAHMASARI',
            'DE\'VINNO RYANSYAH ODDANG',
            'SUTANTIYAR DWIPUTRA',
            'LUTFINO ATHALLAH PRATAMA',
            'MOH. SEFRY AUDITYA IZZA EFENDI',
            'AHLUL MUFI',
            'SAYU DAMAR YUNAN',
            'HELMI SA\'ID HIDAYATULLOH',
            'AERIO DAVID TIRTA ATMODJO',
            'HAMMAM NASHIRUDDIN SOEDIRO',
            'JORDAN IZHA AL AYUBI',
            'ALVIN CHANDRA UTOMO',
            'ADELIA SALSABILA',
            'AHMAD SYAUQI NURI',
            'MUHAMAD ALI WAHYU DWI LAKSONO',
            'NADHIVA MAULIDYA',
            'MERLIN LUTVIKA',
            'TITO MUHAMMAD GAFA',
            'MUCHAMAD ERLANGGA SETIAWAN',
            'MUHAMMAD ZAKI FIKRI HARIYADI',
            'SYAHREN MASTER',
            'PEDJA RAFSANJANI',
            'INDAH TASYA KURINA',
            'MUHAMMAD CATRA HANIF \'AZMI',
            'NURUL HALISA',
            'BRAYN FIRMANA YUWONO',
            'DAFFA FADHLULLAH SAPUTRA',
            'MUHAMMAD HAIKAL BIMA',
            'AISYATUN NABILA',
            'ANISSA MONASRITA WIDYADHANA',
            'LUTFANIA',
        ];

        // Daftar role yang tersedia
        $roles = [1, 2]; // Misalnya, 1 = Admin, 2 = Member, 3 = Guest

        // Buat pengguna dengan nama lengkap dan username yang unik
        foreach ($fullNames as $fullName) {
            $firstName = explode(' ', $fullName)[0]; // Ambil nama depan
            $username = Str::slug($firstName, '');

            User::create([
                'name' => $fullName,
                'username' => $username,
                'email' => $username . '@gmail.com',
                'id_role' => $roles[array_rand($roles)], // Pilih role secara acak
                'password' => Hash::make('1234567890'),
            ]);
        }
    }
}