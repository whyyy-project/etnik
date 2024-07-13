<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>404 - Not Found</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arvo', serif;
            background: #fff;
            overflow: hidden;
            background-color: black;
        }

        .page_404 {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            /* background-image: url(https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif); */
            background-image: url('<?= base_url() ?>/img/thengul.gif');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }

        .four_zero_four_content {
            text-align: center;
            /* color: #fff; */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }


        h1 {
            font-size: 60px;
            display: block;
            margin: 0;
            color: #fff;
        }

        .four_zero_four_content h3 {
            font-size: 30px;
            margin: 0;
            margin-bottom: 27rem;
            color: #fff;
        }

        .four_zero_four_content p {
            font-size: 20px;
            margin: 0;
            color: #fff;
        }

        .link_404 {
            background-color: rgb(0, 202, 147);
            margin-top: 5px;
            color: black;
            /* Warna saat tidak dihover */
            transition: color 0.3s, background-color 0.3s;
            /* Efek transisi saat hover */
            text-decoration: none;
            padding: 10px 20px;
            display: inline-block;
            margin-bottom: 0.1rem;
            border-radius: 10px;
        }

        .link_404:hover {
            background-color: rgb(0, 230, 147);
            transform: translateY(2px);
        }
    </style>
</head>

<body>
    <section class="page_404">
        <div class="four_zero_four_content">
            <div class="text-center">
                <h1>404</h1>
                <h3>Halaman Tidak Ditemukan!</h3>
            </div>
            <p>
                <?php if (ENVIRONMENT !== 'production') : ?>
                    <?= nl2br(esc($message)) ?>
                <?php else : ?>
                    Maaf halaman yang kamu cari tidak ada.
                <?php endif ?>
            </p>
            <a href="<?= base_url() ?>" class="link_404">Balik Yuukkk..</a>
        </div>
    </section>
</body>

</html>