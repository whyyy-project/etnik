    <!--Nav-->
    <nav class="bg-gray-800 pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0">
        <div class="flex flex-wrap items-center">
            <div class="flex flex-shrink md:w-1/3 justify-center md:justify-start text-white">
                <a href="<?= base_url() ?>">
                    <!-- <span class="text-xl pl-2"><i class="em em-grinning"></i></span> -->
                    <?php if (!session('isLoggedIn')) : ?>
                        <img class="w-8 h-12 md:hidden" src="<?= base_url() ?>img/logo1.png" loading="lazy" alt="Logo Pinarak Bojonegoro">
                        <img class="ml-5 h-12 hidden md:block" src="<?= base_url() ?>img/logo2.png" loading="lazy" alt="Logo Pinarak Bojonegoro">
                    <?php endif; ?>
                    <?php if (session('isLoggedIn')) : ?>
                        <img class="ml-5 h-12 md:block" src="<?= base_url() ?>img/logo2.png" loading="lazy" alt="Logo Pinarak Bojonegoro">
                    <?php endif; ?>
                </a>
            </div>
            <div class="flex flex-1 md:w-1/3 justify-center md:justify-start text-white px-2">
                <?php if (!session('isLoggedIn')) : ?>
                    <span class="relative w-full  mt-1 md:mb-1">
                        <form action="<?= base_url() ?>hasil-pencarian#hasil" method="get">
                            <input type="search" id="search" name="search" placeholder="Cari Kesenian.." class="w-full bg-gray-900 text-white transition border border-transparent focus:outline-none focus:border-gray-400 rounded py-3 px-2 pl-10 appearance-none leading-normal" value="<?= isset($cari) != null ? $cari : '' ?>" required/>
                            <div class="absolute search-icon" style="top: 1rem; left: 0.8rem">
                                <svg class="fill-current pointer-events-none text-white w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
                                </svg>
                            </div>
                        </form>
                    </span>
                <?php endif; ?>
            </div>
            <div class="flex w-full  content-center justify-between md:w-1/3 md:justify-end">
                <ul class="list-reset flex justify-between flex-1 md:flex-none items-center text-white">
                    <li class="flex-1 md:flex-none md:mr-3">
                        <a class="inline-block no-underline hover:text-gray-300 hover:text-underline py-2 px-4" href="https://dinbudpar.bojonegorokab.go.id/" target="_blank">Web Dinas</a>
                    </li>
                    <li class="flex-1 md:flex-none md:mr-3">
                        <a class="inline-block no-underline hover:text-gray-300 hover:text-underline py-2 px-4" href="https://wisatabojonegoro.com/" target="_blank">Wisata Bojonegoro</a>
                    </li>
                    <li class="flex-1 md:flex-none md:mr-3 mr-2 text-right">
                        <?php if (!session('isLoggedIn')) : ?>
                            <div class="inline-block no-underline hover:text-gray-300 hover:text-underline">
                                <a href="<?= base_url() ?>login" class="btn-login bg-orange-500 hover:bg-orange-400">Login</a>
                            </div>
                        <?php endif; ?>
                        <?php if (session('isLoggedIn')) : ?>
                            <?php
                            $namaLengkap = session('nama');
                            $karakter = strlen($namaLengkap);
                            if ($karakter >= 9) {
                                $namaLengkap =  substr(session('nama'), 0, 7) . "..";
                            }
                            ?>
                            <div class="relative inline-block">
                                <button title="<?= session('nama') ?>" onclick="toggleDD('myDropdown')" class="drop-button text-white focus:outline-none">
                                    <span class="pr-2"><i class="em em-robot_face"></i></span> <?= $namaLengkap ?>
                                    <svg class="h-3 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </button>
                                <div id="myDropdown" class="dropdownlist absolute bg-gray-800 text-white right-0 mt-3 p-1 overflow-auto z-30 invisible">
                                    <a href="#" class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block flex items-center"><i class="fa fa-user fa-fw pr-2"></i> Profile</a>
                                    <a href="#" class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block flex items-center"><i class="fa fa-cog fa-fw pr-2"></i> Settings</a>
                                    <div class="border border-gray-800"></div>
                                    <a href="#" onclick="logoutModal()" class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block flex items-center"><i class="fas fa-sign-out-alt fa-fw pr-2"></i> Logout</a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>