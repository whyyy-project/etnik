<div class="flex flex-col md:flex-row">
    <div class="bg-gray-800 shadow-xl md:shadow-none h-16 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48">
        <div class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
            <ul class="list-reset flex flex-row md:flex-col py-0 md:py-3 px-1 md:px-2 text-center md:text-left">
                <li class="mr-3 flex-1" id="option">
                    <a href="<?= base_url() ?>" id="<?= $menu == "home" ? "active" : "" ?>" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
                        <i class="fas fa-home pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Beranda</span>
                    </a>
                </li>
                <li class="mr-3 flex-1" id="option">
                    <a href="<?= base_url() ?>pengajuan-kesenian" id="<?= $menu == "pengajuan" ? "active" : "" ?>" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800">
                        <i class="fa fa-file-import pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Master Pengajuan</span>
                    </a>
                </li>
                <li class="mr-3 flex-1" id="option">
                    <a href="<?= base_url() ?>data-kesenian" id="<?= $menu == "kesenian" ? "active" : "" ?>" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800">
                        <i class="fas fa-table pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 block md:text-gray-400 md:inline-block">Master Kesenian</span>
                    </a>
                </li>
                <li class="mr-3 flex-1" id="option">
                    <a href="<?= base_url() ?>akun-admin" id="<?= $menu == "akun" ? "active" : "" ?>" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800">
                        <i class="fa fa-users pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 block md:inline-block">Setting Profil</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>