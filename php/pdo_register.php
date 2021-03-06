<?php
    
    /*
    https://alexandrebbarbosa.wordpress.com/2016/09/04/php-pdo-crud-completo/


    https://forum.imasters.com.br/topic/554729-pegar-array-do-php-via-ajax/

    https://stackoverflow.com/questions/6395720/get-data-from-php-array-ajax-jquery


    BOM
    http://makitweb.com/return-json-response-ajax-using-jquery-php/

    */
    include_once 'pdo_server.php';

    // Verificar se foi enviando dados via POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = filter_input(INPUT_POST, 'id');
        $firstname = filter_input(INPUT_POST, 'firstname');
        $lastname = filter_input(INPUT_POST, 'lastname');
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');

    } else if (!isset($id)) {
    // Se não se não foi setado nenhum valor para variável $id
        $id = (isset($_GET["id"]) && $_GET["id"] != null) ? $_GET["id"] : "";
    }

    // Bloco If que Salva os dados no Banco - atua como Create e Update
    if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && $firstname != "") {
        try {
            if ($id != "") {
                $stmt = $conexao->prepare("UPDATE tbl_accounts SET firstname=?, lastname=?,username=?, password=? WHERE id = ?");
                $stmt->bindParam(5, $id);
            } else {
                $stmt = $conexao->prepare("INSERT into tbl_accounts (firstname, lastname, username, password) VALUES (?, ?, ?, ?)");
            }
            $stmt->bindParam(1, $firstname);
            $stmt->bindParam(2, $lastname);
            $stmt->bindParam(3, $username);
            $stmt->bindParam(4, $password);

            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    echo "SIM";
                    $id = null;
                    $firstname = null;
                    $lastname = null;
                    $username = null;
                    $password = null;
                } else {
                    echo "NAO";
                }
            } else {
                echo "ERRO";
            }
        } catch (PDOException $erro) {
            echo "Erro: " . $erro->getMessage();
        }
    } 
    
    if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "sel") {
        $stmt = $conexao->prepare("select * from tbl_accounts order by id desc");
        $stmt->execute();
        while($row = $stmt->fetch()){
            $id = $row['id'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $username = $row['username'];
            $password = $row['password'];
        
            $return_arr[] = array(
                "id" => $id,
                "firstname" => $firstname,
                "lastname" => $lastname,
                "username" => $username,
                "password" => $password
            );
        }
        echo json_encode($return_arr);

    }

?>