<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\KomponenMesin;
use App\Models\Mesin;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $mesin = [
            [
                'kode_mesin' => 'machine001',
                'nama' => 'Cylinder Head',
                'posisi_x' => 320,
                'posisi_y' => 220,
                'item_width' => 800,
                'item_height' => 320,
            ],
            [
                'kode_mesin' => 'machine002',
                'nama' => 'Cylinder Block',
                'posisi_x' => 420,
                'posisi_y' => 590,
                'item_width' => 300,
                'item_height' => 120,
            ],
            [
                'kode_mesin' => 'machine003',
                'nama' => 'Front Engine Compartment',
                'posisi_x' => 120,
                'posisi_y' => 590,
                'item_width' => 290,
                'item_height' => 120,
            ],
            [
                'kode_mesin' => 'machine004',
                'nama' => 'Cooling System',
                'posisi_x' => 1200,
                'posisi_y' => 90,
                'item_width' => 290,
                'item_height' => 90,
            ],
            [
                'kode_mesin' => 'machine005',
                'nama' => 'Charging System',
                'posisi_x' => 1200,
                'posisi_y' => 210,
                'item_width' => 290,
                'item_height' => 290,
            ],
            [
                'kode_mesin' => 'machine006',
                'nama' => 'Lubrication System',
                'posisi_x' => 1200,
                'posisi_y' => 510,
                'item_width' => 290,
                'item_height' => 290,
            ],
            [
                'kode_mesin' => 'machine007',
                'nama' => 'Fuel System',
                'posisi_x' => 1500,
                'posisi_y' => 90,
                'item_width' => 70,
                'item_height' => 710,
            ],
        ];
        Mesin::insert($mesin);

        $komponen = [
            [
                'id_mesin' => '1',
                'kode_komponen' => 'comp001',
                'nama' => 'Kepala Silinder',
                'breakdown_possibility' => '99',
            ],
            [
                'id_mesin' => '1',
                'kode_komponen' => 'comp002',
                'nama' => 'Katup Hisap',
                'breakdown_possibility' => '98',
            ],
            [
                'id_mesin' => '1',
                'kode_komponen' => 'comp003',
                'nama' => 'Katup Buang',
                'breakdown_possibility' => '97',
            ],
            [
                'id_mesin' => '1',
                'kode_komponen' => 'comp004',
                'nama' => 'Poros Nok',
                'breakdown_possibility' => '96',
            ],
            [
                'id_mesin' => '1',
                'kode_komponen' => 'comp005',
                'nama' => 'Rocker Arm',
                'breakdown_possibility' => '95',
            ],
            [
                'id_mesin' => '1',
                'kode_komponen' => 'comp006',
                'nama' => 'Cylinder Head Cover',
                'breakdown_possibility' => '94',
            ],
            [
                'id_mesin' => '1',
                'kode_komponen' => 'comp007',
                'nama' => 'Busi',
                'breakdown_possibility' => '93',
            ],
            [
                'id_mesin' => '1',
                'kode_komponen' => 'comp008',
                'nama' => 'Intake Manifold',
                'breakdown_possibility' => '92',
            ],
            [
                'id_mesin' => '1',
                'kode_komponen' => 'comp009',
                'nama' => 'Exhaust Manifold',
                'breakdown_possibility' => '91',
            ],
            [
                'id_mesin' => '2',
                'kode_komponen' => 'comp010',
                'nama' => 'Blok Silinder',
                'breakdown_possibility' => '99',
            ],
            [
                'id_mesin' => '2',
                'kode_komponen' => 'comp011',
                'nama' => 'Gasket',
                'breakdown_possibility' => '98',
            ],
            [
                'id_mesin' => '2',
                'kode_komponen' => 'comp012',
                'nama' => 'Piston',
                'breakdown_possibility' => '97',
            ],
            [
                'id_mesin' => '2',
                'kode_komponen' => 'comp013',
                'nama' => 'Ring Piston',
                'breakdown_possibility' => '96',
            ],
            [
                'id_mesin' => '2',
                'kode_komponen' => 'comp014',
                'nama' => 'Batang Penggerak',
                'breakdown_possibility' => '95',
            ],
            [
                'id_mesin' => '2',
                'kode_komponen' => 'comp015',
                'nama' => 'Poros Engkol',
                'breakdown_possibility' => '94',
            ],
            [
                'id_mesin' => '2',
                'kode_komponen' => 'comp016',
                'nama' => 'Carter/Oil Pan',
                'breakdown_possibility' => '93',
            ],
            [
                'id_mesin' => '2',
                'kode_komponen' => 'comp017',
                'nama' => 'Drain Plug',
                'breakdown_possibility' => '92',
            ],
            [
                'id_mesin' => '2',
                'kode_komponen' => 'comp018',
                'nama' => 'Pulley Mesin',
                'breakdown_possibility' => '91',
            ],
            [
                'id_mesin' => '2',
                'kode_komponen' => 'comp019',
                'nama' => 'Flywheel',
                'breakdown_possibility' => '90',
            ],
            [
                'id_mesin' => '3',
                'kode_komponen' => 'comp020',
                'nama' => 'Timing Chain Assembly',
                'breakdown_possibility' => '99',
            ],
            [
                'id_mesin' => '3',
                'kode_komponen' => 'comp021',
                'nama' => 'Timing Chain Cover',
                'breakdown_possibility' => '98',
            ],
            [
                'id_mesin' => '3',
                'kode_komponen' => 'comp022',
                'nama' => 'Motor Starter',
                'breakdown_possibility' => '97',
            ],
            [
                'id_mesin' => '3',
                'kode_komponen' => 'comp023',
                'nama' => 'Driver Belt',
                'breakdown_possibility' => '96',
            ],
            [
                'id_mesin' => '3',
                'kode_komponen' => 'comp024',
                'nama' => 'Oil Cap',
                'breakdown_possibility' => '95',
            ],
            [
                'id_mesin' => '4',
                'kode_komponen' => 'comp025',
                'nama' => 'Radiator',
                'breakdown_possibility' => '99',
            ],
            [
                'id_mesin' => '4',
                'kode_komponen' => 'comp026',
                'nama' => 'Tutup Radiator',
                'breakdown_possibility' => '98',
            ],
            [
                'id_mesin' => '4',
                'kode_komponen' => 'comp027',
                'nama' => 'Thermostat',
                'breakdown_possibility' => '97',
            ],
            [
                'id_mesin' => '4',
                'kode_komponen' => 'comp028',
                'nama' => 'Cooling Fan',
                'breakdown_possibility' => '96',
            ],
            [
                'id_mesin' => '4',
                'kode_komponen' => 'comp029',
                'nama' => 'Reservoir Tank (Tangki Cadangan)',
                'breakdown_possibility' => '95',
            ],
            [
                'id_mesin' => '4',
                'kode_komponen' => 'comp030',
                'nama' => 'Upper Hose dan Lower Hose',
                'breakdown_possibility' => '94',
            ],
            [
                'id_mesin' => '4',
                'kode_komponen' => 'comp031',
                'nama' => 'Water Temperatur Sensor',
                'breakdown_possibility' => '93',
            ],
            [
                'id_mesin' => '4',
                'kode_komponen' => 'comp032',
                'nama' => 'Water Jacket',
                'breakdown_possibility' => '92',
            ],
            [
                'id_mesin' => '4',
                'kode_komponen' => 'comp033',
                'nama' => 'V-Belt (Sabuk Penggerak)',
                'breakdown_possibility' => '91',
            ],
            [
                'id_mesin' => '5',
                'kode_komponen' => 'comp034',
                'nama' => 'Alternator',
                'breakdown_possibility' => '99',
            ],
            [
                'id_mesin' => '5',
                'kode_komponen' => 'comp035',
                'nama' => 'Regulator',
                'breakdown_possibility' => '98',
            ],
            [
                'id_mesin' => '5',
                'kode_komponen' => 'comp036',
                'nama' => 'Baterai',
                'breakdown_possibility' => '97',
            ],
            [
                'id_mesin' => '6',
                'kode_komponen' => 'comp037',
                'nama' => 'Pompa Oli (Oil Pump)',
                'breakdown_possibility' => '99',
            ],
            [
                'id_mesin' => '6',
                'kode_komponen' => 'comp038',
                'nama' => 'Saringan Oli (Filter Oli)',
                'breakdown_possibility' => '98',
            ],
            [
                'id_mesin' => '6',
                'kode_komponen' => 'comp039',
                'nama' => 'Saringan Kasa Oli',
                'breakdown_possibility' => '97',
            ],
            [
                'id_mesin' => '7',
                'kode_komponen' => 'comp040',
                'nama' => 'Tangki Bahan Bakar (Fuel Tank)',
                'breakdown_possibility' => '99',
            ],
            [
                'id_mesin' => '7',
                'kode_komponen' => 'comp041',
                'nama' => 'Saringan Bahan Bakar (Fuel Filter)',
                'breakdown_possibility' => '98',
            ],
            [
                'id_mesin' => '7',
                'kode_komponen' => 'comp042',
                'nama' => 'Saluran Bahan Bakar',
                'breakdown_possibility' => '97',
            ],
            [
                'id_mesin' => '7',
                'kode_komponen' => 'comp043',
                'nama' => 'Pompa Bahan Bakar',
                'breakdown_possibility' => '96',
            ],
            [
                'id_mesin' => '7',
                'kode_komponen' => 'comp044',
                'nama' => 'Karburator',
                'breakdown_possibility' => '95',
            ],
        ];
        KomponenMesin::insert($komponen);
    }
}
