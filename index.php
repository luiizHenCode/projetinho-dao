<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projetinho | adicionando clientes</title>
</head>

<style>
    *{
        padding: 0;
        margin: 0;
    }

    main{
        max-width: 1200px;
        width: 100%;
        margin: 0 auto;
        padding: 10px 0px;
    }

    h2{
        margin: 20px;
    }

    form{
        margin: 10px 20px;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
    }

    label{
        display: flex;
        flex-direction: column;
        width: 200px;
        margin: 5px;
    }

    input, select{
        height: 35px;
        box-sizing: border-box;
        padding: 0px 5px;

    }

    input[type="submit"]
    {
        width: 200px;
        align-self: flex-end;
        margin: 5px;
    }

    ul,li{
        list-style: none;
        padding: 5px;
    }

</style>

<body>

    <main>
        <h2>Adicione um cliente</h2>
        
        <form action="" method="post">
            <label>Nome: 
            <input type="text" name="nome" id="" >
            </label>

            <label>Email:
            <input type="email" name="email" id="" >
            </label>

            <label>Sexo:
            <select name="sexo" id="">
               
                <option value="m">Homem</option>
                <option value="f">Mulher</option>
                <option value="a">Animal</option>
            </select>
            </label>

            <label>Idade:
            <input type="text" name="idade" id="" >
            </label>

            <label>RG
            <input type="text" name="rg" id="" >
            </label>

            <input type="submit" value="Cadastrar">

            <?php

            include_once('config.php');
            $clientes = new Clientes();

            $dados = [
                'nome' => filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING),
                'email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING),
                'sexo' => filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING),
                'idade' => filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_STRING),
                'rg' => filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_STRING)
            ];
        

            if($dados['nome'] == '' || $dados['email'] == '' || $dados['sexo'] == '' || $dados['idade'] == '' || $dados['rg'] == ''):            
                echo 'preencha todos os campos';                
            else:               
                $clientes->insereCliente($dados);              
            endif;
           
            
        ?>

        </form>
        
        <hr>

        <?php
            
            $result = $clientes->selectClientes();
            foreach($result as $value):                
        ?>
                <ul>
                    <li>Nome: <?=$value->nome?></li>
                    <li>Email: <?=$value->email?></li>
                    <li>Sexo: <?=$value->sexo?></li>
                    <li>Idade: <?=$value->idade?></li>
                    <li>RG: <?=$value->rg?></li>
                    <li><a href="?excluir=<?=$value->idcliente?>">Excluir</a></li>
                </ul>

                <hr>

        <?php endforeach;

        $getId = filter_input(INPUT_GET, 'excluir', FILTER_SANITIZE_STRING);

        if(isset($getId))
        {
            $clientes->deletaUsuario('clientes',$getId);
        }

        
        ?>

        
        
    </main>
    
</body>
</html>