<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="src/css/reset.css">
    <link rel="stylesheet" href="src/css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M-é-d-i-a</title>
</head>

<body>

    <div class="Container">

        <form method="POST" class="Formulario">
            <label for="Nome"> Nome: </label>
            <input type="text" name="Nome" id="Nome">

            <label for="Disciplina"> Disciplina: </label>
            <input type="text" name="Disciplina" id="Disciplina">

            <label for="Nota1"> Nota 1: </label>
            <input type="text" name="Nota1" id="Nota1">

            <label for="Nota2"> Nota 2: </label>
            <input type="text" name="Nota2" id="Nota2">

            <label for="Nota3"> Nota 3: </label>
            <input type="text" name="Nota3" id="Nota3">

            <button type="submit"> Submit</button>

        </form>

        <div class="Container-Result">

            <?php
            include_once './classes/Aluno.php';

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $Aluno = new Aluno();

                $Aluno->setNome($_POST['Nome']);
                $Aluno->setDisciplina($_POST['Disciplina']);
                $Aluno->setNota1($_POST['Nota1']);
                $Aluno->setNota2($_POST['Nota2']);
                $Aluno->setNota3($_POST['Nota3']);
                
                $Aluno->toHtml();
            }
            ?>

        </div>

    </div>

</body>

</html>