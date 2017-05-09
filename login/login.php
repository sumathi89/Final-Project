<html>
<head>
<link rel="stylesheet" type="text/css" href="./css/main.css">
 </head>
 <body>
 <div class='container' align="center">
 <h1  align="center"><b>Online To-do List System </b></h1>
  <form method = "post" action="https://web.njit.edu/~ss3467/online_store/index.php" class="login">
 <div>
 <label><b>Username</b></label>
 <input type="text" name="reg_uname" placeholder="Enter Username" required>
 </div>
 <br>
 <div>
 <label><b>Password</b></label>
 <input type="password" name="reg_password" placeholder="Enter Password"
 required>
 <input type ="hidden" name="action" value="validate_user">
 </div>
 <br>
<table>
<tr>
<td>
<div>
 <button type="submit">Login</button>     
 </div>
  </form>
  </td>
  <td>
 <form action="https://web.njit.edu/~ss3467/online_store/login/sign-up.php" class="register">
 <div>
 <button type="submit">Sign up</button>
 </div>
 </form>
 </td>
 </tr>
 </table>
 </div>
 </body>
 </html>
