<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validação no backend</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    
    <div class="container mt-5">
        <h1 class="display-4">Validando formulários com PHP</h1>

        <div class="w-50 bg-light p-4 fs-5 mt-5 border">
            <form action="valida.php" method="POST">
                <div class="row">
                    <div class='col-md-6 col-12'>
                        <label for="nome" class="mb-1">Seu nome: </label>
                        <input type="text" name="nome" id="nome" class="form-control" minlength="3" maxlength="100" required>
                    </div>
                    <div class='col-md-6 col-12'>
                        <label for="email" class="mb-1">Seu e-mail: </label>
                        <input type="email" name="email" id="email" class="form-control" minlength="3" maxlength="100" required>
                    </div>
                </div>

                <div class="mt-3">
                    <label for="coment" class="mb-1">Comentarário</label>
                    <textarea class="form-control" id="coment" name="coment" style="height: 160px;"></textarea>
                </div>

                <div class="mt-4">
                    <button class="btn btn-primary fs-5 px-5" name="send">Enviar</button>
                </div>
            </form>
        </div>
    </div>    


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>