<?php $this->extend('template/template-admin') ?>
<?php $this->section('content-admin')  ?>

<!-- datatables -->
<<script src="https://code.jquery.com/jquery-3.6.0.min.js">
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <!-- end datatables -->

    <!-- body, footer -->
    <div class="main-content flex-1 bg-gray-100 mt-20 md:mt-2">
        <div class=" bg-gray-800 pt-3">
            <div class="rounded-tl-3xl bg-gradient-to-r from-cyan-700 to-gray-800 p-4 shadow text-2xl text-white">
                <h3 class="font-bold pl-2 text-base md:text-xl"><span class="text-orange-500">Admin</span> | Data <span class="text-orange-500">Kesenian</span></h3>
            </div>
        </div>
        <!-- content here -->
        <div class="p-3 md:px-5 mx-2 mb:mx-1">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="px-4 py-3">
                    <h1 class="text-2xl font-bold text-gray-800 text-base md:text-lg">Master Data <span class="text-orange-500"> Kesenian</span></h1>
                    <div class="border border-gray-200 m-2"></div>
                    <div id="button-container">
                        <!-- Tombol unduhan akan ditampilkan di sini -->
                    </div>

                    <table id="myTable" class="display" style="width:100%">
                        <thead class="mt-3 bg-gradient-to-r from-cyan-700 to-gray-800 text-sm shadow text-white">
                            <tr>
                                <th>No.</th>
                                <th>Jenis Seni</th>
                                <th>Nama Kesenian</th>
                                <th>Nama Pimpinan</th>
                                <th>Alamat</th>
                                <th>Anggota</th>
                                <th>Masa Aktif</th>
                                <th>Admin</th>

                                <th>Berkas</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            $i = 1;
                            foreach ($kesenian as $data) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $data['jenis_seni'] ?></td>
                                    <td><?= $data['nama_grup'] ?></td>
                                    <td><?= $data['nama_pelaku_seni'] ?></td>
                                    <td><?= $data['alamat'] ?> | RT/RW <?= $data['rt_rw'] ?>, Desa <?= $data['desa'] ?>, Kec. <?= $data['kecamatan'] ?>, Kab. <?= $data['kabupaten'] ?></td>
                                    <td><?= $data['jumlah_anggota'] ?></td>
                                    <td>
                                        <?php
                                        $tanggal = $data['created_at'];
                                        $timestamp = strtotime($tanggal); // Mengonversi string tanggal menjadi timestamp

                                        $thn = date("Y", $timestamp); // Mengambil tahun
                                        $bulan = date("m", $timestamp); // Mengambil bulan
                                        $hari = date("d", $timestamp); // Mengambil hari
                                        ?>
                                        <?= $hari . "/" . $bulan . "/" . $thn+2 ?>
                                    </td>
                                    <td><?= $data['admin_notif']  ?></td>

                                    <td><a href="<?= base_url() ?>zip/<?= $data['slug'] ?>" class="btn-login bg-teal-600 hover:bg-teal-500 text-white">Download</a></td>
                                    <td>
                                        <a href="#" class="btn-login bg-gray-600 hover:bg-gray-500 text-white"> Edit</a>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="py-6"></div>

                </div>
            </div>


            <script>
                $(document).ready(function() {
                    // Inisialisasi DataTables
                    var table = $('#myTable').DataTable({
                        dom: 'Bfrtip',
                        buttons: [{
                                extend: 'csv',
                                className: 'btn-login bg-teal-600 hover:bg-teal-500 text-white',
                                text: 'CSV Export'
                            },
                            {
                                extend: 'excel',
                                className: 'btn-login bg-teal-600 hover:bg-teal-500 text-white',
                                text: 'Excel Export'
                            },
                            {
                                extend: 'pdf',
                                className: 'btn-login bg-teal-600 hover:bg-teal-500 text-white',
                                text: 'PDF Export'
                            },
                            {
                                extend: 'print',
                                className: 'btn-login bg-teal-600 hover:bg-teal-500 text-white',
                                text: 'Print'
                            }
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