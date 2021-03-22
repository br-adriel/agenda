<!DOCTYPE html>
<html lang="pr-br">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="Equipe agenda" />
        <meta name="theme-color" content="#ffffff">
        <title>Erro 404 | Agenda</title>
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div id="layoutError">
            <div id="layoutError_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="text-center mt-4">
                                    <img class="mb-4 img-error" src="{{ asset('assets/img/error-404-monochrome.svg') }}" />
                                    <p class="lead">Página não encontrada</p>
                                    <h2>{{ $exception->getMessage() }}</h2>
                                    <a href="{{ url()->previous() }}">
                                        <i class="fas fa-arrow-left mr-1"></i>
                                        Voltar a página anterior
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutError_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Agenda 2021</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
    </body>
</html>
