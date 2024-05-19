<?php

namespace Database\Seeders;

use App\Models\Alternatif;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Alternatif::insert([
            [
                'kode' => 'A1',
                'alternatif' => 'Jadi Ketua Dewan Pakar TPN Ganjar-Mahfud, Sandiaga Uno Akan Cuti'
            ],
            [
                'kode' => 'A2',
                'alternatif' => 'Selamat! Pemkot Malang Raih Penghargaan Indonesia Visionary Leader 2023'
            ],
            [
                'kode' => 'A3',
                'alternatif' => 'Dua Tahun Buron, Terpidana Korupsi Dana KUR Rp 1 Miliar Ditangkap di Probolinggo'
            ],
            [
                'kode' => 'A4',
                'alternatif' => 'Rutin Naik Tangga, Tips Sederhana Menjaga Jantung Tetap Sehat'
            ],
            [
                'kode' => 'A5',
                'alternatif' => '5 Tanda WhatsApp Anda Dipantau Orang Lain dan Cara Mengamankannya'
            ],
            [
                'kode' => 'A6',
                'alternatif' => 'Disney Ajak Penggemar Bernostalgia Lewat Film Pendek Once Upon A Studio'
            ],
            [
                'kode' => 'A7',
                'alternatif' => 'Pasca Cek Kesehatan, Prabowo: Saya Agak Was-Was'
            ],
            [
                'kode' => 'A8',
                'alternatif' => 'Ketua DPP: Keanggotaan Gibran di PDI Perjuangan Telah Berakhir'
            ],
            [
                'kode' => 'A9',
                'alternatif' => 'Penembakan Masal di Lewiston Telan 22 Korban Jiwa dan Puluhan Lain Luka-luka'
            ],
            [
                'kode' => 'A10',
                'alternatif' => 'Viral, Hujan Es Terjadi di Kota Malang'
            ],
            [
                'kode' => 'A11',
                'alternatif' => 'Harga Beras dan Bahan Pokok Meningkat di Madiun, Jawa Timur'
            ],
            [
                'kode' => 'A12',
                'alternatif' => 'D-8 Desak Pemberian Bantuan Kemanusiaan untuk Palestina: Respons Terhadap Krisis di Gaza'
            ],
            [
                'kode' => 'A13',
                'alternatif' => 'Ini Perbedaan Demam Tifoid dengan Demam Biasa'
            ],
            [
                'kode' => 'A14',
                'alternatif' => 'Program KIS Lansia dan Dana Abadi Pesantren, Sri Mulyani: Sudah Tercover dalam APBN 2024'
            ],
            [
                'kode' => 'A15',
                'alternatif' => 'Soal Pendaftaran Cawapres Gibran, Ibu Negara Iriana Lambaikan Tangan'
            ],
            [
                'kode' => 'A16',
                'alternatif' => 'Cacar Monyet Bisa Tembus 3.600 Kasus, Pemerintah Siapkan Vaksin'
            ],
            [
                'kode' => 'A17',
                'alternatif' => 'Soal Keanggotaan di PDIP, Gibran: Pernyataan Mbak Puan Jelas'
            ],
            [
                'kode' => 'A18',
                'alternatif' => 'Festival Banjar Budaya Desa Sumerta Kelod Penguat Sinergi Antar Masyarakat di Denpasar'
            ],
            [
                'kode' => 'A19',
                'alternatif' => 'Dukung Pendidikan Vokasi, Politeknik Negeri Bali Beri Penghargaan ke Bappeda Provinsi Bali'
            ],
            [
                'kode' => 'A20',
                'alternatif' => 'Madrasah di Era Digital: Transformasi Menuju Pendidikan Holistik dan Adaptif'
            ],
        ]);
    }
}
