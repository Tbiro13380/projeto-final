<?php
    if(!isset($_SESSION)) {
        session_start();
    }


    if(!isset($_SESSION['UsuarioID'])) {
        session_destroy();

        header("Location: index.php");
    }

    include 'config/conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Home</title>

        <link rel="stylesheet" href="teste.css" />

        <!-- Bootstrap -->

        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
            crossorigin="anonymous"
        />
    </head>
    <body>
        <div class="row">
            <div class="col-2 pe-0">
                <div class="top-left" style="background-color: #3c3a3c">
                    <img
                        src="imgs/logo.png"
                        class="ps-5 mt-3"
                        alt="Logo"
                        id="logo"
                    />
                </div>
                <div class="bottom-left pt-3">
                    <h3 class="ps-3 bottom-text">
                        <i class="fa-solid fa-user pe-2"></i>
                        <a href="" style="color: inherit;"> Clientes </a>
                    </h3>
                </div>
            </div>

            <div class="col-10 ps-0">
                <div class="top-right">
                    <div class="d-flex justify-content-end align-items-center h-100 me-4">
                        <h3 class="pe-3 pt-2" id="user-text"><?php echo $_SESSION['UsuarioNome']; ?></h3>
                        <img src="imgs/user.png" alt="user" style="cursor: pointer;" id="user" class="img-responsive pb-1 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"/>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="sair.php">Sair</a></li>
                        </ul>
                    </div>
                </div>
                <div class="bottom-right">
                    <div class="px-5 pt-3">
                        <div style="display: flex; justify-content: space-between">
                            <h2>Clientes</h2>
                            <a href="adicionar.php">
                                <i
                                    class="fa-solid fa-plus"
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
                        <div>
                            <table
                                class="table mt-3"
                                style="overflow: hidden; border-radius: 10px 10px 0px 0px; box-shadow: 5px 5px 55px -10px rgba(0,0,0,0.10);"
                            >
                                <thead class="table-dark text-center">
                                    <tr>
                                        <th scope="col">NOME COMPLETO</th>
                                        <th scope="col">CPF</th>
                                        <th scope="col">CELULAR</th>
                                        <th scope="col">E-MAIL</th>
                                        <th scope="col">STATUS</th>
                                        <th scope="col">AÇÃO</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center" style="background-color: white">
                                    <?php
                                        $sqlClientes = "SELECT * FROM clientes ORDER BY nome ASC";

                                        foreach($conn->query($sqlClientes)->fetchAll(PDO::FETCH_OBJ) as $lnCliente){ ?>
                                        <tr>
                                            <td><?php echo $lnCliente->nome ?></td>
                                            <td class="cpf"><?php echo $lnCliente->cpf ?></td>
                                            <td class="cell"><?php echo $lnCliente->celular ?></td>
                                            <td><?php echo $lnCliente->email ?></td>
                                            <td><?php echo $lnCliente->status ?></td>
                                            <td>
                                                <a
                                                    href="editar.php?id=<?php echo $lnCliente->id ?>"
                                                    style="
                                                        text-decoration: none;
                                                        color: white;
                                                        background-color: #feaa29;
                                                        padding: 3% 13%;
                                                        border-radius: 30%;
                                                    "
                                                    >Ver</a
                                                >
                                            </td>
                                        </tr>
                                        <?
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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

        <script>
            $(document).ready(function () {
                $('.cpf').mask('000.000.000-00')
                $('.cell').mask('(00) 00000-0000')
            });
        </script>
    </body>
</html>
