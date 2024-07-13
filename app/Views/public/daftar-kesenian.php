<?php $this->extend('template/template-public') ?>
<?php $this->section('content-public')  ?>

<!-- body, footer -->


<div class="main-content flex-1 bg-gray-100 md:mt-2">
    <div class="bg-gray-800 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-cyan-700 to-gray-800 p-4 shadow text-2xl text-white">
            <h3 class="font-bold pl-2 text-base md:text-xl"><span class="text-orange-500">Cari</span> <span class="text-orange-500">K</span>esenian</h3>
        </div>
    </div>

    <div class="bg-white shadow-lg rounded-lg mt-3 mx-6 pb-5 overflow-hidden">
        <h1 class="text-2xl font-bold text-gray-800 ml-4 mt-3 text-base md:text-lg">Data <span class="text-orange-500"> Kesenian</span></h1>
        <div class="border border-gray-200 m-4"></div>

        <div class="flex flex-wrap mx-3">
            <!-- Tampilan Pagination -->
            <?php foreach ($kesenian as $data) : ?>
                <div class="w-full md:w-1/3 p-1 mb-3 md:mb-1 hover:-translate-y-1 duration-500">
                    <div class="md:p-1">
                        <div class="bg-gray-100 shadow-lg rounded-lg overflow-hidden">
                            <div class="px-4 py-3">
                                <h1 class="text-2xl font-bold text-gray-800 text-base md:text-lg"><?= $data['jenis_seni'] . " " . $data['nama_grup'] ?></h1>
                                <div class="border border-gray-200 m-2"></div>
                                <div class="flex justify-center items-center mx-auto">
                                    <img loading="lazy" src="<?= base_url() ?>upload/<?= $year = date("Y-m-d", strtotime($data['created_at'])) . ' ' . $data['nama_grup'] ?>/foto_kesenian/<?= $data['foto_kesenian'] ?>" class="rounded-tr-[35px] rounded-bl-[35px] h-24 md:h-40" alt="<?= $data['jenis_seni'] . " " . $data['nama_grup'] ?>">
                                </div>
                                <div class="mt-2 text-gray-800">
                                    <p><span class="font-bold">ETNIK : </span> <?= $data['etnik'] ?></p>
                                    <p><span class="font-bold">Pimpinan : </span><?= $data['nama_pelaku_seni'] ?></p>
                                </div>
                            </div>
                            <div class="px-4 pb-3">
                                <a href="<?= base_url() ?>detail-kesenian/<?= $data['slug'] ?>" class="text-white bg-gray-800 px-3 text-sm md:text-base py-2 md:px-4 md:py-2 rounded-full hover:bg-gray-700">
                                    <i class="fas fa-info mr-2"></i>Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- pagination -->
        <div class="flex justify-between items-center mx-3 mt-4">
            <?php if ($currentPage > 1) : ?>
                <a href="<?= base_url('daftar-kesenian?page=' . ($currentPage - 1)) ?>" class="text-gray-600 text-sm md:text-base py-2 px-3 hidden md:block">
                    <i class="fas fa-arrow-left"></i> Sebelumnya
                </a>
            <?php endif; ?>

            <div class="flex mx-auto">
                <?php
                $numPagesToShow = 5; // Jumlah halaman yang akan ditampilkan
                $halfNumPages = floor($numPagesToShow / 2);
                $startPage = max(1, $currentPage - $halfNumPages);
                $endPage = min($totalPages, $currentPage + $halfNumPages);

                $numPagesDiff = $numPagesToShow - ($endPage - $startPage + 1);

                if ($numPagesDiff > 0) {
                    $startPage = max(1, $startPage - $numPagesDiff);
                }

                if ($startPage > 1) {
                    echo '<a href="' . base_url('daftar-kesenian?page=1') . '" class="text-gray-600 text-sm md:text-base py-2 px-3">1</a>';
                    echo '<span class="text-gray-600 text-sm md:text-base py-2 px-3">...</span>';
                }

                for ($i = $startPage; $i <= $endPage; $i++) {
                    $isActive = $currentPage == $i ? 'bg-gray-300' : '';
                    echo '<a href="' . base_url('daftar-kesenian?page=' . $i) . '" class="text-gray-600 text-sm md:text-base py-2 px-3 ' . $isActive . '">' . $i . '</a>';
                }

                if ($endPage < $totalPages) {
                    echo '<span class="text-gray-600 text-sm md:text-base py-2 px-3">...</span>';
                    echo '<a href="' . base_url('daftar-kesenian?page=' . $totalPages) . '" class="text-gray-600 text-sm md:text-base py-2 px-3">' . $totalPages . '</a>';
                }
                ?>
            </div>

            <?php if ($currentPage < $totalPages) : ?>
                <a href="<?= base_url('daftar-kesenian?page=' . ($currentPage + 1)) ?>" class="text-gray-600 text-sm md:text-base py-2 px-3 hidden md:block">
                    Berikutnya <i class="fas fa-arrow-right"></i>
                </a>
            <?php endif; ?>
        </div>

        <!-- end pagination -->

    </div>


    <!-- end content here -->

    <?php $this->endSection(); ?>