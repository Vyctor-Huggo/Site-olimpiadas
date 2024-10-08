<?php 
$url = "https://apis.codante.io/olympic-games/countries" ;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$medalhas = json_decode(curl_exec($ch));
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medalhas</title>
    <link rel="shortcut icon"
        href="https://logodownload.org/wp-content/uploads/2020/03/olimpiada-olympic-games-logo-0.png">
    <link rel="shortcut icon"
        href="https://logodownload.org/wp-content/uploads/2020/03/olimpiada-olympic-games-logo-0.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../home.css">
    <link rel="stylesheet" href="medalhas.css">
</head>

<body>

    <!-- Svgs -->
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="home" viewBox="0 0 16 16">
            <path
                d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5" />
        </symbol>

        <symbol id="list" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
        </symbol>

        <symbol id="down" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M1.553 6.776a.5.5 0 0 1 .67-.223L8 9.44l5.776-2.888a.5.5 0 1 1 .448.894l-6 3a.5.5 0 0 1-.448 0l-6-3a.5.5 0 0 1-.223-.67" />
        </symbol>
    </svg>

    <!-- Nav -->
    <nav class="fixed-top">
        <div id="header" class="container-fluid">

            <svg class="bi m-md-3 m-2" width="24" height="24" fill="white" role="button"
                onclick="window.location.href='../home/siteOlimpico.html'">
                <use xlink:href="#home" />
            </svg>

            <div class="container-fluid m-auto">
                <div class="d-inline-block ms-md-4" role="button"
                    onclick="window.location.href='../calendario/calendario.php'">
                    <span class="m-2">Programação</span>
                </div>
                <div class="d-inline-block ms-md-4" role="button"
                    onclick="window.location.href='../medalhas/Medalhas.php'">
                    <span class="m-2">Medalhas</span>
                </div>
            </div>
            <div id="circulo"></div>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <svg class="bi m-md-2" width="30" height="30" fill="white">
                    <use xlink:href="#list" />
                </svg>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header" data-bs-theme="dark">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close" fill="white"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link ms-2" href="../historia/origem.html">História dos Jogos Olímpicos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ms-2" href="../calendario/calendario.php">Programação</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ms-2" href="../atletas/atletas.html">Atletas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ms-2" href="../medalhas/Medalhas.php ">Medalhas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ms-2" href="../noticias/noticias.html">Notícias e Atualizações</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ms-2" href="../galeria/galeria.html">Galeria</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ms-2" href="../formulario/formulario.html">Contato</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- TITULO -->

    <div id="imagemOrigem" class="container-fluid gradient">
        <div id="circuloGradient" class="m-auto"></div>
        <p class="m-auto text-center display-1 fw-bold">Medalhas</p>
    </div>

    <!-- Cabeçalho do Quadro -->
    <?php 
    foreach($medalhas->data as $Medalha){
?>
    <br><br><br>
    <div class="container-fluid p-md-5 p-1">
        <table class="table text-center">
            <thead>
                <tr>
                    <th class="border border-0">Equipe</th>
                    <th class="border border-0">
                        <div class="m-auto medal gold h5">
                            1
                        </div>
                    </th>
                    <th class="border border-0">
                        <div class="m-auto medal silver h5">
                            2
                        </div>
                    </th>
                    <th class="border border-0">
                        <div class="m-auto medal bronze h5">
                            3
                        </div>
                    </th>
                    <th class="border border-0">Total</th>
                </tr>
            </thead>

            <!-- Paises e suas respectivas medalhas -->

            <tbody>
                <!-- País 1 -->
                <tr>
                    <td class="borda-direita">
                        <div class="row m-auto">
                            <div class="col-4 p-0">
                                <span class="fw-bold" style="color: #501E70;"><?php echo $Medalha->rank;?></span>
                            </div>
                            <div class="col-4 p-0">
                                <div id="bandeira" class="container-fluid"
                                    style="background-image: url('<?php echo $Medalha->flag_url; ?>')">
                                </div>
                            </div>
                            <div class="col-4 p-0 nome-pais">
                                <span><?php echo $Medalha->id;?></span>
                            </div>
                        </div>
                    </td>
                    <td><?php echo $Medalha->gold_medals;?></td>
                    <td><?php echo $Medalha->silver_medals;?></td>
                    <td><?php echo $Medalha->bronze_medals;?></td>
                    <td><?php echo $Medalha->total_medals;?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php } ?>


    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="medalhas.js"></script>
</body>

</html>