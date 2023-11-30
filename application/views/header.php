<!DOCTYPE html>
<html lang="en">

<head>
    <title>Balai Penelitian Tanaman Pemanis dan Serat</title>
    <meta charset="utf-8">
    <meta name="description" content="A Tuts+ course">
    <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/css/balittas.css">
    <link href="<?php echo base_url() ?>assets/icon/Logo-Kementerian-Pertanian.png" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/semantic.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>bootstrap/js/jQuery.highlight.js"></script>
</head>
<style>
/* CSS Document */

@import url(https://fonts.googleapis.com/css?family=Open+Sans);
@import url(https://fonts.googleapis.com/css?family=Bree+Serif);

h1 {
    font-size: 60px;
    text-align: center;
    color: #FFF;
}

h3 {
    font-size: 30px;
    text-align: center;
    color: #FFF;
}

h3 a {
    color: #FFF;
}

a {
    color: #FFF;
}

h1 {
    margin-top: 100px;
    text-align: center;
    font-size: 60px;
    font-family: 'Bree Serif', 'serif';
}

li>a:after {
    content: ' >';
}

li>a:only-child:after {
    content: '';
}

#container {
    margin: 0 auto;
}

p {
    text-align: center;
}


nav ul {
    display: inline-block;

    list-style: none;
    position: relative;
}


nav ul li {

    background-color: transparent;
    padding: 5px 16px 5px 5px;

}

nav a {
    display: block;
    padding: 5px 16px 5px 5px;
    color: #FFFFFF;
    border-radius: 2px;
    text-decoration: none;
}

/* Hide Dropdowns by Default */
nav ul ul {
    display: none;
    position: absolute;
    top: 60px;
    padding: 5px 16px 5px 5px;
    color: #FFFFFF;
    /* the height of the main nav */
}

/* Display Dropdowns on Hover */
nav ul li:hover>ul {
    display: inherit;
}

nav ul ul li:hover {
    color: #fece00;
    background-color: rgba(28, 69, 26, 0.8);
}

/* Fisrt Tier Dropdown */
nav ul ul li {
    background-color: rgba(28, 69, 26, 0.8);
    box-sizing: border-box;
    width: 170px;
    float: none;
    display: list-item;
    position: relative;
    color: #FFFFFF;
}

/* Second, Third and more Tiers	*/
nav ul ul ul li {
    position: relative;
    top: -60px;
    left: 160px;

}

nav a:hover {
    color: #fece00;
    cursor: default;
}

nav ul li:hover>ul {
    display: inline-block;
}
</style>

<body>
    <div class="thetop"></div>
    <header>
        <?php
		if (!empty($judul)) { ?>
        <div class="hidden-md hidden-lg" style="background-color: rgb(28,69,26); height: 70px"></div>
        <?php
		} ?>
        <nav class="navbar navbar-inverse navbar-fixed-top navbarHover">
            <div class="container-fluid">
                <div class="navbar-header" style="margin-top: 5px; margin-bottom: 3px;">
                    <!-- <a href="<?php //echo base_url() 
									?>"><img src="<?php //echo base_url() 
													?>item img/logoBalittas2.png" style="width:280px;margin-top: -18px;margin-bottom: -6px;margin-left: 5px;"></a> -->
                    <a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>assets/icon/logobalittas.png" style="width:280px; margin-left: 5px;"></a>
                    <button type="botton" class="navbar-toggle" data-toggle="collapse" data-target="#main" style="margin-top: 10px;">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-header" style="margin-top: 15px; margin-bottom: 5px;">
                    <a href="<?php echo base_url() ?>" class="glyphicon glyphicon-home dropbtnHeader" style="text-decoration-line: none;font-size: 20px; "></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav" style="margin-top: 12px;margin-right: 75px; font-weight: bold">

                        <li><a href="<?= base_url("index.php/Virginia") ?> ">VIRGINIA</a>
                            <!-- First Tier Drop Down -->
                            <ul>
                                <li><a href="#">Lombok</a>
                                    <!-- Second Tier Drop Down -->
                                    <ul>
                                        <li><a href="index.php/Virginia/VarietasLombok">Varietas</a></li>
                                        <li><a href="index.php/Virginia/BudidayaLombok">Budidaya</a></li>
                                        <li><a href="index.php/Virginia/PenyakitLombok">Penyakit/Hama</a></li>
                                        <li><a href="index.php/Virginia/PascaPanenLombok">Pasca Panen</a></li>
                                        <li><a href="index.php/Virginia/AgribisnisLombok">Agribisnis</a></li>
                                    </ul>
                                <li><a href="#">Jawa Timur</a>
                                    <!-- Second Tier Drop Down -->
                                    <ul>
                                        <li><a href="index.php/Virginia/VarietasJawaTimur">Varietas</a></li>
                                        <li><a href="index.php/Virginia/BudidayaJawaTimur">Budidaya</a></li>
                                        <li><a href="index.php/Virginia/PenyakitJawaTimur">Penyakit/Hama</a></li>
                                        <li><a href="index.php/Virginia/PascaPanenJawaTimur">Pasca Panen</a></li>
                                        <li><a href="index.php/Virginia/AgribisnisJawaTimur">Agribisnis</a></li>
                                    </ul>
                            </ul>
                        </li>
                        <li><a href="<?= base_url("index.php/local") ?>">LOKAL</a>
                            <!-- First Tier Drop Down -->
                            <ul>
                                <li><a href="#">Jawa Timur</a>
                                    <!-- Second Tier Drop Down -->
                                    <ul>
                                        <li><a href="#">Madura</a>
                                            <!-- Third Tier Drop Down -->
                                            <ul>
                                                <li><a href="index.php/Local/VarietasMadura">Varietas</a></li>
                                                <li><a href="index.php/Local/BudidayaMadura">Budidaya</a></li>
                                                <li><a href="index.php/Local/PenyakitMadura">Penyakit/Hama</a></li>
                                                <li><a href="index.php/Local/PascaPanenMadura">Pasca Panen</a></li>
                                                <li><a href="index.php/Local/AgribisnisMadura">Agribisnis</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Kasturi</a>
                                            <ul>
                                                <li><a href="index.php/Local/VarietasKasturi">Varietas</a></li>
                                                <li><a href="index.php/Local/BudidayaKasturi">Budidaya</a></li>
                                                <li><a href="index.php/Local/PenyakitKasturi">Penyakit/Hama</a></li>
                                                <li><a href="index.php/Local/PascaPanenKasturi">Pasca Panen</a></li>
                                                <li><a href="index.php/Local/AgribisnisKasturi">Agribisnis</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Paiton</a>
                                            <ul>
                                                <li><a href="index.php/Local/VarietasPaiton">Varietas</a></li>
                                                <li><a href="index.php/Local/BudidayaPaiton">Budidaya</a></li>
                                                <li><a href="index.php/Local/PenyakitPaiton">Penyakit/Hama</a></li>
                                                <li><a href="index.php/Local/PascaPanenPaiton">Pasca Panen</a></li>
                                                <li><a href="index.php/Local/AgribisnisPaiton">Agribisnis</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Jombang</a>
                                            <ul>
                                                <li><a href="index.php/Local/VarietasJombang">Varietas</a></li>
                                                <li><a href="index.php/Local/BudidayaJombang">Budidaya</a></li>
                                                <li><a href="index.php/Local/PenyakitJombang">Penyakit/Hama</a></li>
                                                <li><a href="index.php/Local/PascaPanenJombang">Pasca Panen</a></li>
                                                <li><a href="index.php/Local/AgribisnisJombang">Agribisnis</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Bondowoso</a>
                                            <ul>
                                                <li><a href="index.php/Local/VarietasBondowoso">Varietas</a></li>
                                                <li><a href="index.php/Local/BudidayaBondowoso">Budidaya</a></li>
                                                <li><a href="index.php/Local/PenyakitBondowoso">Penyakit/Hama</a></li>
                                                <li><a href="index.php/Local/PascaPanenBondowoso">Pasca Panen</a></li>
                                                <li><a href="index.php/Local/AgribisnisBondowoso">Agribisnis</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Banyuwangi</a>
                                            <ul>
                                                <li><a href="index.php/Local/VarietasBanyuwangi">Varietas</a></li>
                                                <li><a href="index.php/Local/BudidayaBanyuwangi">Budidaya</a></li>
                                                <li><a href="index.php/Local/PenyakitBanyuwangi">Penyakit/Hama</a></li>
                                                <li><a href="index.php/Local/PascaPanenBanyuwangi">Pasca Panen</a></li>
                                                <li><a href="index.php/Local/AgribisnisBanyuwangi">Agribisnis</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Tulungagung</a>
                                            <ul>
                                                <li><a href="index.php/Local/VarietasTulungagung">Varietas</a></li>
                                                <li><a href="index.php/Local/BudidayaTulungagung">Budidaya</a></li>
                                                <li><a href="index.php/Local/PenyakitTulungagung">Penyakit/Hama</a></li>
                                                <li><a href="index.php/Local/PascaPanenTulungagung">Pasca Panen</a></li>
                                                <li><a href="index.php/Local/AgribisnisTulungagung">Agribisnis</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Magetan</a>
                                            <ul>
                                                <li><a href="index.php/Local/VarietasMagetan">Varietas</a></li>
                                                <li><a href="index.php/Local/BudidayaMagetan">Budidaya</a></li>
                                                <li><a href="index.php/Local/PenyakitMagetan">Penyakit/Hama</a></li>
                                                <li><a href="index.php/Local/PascaPanenMagetan">Pasca Panen</a></li>
                                                <li><a href="index.php/Local/AgribisnisMagetan">Agribisnis</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="#">Jawa Tengah</a>
                                    <!-- Second Tier Drop Down -->
                                    <ul>
                                        <li><a href="#">Temanggung</a>
                                            <ul>
                                                <li><a href="index.php/Local/VarietasTemanggung">Varietas</a></li>
                                                <li><a href="index.php/Local/BudidayaTemanggung">Budidaya</a></li>
                                                <li><a href="index.php/Local/PenyakitTemanggung">Penyakit/Hama</a></li>
                                                <li><a href="index.php/Local/PascaPanenTemanggung">Pasca Panen</a></li>
                                                <li><a href="index.php/Local/AgribisnisTemanggung">Agribisnis</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Asepan Boyolali</a>
                                            <ul>
                                                <li><a href="index.php/Local/VarietasAsepanBoyolali">Varietas</a></li>
                                                <li><a href="index.php/Local/BudidayaAsepanBoyolali">Budidaya</a></li>
                                                <li><a href="index.php/Local/PenyakitAsepanBoyolali">Penyakit/Hama</a></li>
                                                <li><a href="index.php/Local/PascaPanenAsepanBoyolali">Pasca Panen</a></li>
                                                <li><a href="index.php/Local/AgribisnisAsepanBoyolali">Agribisnis</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Purwodadi</a>
                                            <ul>
                                                <li><a href="index.php/Local/VarietasPurwodadi">Varietas</a></li>
                                                <li><a href="index.php/Local/BudidayaPurwodadi">Budidaya</a></li>
                                                <li><a href="index.php/Local/PenyakitPurwodadi">Penyakit/Hama</a></li>
                                                <li><a href="index.php/Local/PascaPanenPurwodadi">Pasca Panen</a></li>
                                                <li><a href="index.php/Local/AgribisnisPurwodadi">Agribisnis</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="#">Jawa Barat</a>
                                    <!-- Second Tier Drop Down -->
                                    <ul>
                                        <li><a href="#">Garut</a>
                                            <ul>
                                                <li><a href="index.php/Local/VarietasGarut">Varietas</a></li>
                                                <li><a href="index.php/Local/BudidayaGarut">Budidaya</a></li>
                                                <li><a href="index.php/Local/PenyakitGarut">Penyakit/Hama</a></li>
                                                <li><a href="index.php/Local/PascaPanenGarut">Pasca Panen</a></li>
                                                <li><a href="index.php/Local/AgribisnisGarut">Agribisnis</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Sumedang</a>
                                            <ul>
                                                <li><a href="index.php/Local/VarietasSumedang">Varietas</a></li>
                                                <li><a href="index.php/Local/BudidayaSumedang">Budidaya</a></li>
                                                <li><a href="index.php/Local/PenyakitSumedang">Penyakit/Hama</a></li>
                                                <li><a href="index.php/Local/PascaPanenSumedang">Pasca Panen</a></li>
                                                <li><a href="index.php/Local/AgribisnisSumedang">Agribisnis</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Majalengka</a>
                                            <ul>
                                                <li><a href="index.php/Local/VarietasMajalengka">Varietas</a></li>
                                                <li><a href="index.php/Local/BudidayaMajalengka">Budidaya</a></li>
                                                <li><a href="index.php/Local/PenyakitMajalengka">Penyakit/Hama</a></li>
                                                <li><a href="index.php/Local/PascaPanenMajalengka">Pasca Panen</a></li>
                                                <li><a href="index.php/Local/AgribisnisMajalengka">Agribisnis</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="#">DI Jogjakarta</a>
                                    <!-- Second Tier Drop Down -->
                                    <ul>
                                        <li><a href="#">Sleman</a>
                                            <ul>
                                                <li><a href="index.php/Local/VarietasSleman">Varietas</a></li>
                                                <li><a href="index.php/Local/BudidayaSleman">Budidaya</a></li>
                                                <li><a href="index.php/Local/PenyakitSleman">Penyakit/Hama</a></li>
                                                <li><a href="index.php/Local/PascaPanenSleman">Pasca Panen</a></li>
                                                <li><a href="index.php/Local/AgribisnisSleman">Agribisnis</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="<?= base_url("index.php/Burley") ?>">BURLEY</a>
                            <!-- First Tier Drop Down -->
                            <ul>
                                <li><a href="<?= base_url('index.php/Burley/Varietas') ?>">Varietas</a></li>
                                <li><a href="<?= base_url('index.php/Burley/Budidaya') ?>">Budidaya</a></li>
                                <li><a href="<?= base_url('index.php/Burley/Penyakit') ?>">Penyakit/Hama</a></li>
                                <li><a href="<?= base_url('index.php/Burley/PascaPanen') ?>">Pasca Panen</a></li>
                                <li><a href="<?= base_url('index.php/Burley/Agribisnis') ?>">Agribisnis</a></li>
                            </ul>
                        </li>
                        <li><a href="<?= base_url("index.php/Cerutu") ?>">CERUTU</a>
                            <!-- First Tier Drop Down -->
                            <ul>
                                <li><a href="#">Besuki NO</a>
                                    <ul>
                                        <li><a href="<?= base_url('index.php/Cerutu/VarietasBesukiNo') ?>">Varietas</a></li>
                                        <li><a href="<?= base_url('index.php/Cerutu/BudidayaBesukiNo') ?>">Budidaya</a></li>
                                        <li><a href="<?= base_url('index.php/Cerutu/PenyakitBesukiNo') ?>">Penyakit/Hama</a></li>
                                        <li><a href="<?= base_url('index.php/Cerutu/PascaPanenBesukiNo') ?>">Pasca Panen</a></li>
                                        <li><a href="<?= base_url('index.php/Cerutu/AgribisnisBesukiNo') ?>">Agribisnis</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="<?= base_url("index.php/Oriental") ?>">ORIENTAL</a>
                            <!-- First Tier Drop Down -->
                            <ul>
                                <li><a href="<?= base_url('index.php/Oriental/Varietas') ?>">Varietas</a></li>
                                <li><a href="<?= base_url('index.php/Oriental/Budidaya') ?>">Budidaya</a></li>
                                <li><a href="<?= base_url('index.php/Oriental/Penyakit') ?>">Penyakit/Hama</a></li>
                                <li><a href="<?= base_url('index.php/Oriental/PascaPanen') ?>">Pasca Panen</a></li>
                                <li><a href="<?= base_url('index.php/Oriental/Agribisnis') ?>">Agribisnis</a></li>
                            </ul>
                        </li>
                        <li><a href="<?= base_url("index.php/Diversifikasi") ?>">Diversifikasi Produk Tembakau</a>
                            <!-- First Tier Drop Down -->
                            <ul>
                                <li><a href="<?= base_url('index.php/Diversifikasi/Parfum') ?>">Parfum</a></li>
                                <li><a href="<?= base_url('index.php/Diversifikasi/Asarko') ?>">Asarko</a></li>
                            </ul>
                        </li>
                </div>
                </ul>
            </div>


            </div>
        </nav>
        <!-- gambar tengah -->

    </header>
</body>
<script>
//JS for scroll to top
$(window).scroll(function() {
    if ($(this).scrollTop() > 50) {
        $('.scrolltop:hidden').stop(true, true).fadeIn();
    } else {
        $('.scrolltop').stop(true, true).fadeOut();
    }
});
$(function() {
    $(".scroll").click(function() {
        $("html,body").animate({
            scrollTop: $(".thetop").offset().top
        }, "1000");
        return false
    })
})
</script>

</html>