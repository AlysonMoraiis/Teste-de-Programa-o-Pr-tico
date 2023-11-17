<?php

    include('Config.php');
    Mysql::conectar();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Corretor</title>
    <link href="style.css" rel="stylesheet">
</head>

<body>

    <div class="form_cd">

        <?php

            if (isset($_POST['enviar']) && $_POST['form'] == 'f_form'){

                $cpf = $_POST['cpf'];
                $creci = $_POST['creci'];
                $nome = $_POST['nome'];

                if($cpf == ''){
                    Form::alert('erro','O cpf ficou vazio');
                    
                } else if($creci == ''){
                    Form::alert('erro','O creci ficou vazio');
                } else if($nome == '')
                {
                    Form::alert('erro','O nome ficou vazio');
                    
                } else {
                    Form::cadastrar($cpf,$creci,$nome);
                    Form::alert('sucesso','Usuario ' .$nome. ' cadastrado com sucesso!');
                }
            }

            if (isset($_POST['editar'])) {
                $cpf = $_POST['cpf'];
                $creci = $_POST['creci'];
                $nome = $_POST['nome'];
                Form::editar($cpf, $creci, $nome);
            }

            if (isset($_POST['excluir'])) {
                $cpf = $_POST['cpf'];
                Form::excluir($cpf);
            }
            
            

        ?>
            <h1>Cadastro de Corretor</h1>
            <form method= "POST">
                <input type="text" name="cpf" placeholder="Digite seu CPF" class="field_cpf" pattern="\d{11}" title="CPF inválido" required>
                <input type="text" name="creci" placeholder="Digite seu Creci" class="field_creci" minlength="2" inputmode="numeric" pattern="[0-9]*" title="Apenas numeros são permitidos" required>
                <input type="text" name="nome" placeholder="Digite seu nome" class="field_nome" minlength="2" pattern="[A-Za-zÀ-ú ]+" title="Apenas letras e espaços são permitidos" required>
                <input type="submit" name="enviar" value="Enviar" class="button_enviar">
                <input type="hidden" name="form" value="f_form">
            </form>

            <div class="dados_formulario">
                <?php

                    $dados = Form::buscarDados();
                    foreach ($dados as $linha) {
                        echo $linha['cpf'] . $linha['creci'] . $linha['nome'];
                        echo '<button onclick="editar(\'' . $linha['cpf'] . '\')">Editar</button>';
                        echo '<button onclick="excluir(\'' . $linha['cpf'] . '\')">Excluir</button>';
                    }
                    echo '</table>';

                ?>
            </div>
    </div>

</body>

</html>