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
            'ktp' => 'FC KTP/Identitas',
            'kk' => 'FC KK',
            'sktm' => 'Surat SKTM',
            'surat_sptjm_materai' => 'Surat SPTJM Kades/Lurah Materai 10.000',
            'foto_rumah' => 'Foto rumah (atap, lantai, dinding)',
            'surat_keterangan_sakit' => 'Surat keterangan sakit dari faskes'
        ];

        JenisLayanan::create([
            'jl_id' => intval((microtime(true) * 25000)),
            'nama_layanan' => 'BPJS/KIS',
            'slug' => 'BPJSKIS',
            'syarat' => json_encode($syaratbpjskis),
            'status' => 'show'
        ]);

        $syaratbop = [
            'ktp' => 'FC KK',
            'kk' => 'FC KTP',
            'surat_permohonan' => 'Surat permohonan bantuan operasional perawatan dari desa/kelurahan ditujukan kepada bupati batang Cq. Kepala dinas sosial kab. Batang',
            'sktm' => 'SKTM dari desa/kelurahan',
            'foto_rumah' => 'Foto rumah',
            'foto_pasien' => 'Foto orang sakit',
            'surat_keterangan_rawat_inap' => 'Surat keterangan rawat inap dari rumah sakit (kelas III)'
        ];

        JenisLayanan::create([
            'jl_id' => intval((microtime(true) * 25000)),
            'nama_layanan' => 'Bantuan Operasional Perawatan',
            'slug' => 'BOP',
            'syarat' => json_encode($syaratbop),
            'status' => 'show'
        ]);

        $syaratkip = [
            'kartu_siswa' => 'FC Kartu siswa',
            'akta_kelahiran' => 'FC Akta kelahiran',
            'kk' => 'FC KK',
            'ijazah' => 'Ijazah terakhir', 
        ];

        JenisLayanan::create([
            'jl_id' => intval((microtime(true) * 25000)),
            'nama_layanan' => 'KIP',
            'slug' => 'KIP',
            'syarat' => json_encode($syaratkip),
            'status' => 'show'
        ]);

        $syaratyatimpiatu = [
            'ktp' => 'FC KTP / KIA',
            'kk' => 'FC KK',
            'foto_rumah' => 'Foto Rumah',
        ];

        JenisLayanan::create([
            'jl_id' => intval((microtime(true) * 25000)),
            'nama_layanan' => 'Yatim Piatu',
            'slug' => 'YP',
            'syarat' => json_encode($syaratyatimpiatu),
            'status' => 'show'
        ]);

        // kecamatan limpung
        Kecamatan::create([
            'kec_id' => 25599378766161,
            'nama_kecamatan' => "Limpung",
        ]);

        DesaKelurahan::create([
            'dk_id' => intval((microtime(true) * 10000)),
            'kec_id' => 25599378766161,
            'nama_dk' => 'Amongrogo',
        ]);

        DesaKelurahan::create([
            'dk_id' => intval((microtime(true) * 10000)),
            'kec_id' => 25599378766161,
            'nama_dk' => 'Babadan',
        ]);

        DesaKelurahan::create([
            'dk_id' => intval((microtime(true) * 10000)),
            'kec_id' => 25599378766161,
            'nama_dk' => 'Dlisen',
        ]);

        DesaKelurahan::create([
            'dk_id' => intval((microtime(true) * 10000)),
            'kec_id' => 25599378766161,
            'nama_dk' => 'Donorejo',
        ]);

        DesaKelurahan::create([
            'dk_id' => intval((microtime(true) * 10000)),
            'kec_id' => 25599378766161,
            'nama_dk' => 'Kalisalak',
        ]);

        DesaKelurahan::create([
            'dk_id' => intval((microtime(true) * 10000)),
            'kec_id' => 25599378766161,
            'nama_dk' => 'Kepuh',
        ]);


        DesaKelurahan::create([
            'dk_id' => 17066252749964,
            'kec_id' => 25599378766161,
            'nama_dk' => 'Limpung',
        ]);

        // kecamatan pecalungan
        Kecamatan::create([
            'kec_id' => 25599378766211,
            'nama_kecamatan' => "Pecalungan",
        ]);

        DesaKelurahan::create([
            'dk_id' => intval((microtime(true) * 10000)),
            'kec_id' => 25599378766211,
            'nama_dk' => 'Bandung',
        ]);

        DesaKelurahan::create([
            'dk_id' => intval((microtime(true) * 10000)),
            'kec_id' => 25599378766211,
            'nama_dk' => 'Gemuh',
        ]);

        DesaKelurahan::create([
            'dk_id' => intval((microtime(true) * 10000)),
            'kec_id' => 25599378766211,
            'nama_dk' => 'Gombong',
        ]);

        DesaKelurahan::create([
            'dk_id' => intval((microtime(true) * 10000)),
            'kec_id' => 25599378766211,
            'nama_dk' => 'Gumawang',
        ]);

        DesaKelurahan::create([
            'dk_id' => intval((microtime(true) * 10000)),
            'kec_id' => 25599378766211,
            'nama_dk' => 'Keniten',
        ]);



        // kecamatan bandar
        Kecamatan::create([
            'kec_id' => 25599378766248,
            'nama_kecamatan' => "Bandar",
        ]);

        DesaKelurahan::create([
            'dk_id' => intval((microtime(true) * 10000)),
            'kec_id' => 25599378766248,
            'nama_dk' => 'Bandar',
        ]);

        DesaKelurahan::create([
            'dk_id' => intval((microtime(true) * 10000)),
            'kec_id' => 25599378766248,
            'nama_dk' => 'Batiombo',
        ]);

        DesaKelurahan::create([
            'dk_id' => intval((microtime(true) * 10000)),
            'kec_id' => 25599378766248,
            'nama_dk' => 'Binangun',
        ]);


        Kecamatan::create([
            'kec_id' => intval((microtime(true) * 15000)),
            'nama_kecamatan' => "Banyuputih",
        ]);

        Kecamatan::create([
            'kec_id' => intval((microtime(true) * 15000)),
            'nama_kecamatan' => "Batang",
        ]);

        Kecamatan::create([
            'kec_id' => intval((microtime(true) * 15000)),
            'nama_kecamatan' => "Bawang",
        ]);

        Kecamatan::create([
            'kec_id' => intval((microtime(true) * 15000)),
            'nama_kecamatan' => "Blado",
        ]);

        Kecamatan::create([
            'kec_id' => intval((microtime(true) * 15000)),
            'nama_kecamatan' => "Gringsing",
        ]);

        Kecamatan::create([
            'kec_id' => intval((microtime(true) * 15000)),
            'nama_kecamatan' => "Kandeman",
        ]);

        Kecamatan::create([
            'kec_id' => intval((microtime(true) * 15000)),
            'nama_kecamatan' => "Reban",
        ]);

        Kecamatan::create([
            'kec_id' => intval((microtime(true) * 15000)),
            'nama_kecamatan' => "Subah",
        ]);

        Kecamatan::create([
            'kec_id' => intval((microtime(true) * 15000)),
            'nama_kecamatan' => "Tersono",
        ]);

        Kecamatan::create([
            'kec_id' => intval((microtime(true) * 15000)),
            'nama_kecamatan' => "Tulis",
        ]);

        Kecamatan::create([
            'kec_id' => intval((microtime(true) * 15000)),
            'nama_kecamatan' => "Warungasem",
        ]);

        Kecamatan::create([
            'kec_id' => intval((microtime(true) * 15000)),
            'nama_kecamatan' => "Wonotunggal",
        ]);
    }
}
