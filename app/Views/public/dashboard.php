<?php $this->extend('template/template-public') ?>
<?php $this->section('content-public')  ?>

<!-- body, footer -->
<div class="main-content flex-1 bg-gray-100 mt-20 md:mt-2">
    <div class=" bg-gray-800 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-cyan-700 to-gray-800 p-4 shadow text-2xl text-white">
            <h3 class="font-bold pl-2 text-base md:text-xl"><span class="text-orange-500">ETNIK</span> | <span class="text-orange-500">E</span>lek<span class="text-orange-500">t</span>ronik <span class="text-orange-500">N</span>omor <span class="text-orange-500">I</span>nduk <span class="text-orange-500">K</span>esenian</h3>
        </div>
    </div>
    <!-- content here -->
    <div class="p-3 md:px-5 pb-0 mx-2 mb:mx-1">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="px-4 py-3">
                <h1 class="text-2xl font-bold text-gray-800 text-base md:text-lg">Apa itu <span class="text-orange-500"> ETNIK</span> ?</h1>
                <div class="border border-gray-200 m-2"></div>

                <p class="mt-2 text-gray-600 text-justify">
                    <span id="typing-text"></span>
                    <span id="cursor"></span>
                </p>
            </div>
            <div class="group px-3 mr-0 py-3 m-3">
                <a href="<?= base_url() ?>daftar" class="text-white bg-gray-800 px-4 py-2 rounded-full hover:bg-gray-700">
                    <i class="fas fa-check"></i> Daftar Sekarang
                </a>
            </div>
        </div>
    </div>
    <div class="p-2 md:p-3 mx-3">
        <div class="bg-white shadow-lg rounded-lg pb-3 overflow-hidden">
            <div class="px-4 py-3">
                <h1 class="text-2xl font-bold text-gray-800 text-base md:text-lg">Bagaimana cara mendaftar <span class="text-orange-500"> ETNIK</span> ?</h1>
                <div class="border border-gray-200 m-2"></div>
                <p class="mt-2 text-gray-600 text-justify">
                    Selamat datang di Sistem Elektronik Nomor Induk Kesenian (ETNIK) untuk membuat proses pendaftaran lebih sederhana, kami telah menyiapkan panduan yang bisa Anda unduh. silakan klik tombol <strong>Download Panduan</strong> di bawah ini untuk mendapatkan panduan lengkap tentang cara mendaftar di ETNIK.
                </p>
            </div>
            <div class="px-4 py-3">
                <a class="text-white bg-gray-800 px-4 py-2 rounded-full hover:bg-gray-700">
                    <div class="fas fa-download mr-1"></div>Download Panduan
                </a>
            </div>
        </div>
    </div>

    <div class="bg-white shadow-lg rounded-lg mx-6 pb-5 overflow-hidden">
        <h1 class="text-2xl font-bold text-gray-800 ml-4 mt-3 text-base md:text-lg">Data <span class="text-orange-500"> Kesenian</span></h1>
        <div class="border border-gray-200 m-4"></div>
        <div class="flex flex-wrap mx-3">
            <!-- card kesenian -->
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
            <div class="w-full md:w-1/3 p-0 mb-3 mt-1 md:mb-0 hover:cursor-pointer hover:-translate-y-1 duration-500">
                <a href="<?= base_url() ?>daftar-kesenian">
                    <div class="md:p-1">
                        <div class="bg-gray-100 shadow-lg rounded-lg overflow-hidden">
                            <div class="px-4 py-3">
                                <h1 class="text-2xl font-bold text-gray-800 text-base md:text-lg">Lihat Lainnya</h1>
                                <div class="border border-gray-200 m-2"></div>
                                <div class="text-center my-10 md:py-2 mx-auto text-4xl md:text-8xl">
                                    <i class="fas fa-arrow-right p-8 md:p-4"></i>
                                    <p class="text-lg mt-1">Lihat lainnya.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- end card kesenian -->
    <div class="md:w-full md:flex px-5 mt-3">

        <div class="w-full md:w-1/2 hover:-translate-y-1 duration-500">
            <div class="p-3 md:p-1">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="px-4 py-3">
                        <h1 class="text-2xl font-bold text-gray-800 text-base md:text-lg">Panduan Mendaftar <span class="text-orange-500"> ETNIK</span></h1>
                        <div class="border border-gray-200 m-2"></div>
                        <div class="m-3">
                            <iframe class="w-full h-full md:h-64" src="https://www.youtube.com/embed/vfYUpu6dx1I" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full md:w-1/2 hover:-translate-y-1 duration-500">
            <div class="p-3 md:p-1">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="px-4 py-3">
                        <h1 class="text-2xl font-bold text-gray-800 text-base md:text-lg">Panduan Mengisi Formulir <span class="text-orange-500"> ETNIK</span></h1>
                        <div class="border border-gray-200 m-2"></div>
                        <div class="m-3">
                        <iframe class="w-full h-full md:h-64" src="https://www.youtube.com/embed/ljWcfSKg1WU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url() ?>/assets/js/typingText.js"></script>
    <!-- end content here -->
    <?php $this->endSection(); ?>