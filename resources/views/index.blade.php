@extends('layouts.main')

@section('container')
    <h2>Hello Statistician!</h2>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/img/slide1.jpg" class="d-block w-100" alt="img-3">
                <div class="carousel-caption d-none d-md-block">
                    {{-- <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p> --}}
                </div>
            </div>
            <div class="carousel-item">
                <img src="/img/slide2.jpg" class="d-block w-100" alt="img-4">
                <div class="carousel-caption d-none d-md-block">
                    {{-- <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p> --}}
                </div>
            </div>
            <div class="carousel-item">
                <img src="/img/slide3.jpg" class="d-block w-100" alt="img-1">
                <div class="carousel-caption d-none d-md-block">
                    {{-- <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p> --}}
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
<br>
    <div class="content">
        <h3>BPS Kabupaten Cilacap</h3>
        <p>Badan Pusat Statistik adalah Lembaga Pemerintah Non Kementerian yang bertanggung jawab langsung kepada Presiden.
            Sebelumnya, BPS merupakan Biro Pusat Statistik, yang dibentuk berdasarkan UU Nomor 6 Tahun 1960 tentang Sensus 
            dan UU Nomer 7 Tahun 1960 tentang Statistik. Sebagai pengganti kedua UU tersebut ditetapkan UU Nomor 16 Tahun 1997
             tentang Statistik. Berdasarkan UU ini yang ditindaklanjuti dengan peraturan perundangan dibawahnya, secara formal
              nama Biro Pusat Statistik diganti menjadi Badan Pusat Statistik.</p>
        <p>Dengan mempertimbangkan capaian kinerja, memperhatikan aspirasi masyarakat, potensi dan permasalahan, serta mewujudkan Visi Presiden dan Wakil Presiden maka visi Badan Pusat Statistik untuk tahun 2020-2024 adalah :</p>

            <p style="text-align: center">
            “Penyedia Data Statistik Berkualitas untuk Indonesia Maju”</p>
            
            <p style="text-align: center">(Provider of Qualified Statistical Data for Advanced Indonesia)</p>
            
            <p>Dalam visi yang baru tersebut berarti bahwa BPS berperan dalam penyediaan data statistik nasional 
            maupun internasional, untuk menghasilkan statistik yang mempunyai kebenaran akurat dan menggambarkan 
            keadaan yang sebenarnya, dalam rangka mendukung Indonesia Maju.
            
            Dengan visi baru ini, eksistensi BPS sebagai penyedia data dan informasi statistik menjadi semakin penting, 
            karena memegang peran dan pengaruh sentral dalam penyediaan statistik berkualitas tidak hanya di Indonesia, 
            melainkan juga di tingkat dunia. Dengan visi tersebut juga, semakin menguatkan peran BPS sebagai pembina data statistik.
            
            Misi BPS dirumuskan dengan memperhatikan fungsi dan kewenangan BPS, visi BPS serta melaksanakan Misi Presiden dan Wakil 
            Presiden yang Ke-1 (Peningkatan Kualitas Manusia Indonesia), Ke-2 (Struktur Ekonomi yang Produktif, Mandiri, dan Berdaya Saing) 
            dan yang Ke-3 Pembangunan yang Merata dan Berkeadilan, dengan uraian sebagai berikut:</p>
            
            <p>1. Menyediakan statistik berkualitas yang berstandar nasional dan internasional <br>
            2. Membina K/L/D/I melalui Sistem Statistik Nasional yang berkesinambungan <br>
            3. Mewujudkan pelayanan prima di bidang statistik untuk terwujudnya Sistem Statistik Nasional <br>
            4. Membangun SDM yang unggul dan adaptif berlandaskan nilai profesionalisme, integritas dan amanah.</p>
    </div>

    <script>
        var myCarousel = document.querySelector('#myCarousel')
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 2000,
            wrap: false
        })
    </script>
@endsection
