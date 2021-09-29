<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Guru;
use App\Models\Jam;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Guru::create([
            'nuptk' => '414234',
            'namaguru' => 'Kurikulum',
            'Foto' => 'default.png',
            'role' => 'kurikulum',
            'username' => '192010031',
            'email' => 'kurikulum@gmail.com',
            'password' => Hash::make('password')
        ]);

        Jam::create([
            'name' => 'Literasi',
            'awal' => '06.30',
            'akhir' => '07.00',
        ],
        [
            'name' => 'Jam Ke - 1',
            'awal' => '07.30',
            'akhir' => '08.05',
        ],
        [
            'name' => 'Jam Ke - 2',
            'awal' => '08.05',
            'akhir' => '08.40',
        ],
        [
            'name' => 'Jam Ke - 3',
            'awal' => '08.40',
            'akhir' => '09.10',
        ],
        [
            'name' => 'Jam Ke - 4',
            'awal' => '09.10',
            'akhir' => '09.40',
        ],
        [
            'name' => 'Istirahat',
            'awal' => '09.40',
            'akhir' => '10.00',
        ],
        [
            'name' => 'Jam Ke - 5',
            'awal' => '10.00',
            'akhir' => '10.30',
        ],
        [
            'name' => 'Jam Ke - 6',
            'awal' => '10.30',
            'akhir' => '11.00',
        ],
        [
            'name' => 'Jam Ke - 7',
            'awal' => '11.00',
            'akhir' => '11.30',
        ],
        [
            'name' => 'Jam Ke - 8',
            'awal' => '11.30',
            'akhir' => '12.00',
        ],
        [
            'name' => 'Jam Ke - 9',
            'awal' => '13.00',
            'akhir' => '13.30',
        ],
        [
            'name' => 'Jam Ke - 10',
            'awal' => '13.30',
            'akhir' => '14.00',
        ],
        [
            'name' => 'Jam Ke - 11',
            'awal' => '14.00',
            'akhir' => '14.30',
        ],
        [
            'name' => 'Jam Ke - 12',
            'awal' => '14.30',
            'akhir' => '15.00',
        ],
        [
            'name' => 'Istirahat',
            'awal' => '15.00',
            'akhir' => '15.20',
        ],
        [
            'name' => 'Jam Ke - 13',
            'awal' => '15.20',
            'akhir' => '15.45',
        ],
        [
            'name' => 'Jam Ke - 14',
            'awal' => '15.45',
            'akhir' => '16.10',
        ],
        [
            'name' => 'Jam Ke - 15',
            'awal' => '16.10',
            'akhir' => '16.35',
        ],
        [
            'name' => 'Jam Ke - 16',
            'awal' => '16.35',
            'akhir' => '17.00',
        ],);
    }
}
