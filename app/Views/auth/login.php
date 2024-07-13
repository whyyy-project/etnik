<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>ETNIK | Dinas Kebudayaan dan Pariwisata Bojonegoro</title>
    <meta name="author" content="name" />
    <meta name="description" content="description here" />
    <meta name="keywords" content="keywords,here" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/customStyle.css">

    <!--Replace with your tailwind.css once created-->
    <!-- <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet" /> -->

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/customStyle.css">
    <!--Totally optional :) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="max-w-full max-h-full">
    <div class="loader-container" id="onload">
        <div class="loader"></div>
    </div>
    <?php if ($failed_login >= 3) : ?>
        <div class="flex flex-col bg-gradient-login h-screen justify-center">
            <div class="mx-auto mt-6 text-center">

                <h1 class="text-4xl text-bold">Kesempatan Login Habis!</h1>
                <p class="mt-6">Harap tunggu 5 menit lagi.</p>
            </div>
        </div>
    <?php
        return;
    endif; ?>

    <div class="min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8 px-6 bg-gradient-login">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <img class="mx-auto h-16 w-auto" src="<?= base_url() ?>img/logo2.png" alt="Logo Pinarak Bojonegoro">
            <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">
                Login Admin ETNIK
            </h2>

        </div>
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow rounded-lg sm:px-10">
                <?php if ($failed_login) : ?>
                    <p class="text-red-800 text-bold py-3">
                        Kesempatan Login tinggal <strong><?= 3 - $failed_login ?></strong>
                    </p>
                <?php endif; ?>
                <form action="<?= base_url() ?>" method="post">
                    <?= csrf_field() ?>
                    <div>
                        <label for="Username" class="block text-sm font-medium leading-5  text-gray-700">Username atau Email</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input id="Username" name="username" placeholder="Masukan username atau email" type="text" required="" value="<?= old("username") ?>" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 text-center">
                            <div class=" <?= session('errors') == "unameFail" ? "" : "hidden" ?> absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        <?php if (session('errors') == "unameFail") : ?>
                            <div class="text-red-700 text-sm ml-3">
                                Username atau Password salah!
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mt-3">
                        <label for="Password" class="block text-sm font-medium leading-5  text-gray-700">Password</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input id="Password" name="password" type="password" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 text-center">
                            <div class="<?= session('errors') == "passFail" ? "" : "hidden" ?> <?= session('errors') == "unameFail" ? "" : "hidden" ?> absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        <?php if (session('errors') == "unameFail" || session('errors') == "passFail") : ?>
                            <div class="text-red-700 text-sm">
                                Password salah!
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mt-6">
                        <span class="block w-full rounded-md shadow-sm">
                            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-teal-500 hover:bg-teal-600 focus:outline-none focus:border-orange-600 focus:shadow-outline-orange active:bg-orange-500 transition duration-150 ease-in-out">
                                Sign in
                            </button>
                        </span>
                    </div>
                    <div class="mt-3">
                        <span class="block w-full rounded-md shadow-sm">
                            <a href="<?= base_url() ?>" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-orange-500 hover:bg-orange-400 focus:outline-none focus:border-orange-700 focus:shadow-outline-gray active:translate-y-1 transition duration-150 ease-in-out">
                                Beranda
                            </a>
                        </span>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="<?= base_url() ?>assets/js/loader.js"></script>

</body>

</html>