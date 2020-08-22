
<?php
$msg = '';

?>
<div class="row">
    <div class="col-sm-12 col-md-6" style="min-height: 400px;">

        <h2><span class="glyphicon glyphicon-user"></span> Área do formando</h2>

        <?=$msg?>        

        <form method="POST" accept-charset="utf-8">

            <input type="hidden" name="p" value="l">

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" class="form-control" required>
            </div>
            <button type="button" class="btn btn-default">Logar</button>
        </form>

        <p>&nbsp;</p>
        <p>&nbsp;</p>

    </div>
</div>