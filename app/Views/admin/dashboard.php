<?php $this->extend('template/template-admin') ?>
<?php $this->section('content-admin')  ?>

<!-- body, footer -->
<div class="main-content flex-1 bg-gray-100 mt-20 md:mt-2">
    <div class=" bg-gray-800 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-cyan-700 to-gray-800 p-4 shadow text-2xl text-white">
            <h3 class="font-bold pl-2 text-base md:text-xl"><span class="text-orange-500">ETNIK</span> | <span class="text-orange-500">E</span>lek<span class="text-orange-500">t</span>ronik <span class="text-orange-500">N</span>omor <span class="text-orange-500">I</span>nduk <span class="text-orange-500">K</span>esenian</h3>
        </div>
    </div>
    <!-- content here -->
<div class="hidden md:flex md:px-5 mx-6 mb:mx-1">

    <div class="md:w-1/5 py-3 md:mx-auto">
        <div class="bg-gradient-to-r from-cyan-700 to-gray-800 shadow-lg rounded-lg overflow-hidden">
            <div class="px-4 py-3">
                <h1 class="text-2xl font-bold text-white text-base md:text-lg">Data <span class="text-orange-500"> Pengajuan</span></h1>
                <div class="border border-gray-200 m-2"></div>
                <p class="mt-2 text-white mr-3">
                    10 pengajuan
                </p>
                <div class="mt-3 text-right">
                    <a href="#" class="text-white">Lihat >></a>
                </div>
            </div>
        </div>
    </div>
    <div class="md:w-1/5 py-3 md:mx-auto">
        <div class="bg-gradient-to-r from-cyan-700 to-gray-800 shadow-lg rounded-lg overflow-hidden">
            <div class="px-4 py-3">
                <h1 class="text-2xl font-bold text-white text-base md:text-lg">Data <span class="text-orange-500"> Pengajuan</span></h1>
                <div class="border border-gray-200 m-2"></div>
                <p class="mt-2 text-white mr-3">
                    10 pengajuan
                </p>
                <div class="mt-3 text-right">
                    <a href="#" class="text-white">Lihat >></a>
                </div>
            </div>
        </div>
    </div>
    <div class="md:w-1/5 py-3 md:mx-auto">
        <div class="bg-gradient-to-r from-cyan-700 to-gray-800 shadow-lg rounded-lg overflow-hidden">
            <div class="px-4 py-3">
                <h1 class="text-2xl font-bold text-white text-base md:text-lg">Data <span class="text-orange-500"> Pengajuan</span></h1>
                <div class="border border-gray-200 m-2"></div>
                <p class="mt-2 text-white mr-3">
                    10 pengajuan
                </p>
                <div class="mt-3 text-right">
                    <a href="#" class="text-white">Lihat >></a>
                </div>
            </div>
        </div>
    </div>
    <div class="md:w-1/5 py-3 md:mx-auto">
        <div class="bg-gradient-to-r from-cyan-700 to-gray-800 shadow-lg rounded-lg overflow-hidden">
            <div class="px-4 py-3">
                <h1 class="text-2xl font-bold text-white text-base md:text-lg">Data <span class="text-orange-500"> Pengajuan</span></h1>
                <div class="border border-gray-200 m-2"></div>
                <p class="mt-2 text-white mr-3">
                    10 pengajuan
                </p>
                <div class="mt-3 text-right">
                    <a href="#" class="text-white">Lihat >></a>
                </div>
            </div>
        </div>
    </div>
    
</div>

    <div class="p-3 md:px-5 md:pt-0 pb-0 mx-2 mb:mx-1">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="px-4 py-3">
                <h1 class="text-2xl font-bold text-gray-800 text-base md:text-lg">Data Kesenian <span class="text-orange-500"> ETNIK</span></h1>
                <div class="border border-gray-200 m-2"></div>

                <p class="mt-2 text-gray-600 text-justify mr-3">Selamat Datang <strong><?= session('nama') ?></strong> dalam Sistem Elektronik Nomor Induk Kesenian Dinas Kebudayaan dan Pariwisata Bojonegoro.
                    <span id="typing-text"></span>
                    <span id="cursor"></span>
                </p>
            </div>
        </div>
    </div>

    <div class="w-1/2 p-3 md:px-5 pb-0 mx-2 mb:mx-1">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="px-4 py-3">
                <h1 class="text-2xl font-bold text-gray-800 text-base md:text-lg">Panduan <span class="text-orange-500"> ADMIN</span></h1>
                <div class="border border-gray-200 m-2"></div>
                <p class="mt-2 text-gray-600 text-justify mr-3">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                </p>
                <div class="mt-3">
                    <a href="#" class="bg-gray-600 text-white px-3 md:px-10 py-2 rounded-full hover:bg-gray-500 focus:outline-none"><i class="fas fa-download mr-1"></i>Download</a>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url() ?>/assets/js/typingText.js"></script>

    <!-- end content here -->
    <?php $this->endSection(); ?>