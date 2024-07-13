<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataKesenianMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'etnik' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'etnik_lama' =>[
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'scan_etnik_lama' =>[
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'nama_grup' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'nama_pelaku_seni' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'jenis_seni' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'alamat' => [
                'type' => 'TEXT',
            ],
            'desa' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'rt_rw' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'kecamatan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'kabupaten' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'provinsi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'jumlah_anggota' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'scan_ktp_ketua' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'scan_ktp_sekertaris' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'telp_ketua' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'telp_sekertaris' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'pas_photo' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'foto_kesenian' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'tahun_berdiri' => [
                'type' => 'VARCHAR',
                'constraint' => 5,
            ],
            'surat_permohonan_nik' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'sertifikat_kemampuan_bidang_keahlian' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'surat_kuasa' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'scan_ktp_kuasa' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'keterangan' => [
                'type' => 'TEXT',
            ],
            'status' => [
                'type' => 'ENUM("pending", "acc", "revisi", "expired")',
                'default' => 'pending',
            ],
            'admin_notif' => [
                'type' => 'TEXT',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('pengajuan');
    }

    public function down()
    {
        $this->forge->dropTable('pengajuan');
    }
}
