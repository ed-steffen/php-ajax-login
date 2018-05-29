<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
  <script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    $('#btnsubmit').click(function() {
      $.ajax({
        type: "POST",
        url: 'php/login.php',
        data: {
          username: $("#username").val(),
          password: $("#password").val()
        },
        success: function(data)
        {
          if (data === 'success') {
            window.location.replace('profile.php');
          }
          else {
            alert("Wrong combination of username and password!");
          }
        }
      });
    });
  });
  </script>
</head>
<body>	
  <h2>Login</h2>
  <a href="index.php">Home</a>

  <form>
   Username: <input type="text" name="username" id="username"> <br>
   Password: <input type="password" name="password" id="password"> <br>
  </form>
   <button id="btnsubmit">Submit</button>
</body>
</html>