<?php
    if(!isset($_SESSION)) {
        session_start();
    }


    if(!isset($_SESSION['UsuarioID'])) {
        session_destroy();

        header("Location: index.php");
    }

    include 'config/conexao.php';
    include 'config/funcoes.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>

    <link rel="stylesheet" href="teste.css" />

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
        crossorigin="anonymous"
    />

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="sweetalert2/sweetalert2.min.css" />

    <style>
        .texto-form {
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="row">
        <div class="col-2 pe-0">
            <div class="top-left" style="background-color: #3c3a3c">
                <img
                    src="imgs/logo.png"
                    class="ps-5 pt-2 mt-1"
                    alt="Logo"
                    id="logo"
                />
            </div>
            <div class="bottom-left pt-3">
                <h3 class="ps-3 bottom-text">
                    <i class="fa-solid fa-user pe-2"></i>
                    <a href="home.php" style="color: inherit;"> Clientes </a>
                </h3>
            </div>
        </div>

        <div class="col-10 ps-0">
            <div class="top-right">
                <div class="d-flex justify-content-end align-items-center h-100 me-4">
                    <h3 class="pe-3 pt-2" id="user-text"><?php echo $_SESSION['UsuarioNome']; ?></h3>
                    <img src="imgs/user.png" alt="user" id="user" class="img-responsive pb-1" />
                </div>
            </div>
            <div class="bottom-right">
                <div class="px-5 pt-3">
                    <div style="display: flex; justify-content: space-between">
                        <h2>Clientes</h2>
                        <a href="home.php">
                            <i
                                class="fa-solid fa-arrow-left"
                                style="
                                    font-size: 16px;
                                    background-color: #feaa29;
                                    padding: 10px;
                                    border-radius: 10px;
                                    color: white;
                                "
                            ></i>
                        </a>    
                    </div>
                    <div class="pt-3">
                        <div>
                            <h5 class="bg-dark text-white p-2 ps-3" style="border-radius: 10px 10px 0px 0px;">
                                VER 
                            </h5>
                            <div class="bg-white p-2">
                                <form class="row formCliente">
                                    <input type="hidden" name="ID">
                                    <div class="col-3 form-group">
                                        <label for="nome" class="pb-1 ps-1 texto-form">Nome Completo</label>
                                        <input id="nome" name="nome"  style="border-radius: 10px;" class="form-control" type="text">
                                    </div>
                                    <div class="col-3">
                                        <label for="datanasc" class="pb-1 ps-1 texto-form">Data de nascimento</label>
                                        <input id="datanasc" name="datanasc"  style="border-radius: 10px;" class="form-control data" type="text">
                                    </div>                      
                                    <div class="col-3">
                                        <label for="genero" class="pb-1 ps-1 texto-form">Gênero</label>
                                        <select class="form-select" name="genero" id="genero" placeholder="selecione">
                                            <option value="Masculino">Masculino</option>
                                            <option value="Feminino">Feminino</option>
                                            <option value="Neutro">Neutro</option>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <label for="cpf" class="pb-1 ps-1 texto-form">CPF</label>
                                        <input id="cpf" name="cpf" style="border-radius: 10px;" class="form-control cpf" type="text">
                                    </div>
                                    <div class="col-3 pt-3">
                                        <label for="celular" class="pb-1 ps-1 texto-form">Celular</label>
                                        <input id="celular" name="celular" style="border-radius: 10px;" class="form-control cell" type="text">
                                    </div>
                                    <div class="col-3 pt-3">
                                        <label for="email" class="pb-1 ps-1 texto-form">E-mail</label>
                                        <input id="email" name="email" style="border-radius: 10px;" class="form-control" type="text">
                                    </div>
                                    <div class="col-3 pt-3">
                                        <label for="senha" class="pb-1 ps-1 texto-form">Senha</label>
                                        <input id="senha" name="senha" style="border-radius: 10px;" class="form-control" type="password">
                                    </div>
                                    <div class="col-3 pt-3">
                                        <label for="status" class="pb-1 ps-1 texto-form">Status</label>
                                        <select class="form-select" name="status" id="status">
                                            <option value="Ativo">Ativo</option>
                                            <option value="Inativo">Inativo</option>
                                        </select>
                                    </div>

                                    <div class="col-12 pt-5 d-flex justify-content-end align-items-center">
                                        <button id="salvar" style="border: none; background-color: #feaa29; color: white; border-radius: 10px;" class="me-3 px-5 py-1" type="submit">Salvar</button>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sweet Alert -->
    <script src="sweetalert2/sweetalert2.min.js">
    </script>

    <!-- Bootstrap -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"
    ></script>
    <script
        src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
        crossorigin="anonymous"
    ></script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/befb5dabd2.js" crossorigin="anonymous"></script>

    <!-- Jquery -->
    <script
        src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
        crossorigin="anonymous"
    ></script>

    <!-- Jquery Mask -->
    <script src="js/jquery.mask.min.js"></script>
    <script src="js/jquery.mask.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/RobinHerbots/Inputmask@3.3/dist/jquery.inputmask.bundle.js"></script>

    <script>
        $(document).ready(function () {
            $('.cpf').mask('000.000.000-00')
            $('.cell').mask('(00) 00000-0000')
            $('.data').mask('00/00/0000')

        });

        $('#salvar').on("click", function(e){
            e.preventDefault();

            $.ajax({
               type: "POST",
                url: 'posts/postAdd.php',
                data: $('.formCliente').serialize(),
                dataType: 'json',

                success: function(response) {
                    if(response.status) {
                        Swal.fire({title: 'Sucesso', html: response.message, icon: 'success'}).then(() => {window.location.href = "home.php"});
                    } else {
                        Swal.fire({title: 'Erro', html: response.message, icon: 'error'});
                    }
                } 
            });
        });
    </script>
    
</body>
</html>