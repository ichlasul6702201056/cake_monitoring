@extends('foundation')
@section('frame')
    <style>
        .fullimage {
            width: 100%;
            z-index: 0;
        }

        .col {
            text-align: center;
        }

        header {
            background-color: #000000;
            color: #ffffff;
            padding: 20px 0px;
        }

        h1,
        h3 {
            text-transform: uppercase;
        }

        .counter {
            text-align: center;
        }

        .counter-count {
            font-size: 50px;
            font-weight: bold;
            position: relative;
            color: #000000;
            text-align: center;
            display: inline-block;
        }

        @media screen and (min-width:480px) {
            .col {}
        }
    </style>


    <div id="layoutSidenav_content">
        <main>
            <div class="background">
                <img class="fullimage" src="{{ asset('img/umkm.png') }}" alt="rumah pak rahmat">
                <div class="mask rgba-blue-slight">
                    <div class="container flex-center text-center">
                        <div class="row mt-5">
                            <div class="col-md-12 col-xl-8 mx-auto wow fadeIn">
                                <h1 class="display-3 font-weight-bold mb-2 wow fadeInDown" data-wow-delay="0.3s">
                                    UMKM Ayam Petelur Bapak Rachmat</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

       

            <div class="container">
                <div class="card mb-3">
                    <div class="row">
                        <div class="col">
                            <div class="count-up">
                                <p class="counter-count">≥300</p>
                                <h3>Ekor Ayam</h3>
                            </div>
                            <div class="card-body"></div>
                        </div>
                        <div class="col">
                            <div class="count-up">
                                <p class="counter-count">18Kg/Hari</p>
                                <h3>Produksi Telur</h3>
                            </div>
                            <div class="card-body"></div>
                        </div>
                        <div class="col">
                            <div class="count-up">
                                <p class="counter-count">4</p>
                                <h3>Tahun Berdiri</h3>
                            </div>
                            <div class="card-body"></div>
                        </div>
                        <div class="col">
                            <div class="count-up">
                                <p class="counter-count">Open House</p>
                                <h3>Model</h3>
                            </div>
                            <div class="card-body"></div>
                        </div>
                    </div>
                </div>
        </main>
    </div>

    <script>
        $('.counter-count').each(function() {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                //chnage count up speed here
                duration: 4000,
                easing: 'swing',
                step: function(now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="{{ asset('js/base.js') }}"></script>
@endsection
