<?php

namespace Database\Seeders;

use App\Models\DesaKelurahan;
use App\Models\JenisLayanan;
use App\Models\Kecamatan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => intval((microtime(true) * 10000)),
            'name' => 'Admin Aplikasi',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin'),
            'role' => '1',
        ]);

        User::create([
            'id' => intval((microtime(true) * 10000)),
            'name' => 'Test User',
            'email' => 'test@mail.com',
            'password' => bcrypt('123'),
            'role' => '2',
        ]);

        $syaratbpjskis = [
            '1' => 'FC KTP/Identitas',
            '2' => 'FC KK',
            '3' => 'Surat SKTM',
            '4' => 'Surat SPTJM Kades/Lurah Materai 10.000',
            '5' => 'Foto rumah (atap, lantai, dinding)',
            '6' => 'Surat keterangan sakit dari faskes'
        ];

        JenisLayanan::create([
            'id' => intval((microtime(true) * 25000)),
            'nama_layanan' => 'BPJS/KIS',
            'syarat' => json_encode($syaratbpjskis),
            'status' => 'show'
        ]);

        $syaratbop = [
            '1' => 'FC KK',
            '2' => 'FC KTP',
            '3' => 'Surat permohonan bantuan operasional perawatan dari desa/kelurahan ditujukan kepada bupati batang Cq. Kepala dinas sosial kab. Batang',
            '4' => 'SKTM dari desa/kelurahan',
            '5' => 'Foto rumah',
            '6' => 'Foto orang sakit',
            '7' => 'Surat keterangan rawat inap dari rumah sakit (kelas III)'
        ];

        JenisLayanan::create([
            'id' => intval((microtime(true) * 25000)),
            'nama_layanan' => 'Bantuan Operasional Perawatan',
            'syarat' => json_encode($syaratbop),
            'status' => 'show'
        ]);

        $syaratkip = [
            '1' => 'FC Kartu siswa',
            '2' => 'FC Akta kelahiran',
            '3' => 'FC KK',
            '4' => 'Ijazah terakhir', 
        ];

        JenisLayanan::create([
            'id' => intval((microtime(true) * 25000)),
            'nama_layanan' => 'KIP',
            'syarat' => json_encode($syaratkip),
            'status' => 'show'
        ]);

        $syaratyatimpiatu = [
            '1' => 'FC KTP / KIA',
            '2' => 'FC KK',
            '3' => 'Foto Rumah',
        ];

        JenisLayanan::create([
            'id' => intval((microtime(true) * 25000)),
            'nama_layanan' => 'Yatim Piatu',
            'syarat' => json_encode($syaratyatimpiatu),
            'status' => 'show'
        ]);

        // kecamatan limpung
        Kecamatan::create([
            'id' => 25599378766161,
            'nama_kecamatan' => "Limpung",
        ]);

        DesaKelurahan::create([
            'id' => intval((microtime(true) * 10000)),
            'kec_id' => 25599378766161,
            'nama_dk' => 'Amongrogo',
        ]);

        DesaKelurahan::create([
            'id' => intval((microtime(true) * 10000)),
            'kec_id' => 25599378766161,
            'nama_dk' => 'Babadan',
        ]);

        DesaKelurahan::create([
            'id' => intval((microtime(true) * 10000)),
            'kec_id' => 25599378766161,
            'nama_dk' => 'Dlisen',
        ]);

        DesaKelurahan::create([
            'id' => intval((microtime(true) * 10000)),
            'kec_id' => 25599378766161,
            'nama_dk' => 'Donorejo',
        ]);

        DesaKelurahan::create([
            'id' => intval((microtime(true) * 10000)),
            'kec_id' => 25599378766161,
            'nama_dk' => 'Kalisalak',
        ]);

        DesaKelurahan::create([
            'id' => intval((microtime(true) * 10000)),
            'kec_id' => 25599378766161,
            'nama_dk' => 'Kepuh',
        ]);


        DesaKelurahan::create([
            'id' => 17066252749964,
            'kec_id' => 25599378766161,
            'nama_dk' => 'Limpung',
        ]);

        // kecamatan pecalungan
        Kecamatan::create([
            'id' => 25599378766211,
            'nama_kecamatan' => "Pecalungan",
        ]);

        DesaKelurahan::create([
            'id' => intval((microtime(true) * 10000)),
            'kec_id' => 25599378766211,
            'nama_dk' => 'Bandung',
        ]);

        DesaKelurahan::create([
            'id' => intval((microtime(true) * 10000)),
            'kec_id' => 25599378766211,
            'nama_dk' => 'Gemuh',
        ]);

        DesaKelurahan::create([
            'id' => intval((microtime(true) * 10000)),
            'kec_id' => 25599378766211,
            'nama_dk' => 'Gombong',
        ]);

        DesaKelurahan::create([
            'id' => intval((microtime(true) * 10000)),
            'kec_id' => 25599378766211,
            'nama_dk' => 'Gumawang',
        ]);

        DesaKelurahan::create([
            'id' => intval((microtime(true) * 10000)),
            'kec_id' => 25599378766211,
            'nama_dk' => 'Keniten',
        ]);



        // kecamatan bandar
        Kecamatan::create([
            'id' => 25599378766248,
            'nama_kecamatan' => "Bandar",
        ]);

        DesaKelurahan::create([
            'id' => intval((microtime(true) * 10000)),
            'kec_id' => 25599378766248,
            'nama_dk' => 'Bandar',
        ]);

        DesaKelurahan::create([
            'id' => intval((microtime(true) * 10000)),
            'kec_id' => 25599378766248,
            'nama_dk' => 'Batiombo',
        ]);

        DesaKelurahan::create([
            'id' => intval((microtime(true) * 10000)),
            'kec_id' => 25599378766248,
            'nama_dk' => 'Binangun',
        ]);


        Kecamatan::create([
            'id' => intval((microtime(true) * 15000)),
            'nama_kecamatan' => "Banyuputih",
        ]);

        Kecamatan::create([
            'id' => intval((microtime(true) * 15000)),
            'nama_kecamatan' => "Batang",
        ]);

        Kecamatan::create([
            'id' => intval((microtime(true) * 15000)),
            'nama_kecamatan' => "Bawang",
        ]);

        Kecamatan::create([
            'id' => intval((microtime(true) * 15000)),
            'nama_kecamatan' => "Blado",
        ]);

        Kecamatan::create([
            'id' => intval((microtime(true) * 15000)),
            'nama_kecamatan' => "Gringsing",
        ]);

        Kecamatan::create([
            'id' => intval((microtime(true) * 15000)),
            'nama_kecamatan' => "Kandeman",
        ]);

        Kecamatan::create([
            'id' => intval((microtime(true) * 15000)),
            'nama_kecamatan' => "Reban",
        ]);

        Kecamatan::create([
            'id' => intval((microtime(true) * 15000)),
            'nama_kecamatan' => "Subah",
        ]);

        Kecamatan::create([
            'id' => intval((microtime(true) * 15000)),
            'nama_kecamatan' => "Tersono",
        ]);

        Kecamatan::create([
            'id' => intval((microtime(true) * 15000)),
            'nama_kecamatan' => "Tulis",
        ]);

        Kecamatan::create([
            'id' => intval((microtime(true) * 15000)),
            'nama_kecamatan' => "Warungasem",
        ]);

        Kecamatan::create([
            'id' => intval((microtime(true) * 15000)),
            'nama_kecamatan' => "Wonotunggal",
        ]);
    }
}
