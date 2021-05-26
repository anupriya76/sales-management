
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="css/logincss.css" type="text/css">
</head>
<body> 
<form method="post" autocomplete="off" action="valid.php" >
<div class="page">
  <div class="container">
    <div class="left">
      <div class="login">Login AS A</div>
      <div class="eula"> <label for="role">Choose Role:	</label>
				<select id="role" name="role">
					<option>You are.. </option>
					
					<option value="admin">Admin</option>
					<option value="supervisor">Supervisor </option>
					<option value="salesman">Salesman </option>
				</select>
   </div>
	</div>
    <div class="right">
      <svg viewBox="0 0 300 280">
        <defs>
          <linearGradient
                          inkscape:collect="always"
                          id="linearGradient"
                          x1="20"
                          y1="193"
                          x2="300"
                          y2="193"
                          gradientUnits="userSpaceOnUse">
            <stop
                  style="stop-color:#F0DB4F;"
                  offset="0"
                   />
            <stop
                  style="stop-color:#6CB78A;"
                  offset="0.4"
                  />
            <stop
                  style="stop-color:#4EA217;"
                  offset="1"
                  />      
          </linearGradient>
        </defs>
        <rect x="15" y="100" rx="5" ry="150" width="270" height="4" fill="url(#linearGradient)"/>
      </svg>
       <svg ID="LG2" viewBox="0 0 300 280">
        <defs>
          <linearGradient
                          inkscape:collect="always"
                          id="linearGradient2"
                          x1="20"
                          y1="193"
                          x2="300"
                          y2="193"
                          gradientUnits="userSpaceOnUse">
            <stop
                  style="stop-color:#F0DB4F;"
                  offset="0"
                   />
            <stop
                  style="stop-color:#6CB78A;"
                  offset="0.4"
                  />
            <stop
                  style="stop-color:#4EA217;"
                  offset="1"
                  />      
          </linearGradient>
        </defs>
        <rect x="15" y="100" rx="5" ry="150" width="270" height="4" fill="url(#linearGradient2)"/>
      </svg>
      <div class="form">
        <label for="email">Email</label>
        <input  type="text" name="username" placeholder="username"  required>
        <label for="password">Password</label>
        <input name="password" type="password" placeholder="password" required>
        <input type="submit" id="submit" name="submit" value="Submit">
        
      </div>
    </div>
  </div>
</div>

</form>
</body>
</html>
