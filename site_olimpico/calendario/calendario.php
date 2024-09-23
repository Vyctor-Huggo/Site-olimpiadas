<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário</title>
    <link rel="shortcut icon"
        href="https://logodownload.org/wp-content/uploads/2020/03/olimpiada-olympic-games-logo-0.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../home.css">
    <link rel="stylesheet" href="calendario.css">
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

    <!-- Programação -->
    <br><br>
    <div class="container-fluid mt-5 textRoxo mb-5">
        <h2>Programação e Resultados</h2>
    </div>

    <!-- Cards dos dias -->
    </head>

    <div class="container-fluid mt-5 textRoxo mb-5">
        <div class="container-fluid mt-5 textRoxo mb-5">
            <h2>Eventos Olímpicos</h2>
        </div>

        <form method="GET">
            <label for="date">Selecione uma data:</label>
            <input type="date" id="date" name="date" value="<?= isset($_GET['date']) ? $_GET['date'] : '2024-07-24' ?>">
            <button type="submit">Buscar</button>
        </form>
    </div>


    <?php 
            if (isset($_GET['date'])) {
                $date = $_GET['date'];
                
                $url = "https://apis.codante.io/olympic-games/events?date=" . $date ;
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $data = json_decode(curl_exec($ch));
                
        foreach($data->data as $day){
        ?>
    <div class="container-fluid">
        <div class="container-fluid p-md-4" id="dia">


            <table class="table">
                <thead>
                    <tr>

                        <th class="text-center"><?php echo $day->discipline_name;?></th>
                        <th class="text-start text-secondary"><?php echo $day->detailed_event_name?></th>
                        <th class="text-end text-secondary"><?php echo $day->venue_name?></th>
                    </tr>
                </thead>
                <?php foreach($day->competitors as $competitors) {?>
                <tbody>
                    <tr>
                        <th class="border border-0"></th>
                        <td colspan="2" class="border border-0 text-start">
                            <img class="d-inline-block" src="<?php echo $competitors->country_flag_url;?>"
                                height="40px">
                            <p class="d-inline-block fw-bold"><?php echo $competitors->country_id;?></p>

                        </td>
                        <td class=" border border-0 text-end">
                            <p class="fw-bold"><?php echo $competitors->result_mark;?></p>

                        </td>
                    </tr>
                </tbody>
                <?php } } ?>
            </table>

        </div>
    </div>

    <?php } ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>