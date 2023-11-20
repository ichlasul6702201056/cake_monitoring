@extends('base')
@section('big-title')
    <h1 class="mt-4">Tentang</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Kandang ayam petelur Pak Rahmat</li>
    </ol>
@endsection
@section('title')
    <i class="bi bi-info-circle"></i>
    Tentang
@endsection
@section('body')
    <style>
        .fulljustify {
            text-align: justify;
        }

        .fulljustify:after {
            content: "";
            display: inline-block;
            width: 100%;
        }

        img {
            max-width: 336px;
        }

        @media screen and (max-width: 426px) {
            img {
                max-width: 100%;
            }
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="jumbotron">
                    <h1 class="display-3">Bapak Rachmat</h1>
                    <p class="lead">Pemilik kandang Ayam Petelur</p>
                    <hr class="my-2">
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-sm text-center">
                <img class="align-self-start mr-3 imgman rounded shadow-sm p-3 mb-5 bg-white rounded"
                    src="{{ asset('img/pak-rahmat.jpg') }}" alt="Pak Rahmat">
            </div>
            <div class="col-xl">
                <p class="lead">
                    Bapak Ir. H. Rachmat adalah seorang lulusan teknik elektro tahun 1993. Beliau merupakan pemilik peternakan
                    ayam petelur yang berlokasi di Desa Cilengkrang, Kecamatan Cilengkrang, Kabupaten Bandung.</p>
            </div>
        </div>

<hr>

<div class="row ailgn-items-center">
    <div class="col-xl">
        <p class="fulljustify">
            Pada tahun 2019, kandang ayam milik Pak Rachmat dibangun di lokasi bekas kandang sapi. Pak Rahmat
            tertarik untuk memelihara ayam sebagai hobi, memulai dengan 50 ekor ayam AFKIR. Kandang
            ini dirancang agar ramah lingkungan dan berkelanjutan. Produk sampingan dari kandang
            ayam tersebut adalah kotoran ayam yang dapat diolah menjadi kompos atau pakan ikan.
            Kompos tersebut kemudian dapat digunakan untuk menyuburkan kebun. Kandang ini didasarkan
            pada prinsip "4K": kandang, kompos, kolam, dan kebun. Keempat elemen ini saling
            terhubung satu sama lain, dan limbah dari satu elemen dapat digunakan untuk memberi
            manfaat bagi elemen lainnya. Sebagai contoh, kotoran ayam dapat digunakan untuk
            menyuburkan kebun, dan ikan di kolam dapat memakan serangga yang tertarik pada ayam.
            Kandang ayam ini sukses, dan pemiliknya mampu menghasilkan telur dan kompos dalam jumlah
            yang signifikan. Proyek ini juga merupakan cara yang bagus untuk mengajarkan anak-anak
            tentang keberlanjutan dan pentingnya mendaur ulang sampah.
        </p>
    </div>
    <div class="col-sm">
        <img class="img-fluid rounded shadow-sm p-3 bg-white rounded"
                    src="{{ asset('img/kandang.jpg') }}" alt="Pak Rahmat">
    </div>
</div>



<hr>
    @endsection
