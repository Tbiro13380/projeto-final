<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Login</title>

        <link rel="stylesheet" href="styles/index.css" />

        <!-- Bootstrap -->

        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
            crossorigin="anonymous"
        />

        <!-- Sweet Alert -->
        <link rel="stylesheet" href="sweetalert2/sweetalert2.min.css" />
    </head>
    <body style="background-color: #3c3a3c">
        <section id="login">
            <div class="container">
                <div
                    class="row d-flex justify-content-center align-items-center"
                >
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card mt-5" style="border-radius: 30px">
                            <div class="mb-1 text-center">
                                <img
                                    class="logo"
                                    src="imgs/logo.png"
                                    alt="Logo"
                                />
                            </div>

                            <form
                                method="post"
                                class="needs-validation formLogin"
                            >
                                <div class="container mt-5 w-75">
                                    <h4 class="mb-4"><b>Bem-vindo</b></h4>

                                    <div class="form-group was-validated mb-4">
                                        <label for="email" class="form-label"
                                            >E-mail</label
                                        >
                                        <input
                                            type="text"
                                            name="email"
                                            class="form-control form-control-lg"
                                            required
                                        />
                                    </div>
                                    <div class="form-group was-validated mb-4">
                                        <label for="senha" class="form-label"
                                            >Senha</label
                                        >
                                        <input
                                            type="password"
                                            name="senha"
                                            class="form-control form-control-lg"
                                            required
                                        />
                                    </div>

                                    <div
                                        id="login-box"
                                        class="d-flex justify-content-center pb-5 mt-5"
                                    >
                                        <button
                                            class="btn btn-success w-100 btn-block btn-lg"
                                            id="login-btn"
                                            type="submit"
                                            name="login"
                                            value="Login"
                                        >
                                            Login
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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

        <!-- Jquery -->
        <script
            src="https://code.jquery.com/jquery-3.6.3.min.js"
            integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
            crossorigin="anonymous"
        ></script>

        <script>
            $('#login-btn').on("click", function(e){
                e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: 'posts/postLogin.php',
                    data: $('.formLogin').serialize(),
                    dataType: 'json',

                    success: function(response) {
                        if(response.status) {
                            document.location.href = 'home.php';
                        } else {
                            Swal.fire({title: 'Erro', html: response.message, icon: 'error'});
                        }
                    }

                });
            });
        </script>
    </body>
</html>
