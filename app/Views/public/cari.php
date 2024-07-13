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
                            <input type="text" id="search" name="search" class="border-2 border-gray-300 rounded-lg px-4 py-2 w-full focus:outline-none focus:border-orange-500 rounded-br-none rounded-tr-none" placeholder="Cari Kesenian..." required>
                            <button type="submit" class="bg-orange-500 text-white px-5 md:px-10 py-2 rounded-br-lg rounded-tr-lg hover:bg-orange-400 focus:outline-none">Cari</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="border border-gray-200 my-2 mx-6"></div>

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