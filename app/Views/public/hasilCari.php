<?php $this->extend('template/template-public') ?>
<?php $this->section('content-public')  ?>

<!-- body, footer -->
<div class="main-content flex-1 bg-gray-100 mt-20 md:mt-2">
    <div class=" bg-gray-800 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-cyan-700 to-gray-800 p-4 shadow text-2xl text-white">
            <h3 class="font-bold pl-2 text-base md:text-xl"><span class="text-orange-500">Cari </span><span class="text-orange-500">K</span>esenian</h3>
        </div>
    </div>
    <!-- content here -->
    <div class="p-3 md:px-5 pb-0 mx-2 mb:mx-1">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="px-4 py-3">
                <h1 class="text-2xl font-bold text-gray-800 text-base md:text-lg">Cari <span class="text-orange-500"> Kesenian</span></h1>

                <div class="border border-gray-200 m-2"></div>

                <div class="px-4">
                    <h1 class="text-lg  font-semibold text-gray-800 mb-4">Pencarian</h1>
                    <form action="<?= base_url() ?>hasil-pencarian#hasil" method="get">
                        <div class="mb-4 flex">
                            <input type="text" id="search" name="search" class="border-2 border-gray-300 rounded-lg px-4 py-2 w-full focus:outline-none focus:border-orange-500 rounded-br-none rounded-tr-none" placeholder="Cari Kesenian..." value="<?= $cari != null ? $cari : '' ?>" required>
                            <button type="submit" class="bg-orange-500 text-white px-5 md:px-10 py-2 rounded-br-lg rounded-tr-lg hover:bg-orange-400 focus:outline-none">Cari</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="border border-gray-200 my-1 mx-6"></div>

            <div class="px-4 py-3">
                <div class="px-4">
                    <h1 class="text-lg font-semibold text-gray-800 mb-4">Berdasarkan Desa</h1>
                    <form action="<?= base_url() ?>hasil-pencarian" method="get">
                        <div class="mb-4 flex">
                            <div class="relative w-full">
                                <!-- Dropdown Kecamatan -->
                                <select required id="kecamatan" name="kecamatan" class="border-2 border-gray-300 rounded-lg px-4 py-2 w-full focus:outline-none focus:border-orange-500 text-center rounded-br-none rounded-tr-none">
                                    <option value="">Kecamatan</option>
                                    <?php foreach ($kecamatan as $kec) : ?>
                                        <option value="<?= ucfirst($kec['kecamatan']) ?>"><?= ucfirst($kec['kecamatan']) ?></option>
                                    <?php endforeach; ?>
                                </select>

                            </div>
                            <div class="relative w-full">

                                <!-- Dropdown Desa -->
                                <select required id="desa" name="desa" disabled class="border-2 border-gray-300 rounded-lg px-4 py-2 w-full focus:outline-none focus:border-orange-500 text-center rounded-none">
                                    <option value="">Desa</option>
                                </select>
                            </div>
                            <button type="submit" class="bg-orange-500 text-white px-5 md:px-10 py-2 rounded-br-lg rounded-tr-lg hover:bg-orange-400 focus:outline-none">Cari</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>

    <div class="bg-white shadow-lg rounded-lg mt-3 mx-7 pb-5 overflow-hidden">
        <h1 class="text-2xl font-bold text-gray-800 ml-4 mt-3 text-base md:text-lg">Hasil <span class="text-orange-500"> Pencarian</span> <span class="text-grey-700 text-sm italic"> (<?= $total ?>)</span></h1>
        <div class="border border-gray-200 m-4"></div>
        <!-- card hasil cari -->
        <div class="flex flex-wrap mx-3">
            <?php if ($total == 0) : ?>

                <h1 class="text-4xl mx-auto my-3 text-center">Data Kosong</h1>
            <?php endif; ?>
            <!-- Tampilan Pagination -->
            <?php foreach ($hasilCari as $data) : ?>
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
                <a href="<?= base_url('hasil-pencarian?search=' . $keyword . '&page=' . ($currentPage - 1)) ?>#hasil" class="text-gray-600 text-sm md:text-base py-2 px-3 hidden md:block">
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
                    echo '<a href="' . base_url('hasil-pencarian?search=' . $keyword . '&page=1') . '" class="text-gray-60#hasil0 text-sm md:text-base py-2 px-3">1</a>';
                    echo '<span class="text-gray-600 text-sm md:text-base py-2 px-3">...</span>';
                }

                for ($i = $startPage; $i <= $endPage; $i++) {
                    $isActive = $currentPage == $i ? 'bg-gray-300' : '';
                    echo '<a href="' . base_url('hasil-pencarian?search=' . $keyword . '&page=' . $i) . '#hasil" class="text-gray-600 text-sm md:text-base py-2 px-3 ' . $isActive . '">' . $i . '</a>';
                }

                if ($endPage < $totalPages) {
                    echo '<span class="text-gray-600 text-sm md:text-base py-2 px-3">...</span>';
                    echo '<a href="' . base_url('hasil-pencarian?search=' . $keyword . '&page=' . $totalPages) . '#hasil" class="text-gray-600 text-sm md:text-base py-2 px-3">' . $totalPages . '</a>';
                }
                ?>
            </div>

            <?php if ($currentPage < $totalPages) : ?>
                <a href="<?= base_url('hasil-pencarian?search=' . $keyword . '&page=' . ($currentPage + 1)) ?>#hasil" class="text-gray-600 text-sm md:text-base py-2 px-3 hidden md:block">
                    Berikutnya <i class="fas fa-arrow-right"></i>
                </a>
            <?php endif; ?>
        </div>
    </div>
    <!-- end pagination -->
    <!-- end content here -->

    <script>
        document.getElementById('kecamatan').addEventListener('change', function() {
            const selectedKecamatanId = this.value.toLowerCase();
            const desaSelect = document.getElementById('desa');

            function ucfirst(UCFIRST) {
                return UCFIRST.charAt(0).toUpperCase() + UCFIRST.slice(1).toLowerCase();
            }
            // Hapus opsi desa yang ada
            desaSelect.innerHTML = '<option value="">Pilih Desa</option>';

            if (selectedKecamatanId) {
                // Tambahkan opsi desa berdasarkan kecamatan yang dipilih
                const desaOptions = <?= json_encode($desa) ?>;
                desaOptions.forEach(desa => {
                    if (desa.kecamatan == selectedKecamatanId) {
                        desaSelect.innerHTML += `<option value="${ucfirst(desa.desa)}">${ucfirst(desa.desa)}</option>`;
                    }
                });

                // Aktifkan pilihan desa
                desaSelect.removeAttribute('disabled');
            } else {
                // Kecamatan tidak dipilih, nonaktifkan pilihan desa
                desaSelect.setAttribute('disabled', 'true');
            }
        });
    </script>

    <?php $this->endSection(); ?>