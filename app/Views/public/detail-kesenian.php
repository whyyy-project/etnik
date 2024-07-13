<?php $this->extend('template/template-public') ?>
<?php $this->section('content-public')  ?>

<!-- body, footer -->
<div class="main-content flex-1 bg-gray-100 mt-20 md:mt-2">
    <div class=" bg-gray-800 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-cyan-700 to-gray-800 p-4 shadow text-2xl text-white">
            <h3 class="font-bold pl-2 text-base md:text-xl"><span class="text-orange-500">Detail Kesenian</span> | <?= $kesenian ?></h3>
        </div>
    </div>
    <div class="p-3 md:px-5 pb-0 mx-2 mb:mx-1">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="px-4 py-3">
                <h1 class="text-2xl font-bold text-gray-800 text-base md:text-lg">Kesenian <span class="text-orange-500"><?= $kesenian ?></span></h1>
                <div class="border border-gray-200 m-2"></div>
                <!-- kontent -->
                <div class="mt-4 p-3">
                    <!-- Foto Kesenian -->
                    <img src="<?= base_url() ?>upload/<?= $year = date("Y-m-d", strtotime($hasil->created_at)) . ' ' . $hasil->nama_grup ?>/foto_kesenian/<?= $hasil->foto_kesenian ?>" alt="<?= $hasil->nama_grup ?>" class="w-1/2 mx-auto rounded-br-lg rounded-tl-lg block">


                    <!-- Nama Kesenian -->
                    <h2 class="text-xl font-semibold text-gray-800 mt-4">Nama Kesenian: <?= $hasil->jenis_seni ?> <?= $hasil->nama_grup ?></h2>

                    <!-- Alamat -->
                    <p class="text-gray-600 mt-2">
                        <?= $hasil->alamat ?> | RT/RW <?= $hasil->rt_rw ?>, Desa <?= $hasil->desa ?>, Kec. <?= $hasil->kecamatan ?>, Kab. <?= $hasil->kabupaten ?>
                    </p>

                    <!-- Jumlah jumlah_anggota-->
                    <p class="text-gray-600">
                        Jumlah Anggota: <?= $hasil->jumlah_anggota ?> Orang
                    </p>

                    <!-- Tahun Berdiri -->
                    <p class="text-gray-600">
                        Tahun Berdiri: <?= $hasil->tahun_berdiri ?>
                    </p>

                    <!-- Penjelasan Singkat -->
                    <p class="text-gray-800 text-sm mt-4">
                        <?= $hasil->keterangan ?>
                    </p>
                    <div class="flex mt-3">

                        <!-- Foto Pimpinan -->
                        <img src="<?= base_url() ?>upload/<?= $year = date("Y-m-d", strtotime($hasil->created_at)) . ' ' . $hasil->nama_grup ?>/pas_foto/<?= $hasil->pas_photo ?>" alt="<?= $hasil->nama_pelaku_seni ?>" class="w-1/5 rounded-2xl ml-1">
                        <div class="ml-4">

                            <p class="text-gray-600">
                                Nama Pimpinan : <?= $hasil->nama_pelaku_seni ?>
                            </p>
                            <!-- Telepon -->
                            <p class="text-gray-600">
                                Telepon: <?= $hasil->telp_ketua ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="group px-3 mr-0 py-3 m-3 block text-center">
                <a href="<?= base_url() ?>daftar-kesenian" class="text-white bg-gray-800 px-4 py-2 rounded-full hover:bg-gray-700">
                    <i class="fas fa-check"></i> Lihat Kesenian Lain
                </a>
            </div>
        </div>
    </div>


    <!-- end content here -->
    <?php $this->endSection(); ?>