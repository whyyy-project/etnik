<?php $this->extend('template/template-public') ?>
<?php $this->section('content-public')  ?>

<!-- body, footer -->
<div class="main-content flex-1 bg-gray-100 mt-20 md:mt-2">
    <div class=" bg-gray-800 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-cyan-700 to-gray-800 p-4 shadow text-2xl text-white">
            <h3 class="font-bold pl-2 text-base md:text-xl"><span class="text-orange-500">Mendaftar</span> | <span class="text-orange-500">E</span>TNIK</h3>
        </div>
    </div>
    <!-- content here -->
    <div class="p-3 md:px-5 pb-0 mx-1">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="px-4 py-3">
                <h1 class="text-2xl font-bold text-gray-800 text-base md:text-lg">Download<span class="text-orange-500"> Persyaratan</span></h1>
                <div class="border border-gray-200 m-2"></div>
                <div class="my-5 block md:flex">
                    <p>
                        <a href="#" class="text-white bg-gray-800 px-5 py-2 rounded-full hover:bg-gray-700 text-sm md:text-base mr-3"><i class="fas fa-download"></i> Panduan Pendaftaran</a>
                    </p>
                    <p class=" mt-5 md:mt-0">
                        <a href="https://bit.ly/3TuL5hO" target="_blank" class="text-white bg-gray-800 px-5 py-2 rounded-full hover:bg-gray-700 text-sm md:text-base"><i class="fas fa-download"></i> Surat Permohonan NIK</a>
                    </p>
                </div>

            </div>
        </div>
    </div>
    <div class="p-3 md:px-5 md:pb-0 mx-1">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="px-4 py-3">
                <h1 class="text-2xl font-bold text-gray-800 text-base md:text-lg">Silahkan isi formulir<span class="text-orange-500"> Pendaftaran</span></h1>

                <?php if (session()->has('validation_errors')) : ?>
                    <!-- Tampilkan pesan kesalahan validasi jika ada -->
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Terjadi kesalahan:</strong>
                        <ul>
                            <?php foreach (session('validation_errors') as $error) : ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php if (session()->has('success_regist')) : ?>
                    <!-- Tampilkan pesan success -->
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative success-alert" role="alert">
                        <span class="block sm:inline"><?= session('success_regist') ?></span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3 close-button">
                            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <title>Close</title>
                                <path d="M14.348 14.849c.195.195.451.293.707.293s.512-.098.707-.293l4-4a1.003 1.003 0 0 0 0-1.414l-4-4a1.003 1.003 0 0 0-1.414 0l-4 4a1.003 1.003 0 0 0 0 1.414l4 4c.195.195.451.293.707.293z" />
                                <path d="M5.652 14.849c.195.195.451.293.707.293s.512-.098.707-.293l4-4a1.003 1.003 0 0 0 0-1.414l-4-4a1.003 1.003 0 0 0-1.414 0l-4 4a1.003 1.003 0 0 0 0 1.414l4 4c.195.195.451.293.707.293z" />
                            </svg>
                        </span>
                    </div>
                    <script>
                        // Temukan tombol close
                        const closeButton = document.querySelector('.close-button');
                        // Temukan div pesan sukses
                        const successAlert = document.querySelector('.success-alert');

                        // Tambahkan event listener untuk tombol close
                        closeButton.addEventListener('click', function() {
                            // Tambahkan kelas "hidden" untuk menyembunyikan pesan sukses dengan efek transisi
                            successAlert.classList.add('hidden');
                        });
                    </script>
                <?php endif; ?>

                <div class="border border-gray-200 m-2"></div>
                <div class="max-w-full mt-3">
                    <?php echo form_open_multipart('daftar'); ?>
                    <!-- Step 1 -->
                    <div class="step" id="step-1">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="nama_sanggar">
                                Nama Sanggar Seni
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-orange-500 rounded-br-none rounded-tr-none" id="nama_sanggar" type="text" name="nama_sanggar" placeholder="Nama Sanggar Seni" value="<?= old('nama_sanggar') ?>">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="jenis_kesenian">
                                Jenis Kesenian
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-orange-500 rounded-br-none rounded-tr-none" id="jenis_kesenian" type="text" placeholder="Jenis Kesenian(Tari, Reog, Campursari, Teater, Dagelan, dll)" name="jenis_kesenian" value="<?= old('jenis_kesenian') ?>">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="nama_pimpinan">
                                Nama Pimpinan Grup
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-orange-500 rounded-br-none rounded-tr-none" id="nama_pimpinan" type="text" placeholder="Nama Ketua" name="nama_ketua" value="<?= old('nama_ketua') ?>">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="jumlah_anggota">
                                Jumlah Anggota
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-orange-500 rounded-br-none rounded-tr-none" id="jumlah_anggota" type="number" placeholder="Jumlah Anggota" name="jumlah_anggota" value="<?= old('jumlah_anggota') ?>">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="rt">
                                Alamat :
                            </label>
                            <input class="shadow appearance-none border text-center rounded w-1/5 text-sm md:mr-1 md:w-14 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-orange-500 rounded-br-none rounded-tr-none" id="rt" name="rt" placeholder="RT" value="<?= old('rt') ?>"> /
                            <input class="shadow appearance-none border text-center rounded w-1/5 text-sm md:w-14 md:ml-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-orange-500 rounded-br-none rounded-tr-none" type="text" placeholder="RW" name="rw" value="<?= old('rw') ?>">
                            <input class="shadow appearance-none border text-center rounded w-1/2 text-sm md:w-1/5 ml-3 md:ml-3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-orange-500 rounded-br-none rounded-tr-none" type="text" placeholder="Desa" name="desa" value="<?= old('desa') ?>">
                            <input class="shadow appearance-none text-center border rounded w-full text-sm mt-2 md:ml-3 md:w-1/5 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-orange-500 rounded-br-none rounded-tr-none" type="text" placeholder="Kecamatan" name="kecamatan" value="<?= old('kecamatan') ?>">
                            <input class="shadow appearance-none text-center border rounded w-full text-sm mt-2 md:ml-3 md:w-1/5 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-orange-500 rounded-br-none rounded-tr-none" type="text" placeholder="Kabupaten" name="kabupaten" value="<?= old('kabupaten') ?>">
                            <input class="shadow appearance-none border rounded w-full text-sm mt-2 md:w-1/5 md:ml-3 py-2 px-3 text-gray-700 leading-tight text-center focus:outline-none focus:border-orange-500 rounded-br-none rounded-tr-none" type="text" placeholder="Provinsi" name="provinsi" value="<?= old('provinsi') ?>">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="alamat-spesifik">
                                Alamat(Jalan, Gang, Nomor)
                            </label>
                            <textarea name="alamat" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-orange-500 rounded-br-none rounded-tr-none" id="alamat-spesifik" placeholder="Alamat Spesifik (Jalan, Gang, Nomor Rumah)" name="alamat"><?= old('alamat') ?></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="tahun_berdiri">
                                Tahun Berdiri
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-orange-500 rounded-br-none rounded-tr-none" id="tahun_berdiri" type="number" name="tahun_berdiri" placeholder="Tahun Berdiri" value="<?= old('tahun_berdiri') ?>">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="no_telepon_ketua">
                                No Telepon Ketua
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-orange-500 rounded-br-none rounded-tr-none" id="no_telepon_ketua" type="tel" name="no_telepon_ketua" placeholder="No Telepon Ketua" value="<?= old('no_telepon_ketua') ?>">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="email-aktif">
                                Email Konfirmasi
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-orange-500 rounded-br-none rounded-tr-none" id="email-aktif" type="email" name="email-aktif" placeholder="Email Aktif" value="<?= old('email-aktif') ?>">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="no_telepon_sekertaris">
                                No Telepon Sekretaris
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-orange-500 rounded-br-none rounded-tr-none" id="no_telepon_sekertaris" type="tel" placeholder="No Telepon Sekretaris" name="no_telepon_sekertaris" value="<?= old('no_telepon_sekertaris') ?>">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                <input type="checkbox" id="perpanjang-checkbox"> Perpanjang NIK Lama ?
                            </label>
                        </div>
                        <div class="mb-4 hidden" id="form-nik-lama">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="input-nik-lama">
                                No NIK Lama(Jika Perpanjang)
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-orange-500 rounded-br-none rounded-tr-none" id="input-nik-lama" type="text" placeholder="Jika tidak ada harap jangan Checklist di atas" name="nik_lama" value="none">
                        </div>
                        <div class="mb-4 hidden" id="form-scan-nik-lama">
                            <label class="shadow rounded-full py-2 px-7 text-white bg-orange-500 hover:bg-orange-400 text-sm cursor-pointer w-1/3 mx-auto" for="input-scan-etnik-lama">
                                <i class="fas fa-image mr-1"></i> Scan NIK Lama (gambar)
                            </label> <span class="text-gray-700" id="nama-file-scan-nik-lama"></span>
                            <div id="formInputScan"></div>
                        </div>
                        <div class="mb-4 hidden" id="surat-kuasa">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                <input type="checkbox" id="surat-kuasa-checkbox"> Apakah Dikuasakan ?
                            </label>
                        </div>
                        <div class="mb-4 hidden md:hidden block md:flex" id="form-surat-kuasa">
                            <label class="shadow rounded-full py-2 px-7 text-white bg-orange-500 hover:bg-orange-400 text-sm cursor-pointer w-1/3 mx-auto" for="input-ktp-kuasa">
                                <i class="fas fa-image mr-1"></i> Scan KTP yang diberi Kuasa (gambar)
                            </label> <span class="text-gray-700" id="nama-file-surat-kuasa-ktp"></span>
                            <div id="formInputKtp"></div>

                            <div class="my-3 md:my-0"></div>

                            <label class="shadow rounded-full py-2 px-7 text-white bg-orange-500 hover:bg-orange-400 text-sm cursor-pointer w-1/3 mx-auto" for="input-surat-kuasa">
                                <i class="fas fa-file-pdf mr-1"></i> Upload surat Kuasa (.pdf)
                            </label> <span class="text-gray-700" id="nama-file-surat-kuasa-surat"></span>
                            <div id="formInputSurat"></div>
                        </div>


                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                <input type="checkbox" id="kemampuan-checkbox"> Apakah ada Sertifikat Kemampuan Bidang Keahlian ?
                            </label>
                        </div>

                        <div class="mb-4 hidden" id="kemampuan-bidang">
                            <label for="sertif-bidang" class="shadow rounded-full py-2 px-7 text-white bg-orange-500 hover:bg-orange-400 text-sm cursor-pointer w-full">
                                <i class="fas fa-file-pdf mr-1"></i> Upload Sertifikat Bidang (.pdf)</label> <span class="text-gray-700" id="nama-file-sertif-bidang"></span>
                            <div id="input-kemampuan"></div>
                        </div>

                        <div class="hidden text-center text-xs md:text-base text-white bg-red-700 w-full md:w-1/3 mx-auto" id="msgErr1">
                            <p>Harap isi semua data yang valid!</p>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <!-- Step 2 -->
                    <div class="step hidden" id="step-2">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="surat-nik">
                                Upload Surat Permohonan NIK <?= session('type') ?>
                            </label>
                            <label for="surat-nik" class="shadow rounded-full py-2 px-7 text-white bg-orange-500 hover:bg-orange-400 text-sm cursor-pointer w-full"><i class="fas fa-file-pdf mr-1"></i> Upload Surat Permohonan (.pdf)</label> <span class="text-gray-700" id="nama-file-surat-nik"></span>
                            <input class="hidden" id="surat-nik" type="file" name="surat-nik" accept=".pdf">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="ktp-ketua">
                                Scan KTP Ketua
                            </label>
                            <label for="ktp-ketua" class="shadow rounded-full py-2 px-7 text-white bg-orange-500 hover:bg-orange-400 text-sm cursor-pointer w-full"><i class="fas fa-image mr-1"></i> Scan KTP Ketua(gambar, max 5MB)</label> <span class="text-gray-700" id="nama-file-ktp"></span>
                            <input class="hidden" id="ktp-ketua" type="file" name="ktp-ketua" accept=".jpg,.jpeg,.png">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="ktp_sekertaris">
                                Scan KTP Sekertaris
                            </label>
                            <label for="ktp_sekertaris" class="shadow rounded-full py-2 px-7 text-white bg-orange-500 hover:bg-orange-400 text-sm cursor-pointer w-full"><i class="fas fa-image mr-1"></i> Scan KTP Sekertaris(gambar, max 5MB)</label> <span class="text-gray-700" id="nama-file-ktp-sekertaris"></span>
                            <input class="hidden" id="ktp_sekertaris" type="file" name="ktp-sekertaris" accept=".jpg,.jpeg,.png">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="pas-foto">
                                Pas Foto Ketua
                            </label>
                            <label for="pas-foto" class="shadow rounded-full py-2 px-7 text-white bg-orange-500 hover:bg-orange-400 text-sm cursor-pointer w-full"><i class="fas fa-image mr-1"></i> Pas Foto Ketua(gambar, max 5MB)</label> <span class="text-gray-700" id="nama-file-pas-foto"></span>
                            <input class="hidden" id="pas-foto" type="file" name="pas-foto" accept=".jpg,.jpeg,.png">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="foto-kesenian">
                                Foto Kesenian
                            </label>
                            <label for="foto-kesenian" class="shadow rounded-full py-2 px-7 text-white bg-orange-500 hover:bg-orange-400 text-sm cursor-pointer w-full"><i class="fas fa-image mr-1"></i> Foto Kesenian(gambar,max 5MB,ukuran 4:3)</label> <span class="text-gray-700" id="nama-file-foto-kesenian"></span>
                            <input class="hidden" id="foto-kesenian" type="file" name="foto-kesenian" accept=".jpg,.jpeg,.png">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="keterangan">
                                Keterangan
                            </label>
                            <textarea name="keterangan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-orange-500 rounded-br-none rounded-tr-none" id="keterangan" placeholder="Keterangan penjelasan tentang Kesenian"><?= old('keterangan') ?></textarea>
                        </div>
                        <div class="hidden text-center text-xs md:text-base text-white bg-red-700 w-full md:w-1/3 mx-auto" id="msgErr2">
                            <p>Harap isi semua data yang valid!</p>
                        </div>
                    </div>
                    <!-- Tombol Navigasi -->
                    <div class="flex items-center justify-end mb-3" id="step">
                        <button id="prev-step" class="text-white bg-gray-800 text-xs md:text-base px-4 py-2 my-3 md:mx-16 rounded-full hover:bg-gray-700 hidden" type="button"><i class="fas fa-arrow-left mr-1"></i> Previous</button>
                        <button id="next-step" class="text-white bg-gray-800 text-xs md:text-base px-9 py-2 my-3 md:mx-16 rounded-full hover:bg-gray-700" type="button">Next <i class="fas fa-arrow-right ml-1"></i></button>
                        <button id="submitBtn" class="text-white bg-gray-800 text-xs md:text-base px-9 py-2 my-3 md:mx-16 rounded-full hover:bg-gray-700 hidden" type="button">Ajukan <i class="fas fa-paper-plane ml-1"></i></button>
                    </div>
                    <?php echo form_close(); ?>
                </div>


            </div>
        </div>
    </div>
    <!-- end content here -->

    <script>

    </script>

    <script src="<?= base_url() ?>assets/js/formPendaftaran.js"></script>

    <?php $this->endSection(); ?>