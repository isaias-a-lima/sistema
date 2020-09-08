<?php include 'sessao.php';  ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema | Formaprint</title>
    <?php include 'estilos.php'; ?>
</head>

<body>
    
    <header class="topo">
        <div class="container" style="height: 100%;">
            <div class="row" style="height: 100%;">
                <div class="col-xs-5 col-sm-4 col-md-3" style="height: 100%;">
                    <img src="./img/logo.png" style="height: 100%; cursor:pointer;" onclick="window.location.href='../view/'">
                </div>
                <div class="col-xs-7 col-sm-8 col-md-9" style="text-align: center;">
                    <a href="../view/?p=m"><span class="glyphicon glyphicon-menu-hamburger"></span></a>
                    <a href="../view/?p=l"><span class="glyphicon glyphicon-education"></span></a>
                    <a href="../view/?p=lf"><span class="glyphicon glyphicon-cog"></span></a>
                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="container">
            <div class="text-danger"><?= $logado ?></div>
        </div>
    </section>

    <section>
        <div class="container">

            <?php include 'paginas.php'; ?>

            <!-- <div class="row">
                <div class="col-sm-12 col-md-6">
                    Teste 01
                </div>
                <div class="col-sm-12 col-md-6">
                    Teste 02
                </div>
            </div> -->
        </div>
    </section>

</body>

<script src="../view/main.js"></script>

</html>