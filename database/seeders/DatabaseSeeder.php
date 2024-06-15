<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([[
            "nama"  => "admin",
            "no_wa" => "6284134353122",
            "email" => "admin@gmail.com",
            "password" => Hash::make("admin"),
            "role" => "admin",
          ],[
            "nama"  => "anas",
            "no_wa" => "6283847086323",
            "email" => "anas@gmail.com",
            "password" => Hash::make("anas"),
            "role" => "customer",
          ]]);

        DB::table('produks')->insert([[
            "nama_produk"  => "Netflix",
            "deskripsi"  => "Kualitas Tinggi: Netflix Premium memberikan akses ke film dan acara TV dengan gambar dan suara terbaik dan resolusi Ultra HD 4K membuat pengalaman menonton lebih seru; Tanpa Iklan: Anda bisa menonton tanpa iklan yang mengganggu, jadi bisa fokus menikmati konten kesukaan; Dukungan Bahasa: Netflix mendukung berbagai bahasa dan menyediakan subtitle, sehingga pengguna dari berbagai negara bisa menikmati konten dengan lebih nyaman dan paham; Fitur Tambahan: Netflix Premium punya fitur tambahan seperti pengaturan profil keluarga, bisa mengunduh konten untuk ditonton tanpa internet, dan bisa nonton bersamaan di beberapa perangkat ",
            "gambar1"  => "netflix.jpg",
            "gambar2"  => "netflix2.jpg",
            ],[
                "nama_produk"  => "Youtube",
                "deskripsi"  => "Iklan Dihilangkan: Tidak melihat iklan saat menonton, menghindari gangguan; Konten Offline: Mengunduh video untuk ditonton tanpa internet; Latar Belakang & Penguncian: Mendengarkan audio dari video di latar belakang atau layar terkunci; Akses ke YouTube Music Premium: Dengarkan musik tanpa iklan, offline, dan di latar belakang",
                "gambar1"  => "youtube.png",
                "gambar2"  => "youtube2.jpg",
            ],[
                "nama_produk"  => "Vidio",
                "deskripsi"  => "Konten Lebih Bagus: Anda mendapatkan konten dengan kualitas lebih tinggi, tanpa iklan yang mengganggu, dan konten eksklusif yang tidak tersedia secara gratis; Vidio Platinum adalah Layanan Vidio yang menyediakan tayangan Liga top eropa, olahraga lainnya (tidak termasuk EPL dan F1), Original Vidio dan tayangan lainnya; Vidio Diamond adalah Layanan Vidio yang menyediakan tayangan EPL, Liga top eropa, olahraga lainnya (tidak termasuk F1), Original Vidio dan tayangan lainnya",
                "gambar1"  => "vidio.png",
                "gambar2"  => "vidio2.png",
            ],[
                "nama_produk"  => "Spotify",
                "deskripsi"  => "Tidak Ada Iklan: Dengarkan musik tanpa iklan yang mengganggu; Mendengarkan Tanpa Batas: Nikmati musik tanpa batasan jumlah lagu atau skip; Kualitas Suara Lebih Baik: Streaming musik dengan kualitas hingga 320 kbps; Dapat Didengarkan Offline: Unduh lagu untuk didengarkan tanpa internet",
                "gambar1"  => "spotify.png",
                "gambar2"  => "spotify2.png",
            ],[
                "nama_produk"  => "Viu",
                "deskripsi"  => "Akses ke Semua Konten Premium: Tonton semua drama Korea, variety show, film, dan konten eksklusif Viu tanpa batasan; Streaming Tanpa Iklan: Nikmati menonton tanpa gangguan iklan yang mengganggu; Kualitas Video Lebih Baik: Rasakan pengalaman menonton yang lebih jernih dengan kualitas video yang lebih baik; Akses Awal ke Konten Terbaru: Dapatkan akses lebih cepat ke episode terbaru dari drama atau variety show favorit Anda",
                "gambar1"  => "viu.png",
                "gambar2"  => "viu2.jpg",
            ],[
                "nama_produk"  => "Canva",
                "deskripsi"  => "Fitur Premium Penuh: Nikmati semua fitur premium Canva, termasuk ribuan template dan gambar eksklusif; Desain Tanpa Batas: Buat sebanyak desain yang Anda inginkan tanpa batasan; Konten Eksklusif: Akses materi desain eksklusif yang tidak tersedia di versi gratis; Font dan Warna Kustom: Sesuaikan desain Anda dengan menggunakan font dan warna yang Anda inginkan; Tanpa Logo Canva: Hapus logo Canva dari desain Anda untuk tampilan yang lebih profesional",
                "gambar1"  => "canva.png",
                "gambar2"  => "canva2.png",
        ]]);
            //   ,[
        //     "nama_produk"  => "Wetv",
        //     "deskripsi"  => "",
        //     "gambar"  => "wetv.png",
        //   ],[
        //     "nama_produk"  => "Bstation",
        //     "deskripsi"  => "",
        //     "gambar"  => "bstation.png",
        //   ],[
        //     "nama_produk"  => "Capcut",
        //     "deskripsi"  => "",
        //     "gambar"  => "capcut.png",
        //   ],[
        //     "nama_produk"  => "Vision+",
        //     "deskripsi"  => "",
        //     "gambar"  => "vision+.png",
        //   ],[
        //     "nama_produk"  => "Prime Vidio",
        //     "deskripsi"  => "",
        //     "gambar"  => "prime.png",
        //   ],[
        //     "nama_produk"  => "Disney+ hotstar",
        //     "deskripsi"  => "",
        //     "gambar"  => "disney.png",
        //   ]]);

        DB::table('pakets')->insert([[
            "produk_id"  => "1",
            "nama_paket"  => "Netflix 1P1U 1 Bulan Garansi",
            "catatan"  => "Rules:\n Dilarang ganti email dan password; Dilarang otak atik billing details; Dilarang menambahkan nomor telpon; Hanya boleh login 1 device; Dilarang ganti pin / profile; 26-30 hari dihitung sudah sebulan ya; Dilarang change plan kemanapun; Dilarang menyebarluaskan akun yang diberikan; Apabila terkena screen limit, bisa download film atau bisa tunggu beberapa menit kedepan; Dilarang klik cancel membership\n Sebelum login pastikan kalian clear cache aplikasi/web kalian terlebih dahulu apabila terjadi error pada saat login\n !! Melanggar? Garansi hangus. Denda 60K sharing profile !!",
            "stok"  => "20",
            "jumlah_paket"  => null,
            "harga"  => "28000",
            ],[
            "produk_id"  => "1",
            "nama_paket"  => "Netflix 1P2U 1 Bulan Garansi",
            "catatan"  => "Rules:\n Dilarang ganti email dan password; Dilarang otak atik billing details; Dilarang menambahkan nomor telpon; Hanya boleh login 1 device; Dilarang ganti pin / profile; 26-30 hari dihitung sudah sebulan ya; Dilarang change plan kemanapun; Dilarang menyebarluaskan akun yang diberikan; Apabila terkena screen limit, bisa download film atau bisa tunggu beberapa menit kedepan; Dilarang klik cancel membership\n Sebelum login pastikan kalian clear cache aplikasi/web kalian terlebih dahulu apabila terjadi error pada saat login\n !! Melanggar? Garansi hangus. Denda 60K sharing profile !!",
            "stok"  => "20",
            "jumlah_paket"  => null,
            "harga"  => "19000",
            ],[
            "produk_id"  => "2",
            "nama_paket"  => "Youtube 1 Bulan Garansi",
            "catatan"  => "Rules:\n Wajib langsung login dan ganti password email; Garansi apabila kembali normal atau tidak premium lagi; Aku disable atau nonaktif tidak mendapat garansi gmail; Wajib tambahkan no telpon dan email pemulihan\n Tidak menerima garansi apabila rules dilanggar!!",
            "stok"  => "20",
            "jumlah_paket"  => null,
            "harga"  => "9000",
            ],[
            "produk_id"  => "2",
            "nama_paket"  => "Youtube 3 Bulan Garansi",
            "catatan"  => "Rules:\n Wajib langsung login dan ganti password email; Garansi apabila kembali normal atau tidak premium lagi; Aku disable atau nonaktif tidak mendapat garansi gmail; Wajib tambahkan no telpon dan email pemulihan\n Tidak menerima garansi apabila rules dilanggar!!",
            "stok"  => "20",
            "jumlah_paket"  => null,
            "harga"  => "17000",
            ],[
            "produk_id"  => "3",
            "nama_paket"  => "Vidio Platinum 1 Bulan Garansi",
            "catatan"  => "Rules:\n Dilarang keras ubah email dan password; Dilarang otak atik billing details; 26-30 hari dihitung sudah sebulan ya; Hanya boleh login 1 device; Apabila terjadi screen limit tunggu beberapa menit kedepan dan coba tonton kembali\n !! Melanggar? Garansi hangus. Denda 60K sharing akun !!",
            "stok"  => "20",
            "jumlah_paket"  => null,
            "harga"  => "18000",
            ],[
            "produk_id"  => "3",
            "nama_paket"  => "Vidio Diamond 1 Bulan Garansi",
            "catatan"  => "Rules:\n Dilarang keras ubah email dan password; Dilarang otak atik billing details; 26-30 hari dihitung sudah sebulan ya; Hanya boleh login 1 device; Apabila terjadi screen limit tunggu beberapa menit kedepan dan coba tonton kembali\n !! Melanggar? Garansi hangus. Denda 60K sharing akun !!",
            "stok"  => "20",
            "jumlah_paket"  => null,
            "harga"  => "45000",
            ],[
            "produk_id"  => "4",
            "nama_paket"  => "Spotify 1 Bulan Garansi",
            "catatan"  => "Rules:\n Akun private, Dilarang menyebarluaskan akun yang diberikan; Hanya boleh login 1 device; Login langung di spotifynya tanpa login akun gmail; Dilarang mengubah email dan password; Dilarang klik cancel membership\n Tidak menerima garansi apabila rules dilanggar!!",
            "stok"  => "20",
            "jumlah_paket"  => null,
            "harga"  => "12000",
            ],[
            "produk_id"  => "4",
            "nama_paket"  => "Spotify 3 Bulan Garansi",
            "catatan"  => "Rules:\n Akun private, Dilarang menyebarluaskan akun yang diberikan; Hanya boleh login 1 device; Login langung di spotifynya tanpa login akun gmail; Dilarang mengubah email dan password; Dilarang klik cancel membership\n Tidak menerima garansi apabila rules dilanggar!!",
            "stok"  => "20",
            "jumlah_paket"  => null,
            "harga"  => "23000",
            ],[
            "produk_id"  => "5",
            "nama_paket"  => "Viu 1 Bulan Garansi",
            "catatan"  => "Rules:\n Hanya boleh login 1 device agar tidak error; Dilarang keseringan login logout, karena hanya login pun bisa membuat limit; Dilarang otak atik billing; Dilarang klik cancel membership; 26-30 hari dihitung sudah sebulan ya; Garansi berlaku hanya jika akun backfree bukan karena akun ke banned viu; Login laptop dan tv terhitung 2 device jadi ketika terkena limit, harap tunggu beberapa menit lalu coba lagi\n !! Melanggar? Garansi hangus. Denda 60K sharing akun !!",
            "stok"  => "20",
            "jumlah_paket"  => null,
            "harga"  => "10000",
            ],[
            "produk_id"  => "5",
            "nama_paket"  => "Viu 3 Bulan Garansi",
            "catatan"  => "Rules:\n Hanya boleh login 1 device agar tidak error; Dilarang keseringan login logout, karena hanya login pun bisa membuat limit; Dilarang otak atik billing; Dilarang klik cancel membership; 26-30 hari dihitung sudah sebulan ya; Garansi berlaku hanya jika akun backfree bukan karena akun ke banned viu; Login laptop dan tv terhitung 2 device jadi ketika terkena limit, harap tunggu beberapa menit lalu coba lagi\n !! Melanggar? Garansi hangus. Denda 60K sharing akun !!",
            "stok"  => "20",
            "jumlah_paket"  => null,
            "harga"  => "20000",
            ],[
            "produk_id"  => "5",
            "nama_paket"  => "Viu 6 Bulan Garansi",
            "catatan"  => "Rules:\n Hanya boleh login 1 device agar tidak error; Dilarang keseringan login logout, karena hanya login pun bisa membuat limit; Dilarang otak atik billing; Dilarang klik cancel membership; 26-30 hari dihitung sudah sebulan ya; Garansi berlaku hanya jika akun backfree bukan karena akun ke banned viu; Login laptop dan tv terhitung 2 device jadi ketika terkena limit, harap tunggu beberapa menit lalu coba lagi\n !! Melanggar? Garansi hangus. Denda 60K sharing akun !!",
            "stok"  => "20",
            "jumlah_paket"  => null,
            "harga"  => "24000",
            ],[
            "produk_id"  => "5",
            "nama_paket"  => "Viu 1 Tahun Garansi",
            "catatan"  => "Rules:\n Hanya boleh login 1 device agar tidak error; Dilarang keseringan login logout, karena hanya login pun bisa membuat limit; Dilarang otak atik billing; Dilarang klik cancel membership; 26-30 hari dihitung sudah sebulan ya; Garansi berlaku hanya jika akun backfree bukan karena akun ke banned viu; Login laptop dan tv terhitung 2 device jadi ketika terkena limit, harap tunggu beberapa menit lalu coba lagi\n !! Melanggar? Garansi hangus. Denda 60K sharing akun !!",
            "stok"  => "20",
            "jumlah_paket"  => null,
            "harga"  => "32000",
            ],[
            "produk_id"  => "6",
            "nama_paket"  => "Canva 1 Bulan Garansi",
            "catatan"  => "Rules:\n Akun private, Dilarang menyebarluaskan akun yang diberikan; Hanya boleh login 1 device; Login langung di spotifynya tanpa login akun gmail; Dilarang mengubah email dan password; Dilarang klik cancel membership\n Tidak menerima garansi apabila rules dilanggar!!",
            "stok"  => "20",
            "jumlah_paket"  => null,
            "harga"  => "5000",
            ],[
            "produk_id"  => "6",
            "nama_paket"  => "Canva 1 Tahun Garansi",
            "catatan"  => "Rules:\n Akun private, Dilarang menyebarluaskan akun yang diberikan; Hanya boleh login 1 device; Login langung di spotifynya tanpa login akun gmail; Dilarang mengubah email dan password; Dilarang klik cancel membership\n Tidak menerima garansi apabila rules dilanggar!!",
            "stok"  => "20",
            "jumlah_paket"  => null,
            "harga"  => "15000",
            ]]);

        DB::table('pembayarans')->insert([[
            "nama_metode"  => "Dana",
            "rek_tujuan"  => "083847086323",
            "an"  => "Anas Khoiri Abdillah",
            "gambar"  => "dana.jpg",
          ],[
            "nama_metode"  => "Ovo",
            "rek_tujuan"  => "083847086323",
            "an"  => "Anas Khoiri Abdillah",
            "gambar"  => "ovo.jpg",
          ],[
            "nama_metode"  => "Shopeepay",
            "rek_tujuan"  => "083847086323",
            "an"  => "Anas Khoiri Abdillah",
            "gambar"  => "shopeepay.jpg",
          ]]);

        DB::table('pemesanans')->insert([[
            "user_id"  => "2",
            "paket_id"  => "1",
            "pembayaran_id"  => "1",
            "keranjang_id"  => null,
            "jumlah_paket"  => "1",
            "metode_asal"  => "Dana",
            "rek_asal"  => "08791312234",
            "total_harga"  => "28000",
            "bukti_pembayaran"  => "bukti.jpg",
            "status"  => "Proses",
            "created_at"  => Carbon::now(),
            "updated_at"  => Carbon::now(),
        ],[
            "user_id"  => "2",
            "paket_id"  => "2",
            "pembayaran_id"  => "1",
            "keranjang_id"  => null,
            "jumlah_paket"  => "1",
            "metode_asal"  => "Dana",
            "rek_asal"  => "09862831232",
            "total_harga"  => "19000",
            "bukti_pembayaran"  => "bukti.jpg",
            "status"  => "Terkirim",
            "created_at"  => Carbon::now(),
            "updated_at"  => Carbon::now(),
        ]]);

        DB::table('keranjangs')->insert([[
            "user_id"  => "2",
            "paket_id"  => "1",
            "jumlah_paket"  => "1",
            "harga"  => "28000",
        ]]);

        DB::table('pesans')->insert([[
            "user_id"  => "1",
            "pesan"  => "mantap kali bang",
        ]]);

        DB::table('sliders')->insert([[
            "nama_slider"  => "Netflix",
            "gambar_slider"  => "slider1.png",
        ],[
            "nama_slider"  => "Youtube",
            "gambar_slider"  => "slider2.png",
        ],[
            "nama_slider"  => "Vidio",
            "gambar_slider"  => "slider3.png",
        ],[
            "nama_slider"  => "Spotify",
            "gambar_slider"  => "slider4.png",
        ],[
            "nama_slider"  => "Viu",
            "gambar_slider"  => "slider5.png",
        ],[
            "nama_slider"  => "Canva",
            "gambar_slider"  => "slider6.png",
        ]]);
    }
}
