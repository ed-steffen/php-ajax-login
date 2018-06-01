<!DOCTYPE HTML>
<html lang="en-US">

<head>
  <meta charset="UTF-8">
  <title></title>
  <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script src="js/register.js" type="text/javascript">
  </script>
</head>

<body onload="buscarUsuarios()">
  <h2>Register</h2>
  <a href="index.php">Home</a>

  <form>
    First Name:
    <input type="text" name="firstname" id="firstname">
    <br> Last Name:
    <input type="text" name="lastname" id="lastname">
    <br> Username:
    <input type="text" name="username" id="username">
    <br> Password:
    <input type="password" name="password" id="password">
    <br>
  </form>
  <button id="btnsubmit">Submit</button>
  <div id="mensagem"></div>

  <div id="tabela">
    <table>
      <thead>
        <tr>
          <th width="40">ID</th>
          <th>Nome</th>
          <th>Sobrenome</th>
          <th>Usuário</th>
          <th>Senha</th>
          <th width="160">Ação</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
  <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script src="js/buscar.js" type="text/javascript"></script>

</body>

</html>