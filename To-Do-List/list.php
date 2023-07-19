<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Lista de Tarefas</h1>

    <?php
        $host = "localhost";
        $dbname="todoList";
        $username="root";
        $password="";


        try{
            $conexao = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        }catch(PDOException $e){
            die("Erro ao conecatar-se ao banco de Dados: ". $e->getMessage());
        }

        function adicionarTarefas($description)
        {
            global $conexao;
            $sql = "INSERT INTO tasks (description) values(:description)";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(":description", $description);
            $stmt->execute();
        }


        function listarTarefas()
        {
            global $conexao;
            $sql = "SELECT * FROM tasks ORDER BY created_at DESC";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        


    ?>



</body>

</html>