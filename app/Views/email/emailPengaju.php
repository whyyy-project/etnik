<body style=" background-color: #eeeeee;">

  <div style="margin:0;padding:0;">
    <table width="100%" height="100%" style="min-width:348px" border="0" cellspacing="0" cellpadding="0" lang="en">
      <tbody>
        <tr height="32" style="height:32px">
          <td></td>
        </tr>
        <tr align="center">
          <td>
            <div>
              <div></div>
            </div>
            <table border="0" cellspacing="0" cellpadding="0" style="padding-bottom:20px;max-width:516px;min-width:220px; ">
              <tbody>
                <tr>
                  <td width="8" style="width:8px"></td>
                  <td>
                    <div style="background-color:#ffebd8;direction:ltr;padding:16px;margin-bottom:6px">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                          <tr>
                            <td style="vertical-align:top"><img height="20" src="http://wisatabojonegoro.com/wp-content/uploads/2021/06/logo-B.png"></td>
                            <td width="13" style="width:13px"></td>
                            <td style="direction:ltr"><span style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:13px;color:rgba(0,0,0,0.87);line-height:1.6;color:rgba(0,0,0,0.54)">Ini adalah konfirmasi bahwa kami telah menerima pendaftaran Anda untuk <?= $kesenian ?> <a href="<?= base_url() ?>" style="text-decoration:none;color:rgba(9, 219, 219, 0.87)"> ETNIK Bojonegoro.</a> dengan menggunakan alamat email:<a style="text-decoration:none;color:rgba(0,0,0,0.87)"><?= $email ?></a>. Harap pastikan bahwa Anda telah sengaja melakukan pendaftaran ini. Jika Anda tidak merasa melakukan pendaftaran atau ini adalah kesalahan, silakan abaikan email ini.</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div style="border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px;padding:40px 20px; background-color: #ffffff;" align="center" class="m_-4346779005279529863mdv2rw"><img src="http://wisatabojonegoro.com/wp-content/uploads/2019/02/logo-pinarak-bojonegoro-Disbudpar-Bojonegoro-1.png" width="30%" aria-hidden="true" style="margin-bottom:16px" alt="Google" class="CToWUd" data-bit="iit">
                      <div style="font-family:'Google Sans',Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-bottom:thin solid #dadce0;color:rgba(0,0,0,0.87);line-height:32px;padding-bottom:24px;text-align:center;word-break:break-word">
                        <?php if ($status == 'mendaftar') : ?>
                          <div style="font-size:24px">Selamat Pengajuan ETNIK anda berhasil</div>
                        <?php endif; ?>
                        <?php if ($status == 'acc') : ?>
                          <div style="font-size:24px">Selamat Pengajuan ETNIK anda telah di <strong style="color:green;">Setujui</strong> Admin.</div>
                        <?php endif; ?>
                        <table align="center" style="margin-top:8px">
                          <tbody>
                            <tr style="line-height:normal">
                              <td align="left" style="padding-right:8px">
                                <p style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;">Kepada : <?= $pimpinan ?></p>
                              </td>
                            </tr>
                            <tr align="center" style="text-align:center;">
                              <?php if ($status == 'mendaftar') : ?>
                                <td>
                                  Selamat, pendaftaran Anda untuk ETNIK (Elektronik Nomor Induk Kesenian) Bojonegoro telah berhasil. Kami akan segera memproses data Anda dan Anda akan menerima notifikasi selanjutnya dari <span style="color:#ce4e05">Sistem Admin.</span>
                                </td>
                              <?php endif; ?>
                              <?php if ($status == 'acc') : ?>
                                <td>
                                  Selamat, pendaftaran Anda untuk kesenian <?= $kesenian ?> di ETNIK Bojonegoro telah di <strong>setujui.</strong> Harap anda melihat detail Kesenian anda di <a href="<?= base_url() ?><?= $link ?>">detail <?= $kesenian ?></a>
                                </td>
                              <?php endif; ?>
                            </tr>
                          </tbody>
                        </table>
                        <?php if ($status == 'acc') : ?>
                          <div style="text-align: center; margin-top: 1rem; margin-bottom: 1rem;">
                            <a style="display: inline-block; padding: 3px 17px; border-radius: 25px; text-decoration: none; text-align: center; transition: transform 0.2s, box-shadow 0.2s; background-color: #047857; color: #fff;" href="<?= base_url() ?><?= $link_etnik ?>">Download ETNIK ANDA</a>
                          <?php endif; ?>
                          </div>

                      </div>
                      <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:15px;text-align:center">
                        Terima kasih atas partisipasi Anda dalam mendukung upaya Pemerintah Kabupaten Bojonegoro dalam meningkatkan pelayanan publik di bidang pariwisata dan kebudayaan, yang didukung oleh Dinas Pariwisata dan Kebudayaan Bojonegoro.
                      </div>
                      <div style="padding-top:20px;font-size:12px;line-height:16px;color:#5f6368;letter-spacing:0.3px;text-align:center">Jika Anda memiliki pertanyaan atau kebutuhan bantuan, jangan ragu untuk menghubungi kami melalui email <a href="mailto:disbudpar@bojonegorokab.go.id" target="_blank" rel="noopener noreferrer">disbudpar@bojonegorokab.go.id</a>
                      </div>
                      <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:25px;text-align:left">
                        Salam hormat,
                        <br><br><br>
                        [Tim ETNIK Bojonegoro]
                      </div>
                    </div>
                  </td>
                  <td width="8" style="width:8px"></td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr height="32" style="height:32px">
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>

  </b>