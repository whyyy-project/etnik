<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DummySeederKesenian extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 300; $i++) {
            $randomPhoto = rand(1, 3);
            $status = 'acc';
            $kecamatanDesa = [
                'Bojonegoro' => [
                    'Jetak',
                    'Klangon',
                    'Sumbang',
                    'Kepatihan',
                    'Mojokampung',
                    'Kadipaten',
                    'Karangpacar',
                    'Ngrowo',
                    'Banjarejo',
                    'Ledok Wetan',
                    'Ledok Kulon',
                ],
                'Ngasem' => [
                    'Bandungrejo',
                    'Bareng',
                    'Butoh',
                    'Dukuhkidul',
                    'Jampet',
                    'Jelu',
                    'Kolong',
                    'Mediyunan',
                    'Ngadiluwih',
                    'Ngantru',
                    'Ngasem',
                    'Sambong',
                    'Sendangharjo',
                    'Setren',
                    'Tengger',
                    'Trenggulunan',
                    'Wadang',
                ], 'Padangan' => [
                    'TEBON',
                    'PRANGI',
                    'PURWOREJO',
                    'NGEPER',
                    'SONOREJO',
                    'NGRADIN',
                    'KENDUNG',
                    'KEBONAGUNG',
                    'BANJARJO',
                    'KUNCEN',
                    'NGASINAN',
                    'CENDONO',
                    'SIDOREJO',
                    'NGUKEN',
                    'PADANGAN',
                    'DENGOK',
                ],

            ];

            // Pilih secara acak sebuah kecamatan
            $randomKecamatan = array_rand($kecamatanDesa);

            // Pilih secara acak sebuah desa dari kecamatan yang dipilih
            $randomDesa = $kecamatanDesa[$randomKecamatan][array_rand($kecamatanDesa[$randomKecamatan])];
            $data = [
                'slug' => $faker->slug,
                'etnik' => rand(1, 99999999),
                'etnik_lama' => $faker->word,
                'nama_grup' => $faker->company,
                'nama_pelaku_seni' => $faker->name,
                'jenis_seni' => $faker->word,
                'alamat' => $faker->address,
                'desa' => $randomDesa,
                'rt_rw' => $faker->buildingNumber,
                'kecamatan' => $randomKecamatan,
                'kabupaten' => $faker->city,
                'provinsi' => $faker->state,
                'jumlah_anggota' => $faker->numberBetween(1, 20),
                'scan_ktp_ketua' => 'dummy_scan_ktp_ketua_' . $i . '.jpg',
                'scan_ktp_sekertaris' => 'dummy_scan_ktp_sekretaris_' . $i . '.jpg',
                'telp_ketua' => $faker->phoneNumber,
                'telp_sekertaris' => $faker->phoneNumber,
                'pas_photo' => 'dummy_pas_photo_' . $i . '.jpg',
                'foto_kesenian' => $randomPhoto . '.jpg',
                'tahun_berdiri' => $faker->numberBetween(1950, 2023),
                'surat_permohonan_nik' => 'dummy_surat_permohonan_nik_' . $i . '.pdf',
                'sertifikat_kemampuan_bidang_keahlian' => 'dummy_sertifikat_' . $i . '.pdf',
                'surat_kuasa' => 'dummy_surat_kuasa_' . $i . '.pdf',
                'scan_ktp_kuasa' => 'dummy_scan_ktp_kuasa_' . $i . '.jpg',
                'keterangan' => $faker->paragraph,
                'status' => $status,
                'created_at' => $faker->dateTimeThisMonth->format('Y-m-d H:i:s'),
                'updated_at' => $faker->dateTimeThisMonth->format('Y-m-d H:i:s'),
            ];

            $this->db->table('pengajuan')->insert($data);
        }
    }
}
