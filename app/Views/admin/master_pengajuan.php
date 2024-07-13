<?php $this->extend('template/template-admin') ?>
<?php $this->section('content-admin')  ?>

<!-- datatables -->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<!-- end datatables -->

<!-- body, footer -->
<div class="main-content flex-1 bg-gray-100 mt-20 md:mt-2">
    <div class=" bg-gray-800 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-cyan-700 to-gray-800 p-4 shadow text-2xl text-white">
            <h3 class="font-bold pl-2 text-base md:text-xl"><span class="text-orange-500">Admin</span> | Data <span class="text-orange-500">Pengajuan</span></h3>
        </div>
    </div>
    <!-- content here -->
    <div class="p-3 md:px-5 mx-2 mb:mx-1">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="px-4 py-3">
                <h1 class="text-2xl font-bold text-gray-800 text-base md:text-lg">Master Data <span class="text-orange-500"> Pengajuan</span></h1>
                <div class="border border-gray-200 m-2"></div>
                <?php if (session()->has('msg') == "success") : ?>
                    <!-- Tampilkan pesan success -->
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative success-alert" role="alert">
                        <span class="block sm:inline">Selamat Berhasil ACC <?= session('user') ?>.</span>
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
                <div id="button-container">
                    <!-- Tombol unduhan akan ditampilkan di sini -->
                </div>

                <table id="myTable" class="display" style="width:100%">
                    <thead class="mt-3 bg-gradient-to-r from-cyan-700 to-gray-800 text-sm shadow text-white">
                        <tr>
                            <th>Tanggal</th>
                            <th>Jenis Seni</th>
                            <th>Nama Kesenian</th>
                            <th>Nama Pimpinan</th>
                            <th>Alamat</th>
                            <th>Anggota</th>
                            <th>Berkas</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($pengajuan as $data) : ?>
                            <tr>
                                <?php
                                $tanggal = $data['created_at'];
                                $timestamp = strtotime($tanggal);

                                $thn = date("Y", $timestamp);
                                $bulan = date("m", $timestamp);
                                $hari = date("d", $timestamp);
                                $jam = date('h');
                                $i = date('i');
                                $s = date('s');
                                ?>
                                <td><?= $jam . ":" . $i . ":" . $s . " " . $hari . "/" . $bulan . "/" . $thn ?></td>
                                <td><?= $data['jenis_seni'] ?></td>
                                <td><?= $data['nama_grup'] ?></td>
                                <td><?= $data['nama_pelaku_seni'] ?></td>
                                <td><?= $data['alamat'] ?> | RT/RW <?= $data['rt_rw'] ?>, Desa <?= $data['desa'] ?>, Kec. <?= $data['kecamatan'] ?>, Kab. <?= $data['kabupaten'] ?></td>
                                <td><?= $data['jumlah_anggota'] ?></td>
                                <td>
                                    <a href="<?= base_url() ?>zip/<?= $data['slug'] ?>" class="btn-login bg-teal-600 hover:bg-teal-500 text-white flex items-center">
                                        <i class="fas fa-download mr-1"></i>
                                        Download
                                    </a>
                                </td>
                                <td>
                                    <div class="relative inline-block text-left">
                                        <!-- Tombol Opsi -->
                                        <button type="button" class="btn-login bg-gray-600 hover:bg-gray-500 block text-white flex items-center" data-id="<?= $data['slug'] ?>">
                                            Opsi
                                            <i id="dropdown" class="fas fa-caret-down ml-1"></i>
                                        </button>
                                        <!-- Dropdown untuk menangani semua tombol Opsi -->
                                        <div class="hidden origin-top-right absolute right-0 mt-2 w-32 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
                                            <div id="dropdown-menu" class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                                <a href="#" onclick="acc()" class="block px-4 py-2 text-gray-700 hover:bg-green-100 hover:text-gray-900" role="menuitem">ACC</a>
                                                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-orange-100 hover:text-gray-900" role="menuitem">Revisi</a>
                                                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-red-300 hover:text-gray-900" role="menuitem">Tolak</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                            <!-- Modal Konfirmasi Logout -->
                            <div id="etnikModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
                                <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

                                <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                                    <!-- Add margin if you want to see some of the overlay behind the modal-->
                                    <div class="modal-content py-4 text-left px-6">
                                        <!--Title-->
                                        <div class="flex justify-between items-center pb-3">
                                            <p class="text-xl font-bold">Masukan Nomor dan Kartu ETNIK</p>
                                            <div class="modal-close cursor-pointer z-50">
                                                <i onclick="accClose()" class="fas fa-times text-gray-500 hover:text-gray-700"></i>
                                            </div>
                                        </div>
                                        <!--Body-->
                                        <?php echo form_open_multipart('acc/' . $data['slug']); ?>
                                        <?= csrf_field() ?>
                                        <div class="mb-4">ACC untuk Kesenian <?= $data['nama_grup'] ?></div>
                                        <div class="mb-4">
                                            <input type="text" id="etnik" name="etnik" class="border-2 border-gray-300 rounded-lg px-4 py-2 w-full focus:outline-none text-center focus:border-orange-500" placeholder="Masukan ETNIK">
                                        </div>
                                        <div class="mb-4 flex  text-gray-700 cursor-pointer">
                                            <label for="file_etnik" class="border-2 border-gray-300 rounded-tl-lg rounded-bl-lg px-3 py-2 w-full focus:outline-none focus:border-orange-500 cursor-pointer">Masukan Kartu(.pdf) <i class="fas fa-address-card"></i></label>
                                            <label for="file_etnik" id="nama_dokumen" class="border-2 border-gray-300 rounded-tr-lg rounded-br-lg px-3 py-2 w-full focus:outline-none focus:border-orange-500 bg-orange-500 hover:bg-orange-400">Pilih File</label>
                                            <input type="file" id="file_etnik" name="file_etnik" accept=".pdf" class="hidden">
                                        </div>
                                        <div class="mb-4 flex justify-between items-center">
                                            <div class="mx-auto">

                                                <button type="submit" class="bg-orange-500 text-white px-5 md:px-10 py-2 rounded-lg hover:bg-orange-400 focus:outline-none">Simpan</button>
                                                <button type="button" onclick="accClose()" class="bg-teal-500 text-white px-5 md:px-10 py-2 rounded-lg hover:bg-teal-400 focus:outline-none">Batal</button>
                                            </div>
                                        </div>
                                        <?php echo form_close(); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="py-6"></div>

            </div>
        </div>

        <script>
            const dokumen = document.getElementById('nama_dokumen');
            const inputDokumen = document.getElementById('file_etnik');

            inputDokumen.addEventListener("change", function() {
                const fileName = this.value.split('\\').pop();
                let potonganNama;

                if (fileName.length > 10) {
                    const namaFileTanpaEkstensi = fileName.slice(0, 8) + '..';
                    const ekstensi = fileName.split('.').pop();
                    potonganNama = namaFileTanpaEkstensi + '.' + ekstensi;
                } else {
                    potonganNama = fileName;
                }

                dokumen.textContent = potonganNama;
            });
        </script>


        <script>
            // Fungsi untuk membuka modal
            function acc() {
                var modal = document.getElementById('etnikModal');
                modal.classList.remove('hidden');
            }
            // Fungsi untuk menutup modal
            function accClose() {
                var modal = document.getElementById('etnikModal');
                modal.classList.add('hidden');
            }
        </script>
        <script>
            var dd = document.getElementById('dropdown');
            document.addEventListener("DOMContentLoaded", function() {
                // Temukan semua tombol "Opsi"
                const opsiButtons = document.querySelectorAll('[data-id]');

                // Tambahkan event listener untuk setiap tombol "Opsi"
                opsiButtons.forEach(function(button) {
                    button.addEventListener("click", function() {
                        // Temukan dropdown menu yang terkait
                        const dropdownMenu = this.nextElementSibling;

                        // Toggle tampilan dropdown menu
                        dropdownMenu.classList.toggle("hidden");

                    });
                });

                // Tutup dropdown menu saat klik di luar dropdown
                document.addEventListener("click", function(event) {
                    if (!event.target.matches('[data-id]')) {
                        const dropdowns = document.querySelectorAll('.origin-top-right');
                        dropdowns.forEach(function(dropdown) {
                            dropdown.classList.add("hidden");
                        });
                    }
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                $('#myTable').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'csv', 'excel', 'pdf', 'print'
                    ]
                });
            });
        </script>
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
        <!-- end content here -->
        <?php $this->endSection(); ?>