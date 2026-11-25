<!DOCTYPE HTML>  
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = $phoneErr = "";
$name = $email = $gender = $comment = $website = $phone = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if (empty($_POST["phone"])) {
    $phoneErr = "Phone is required";
  } else {
    $phone = test_input($_POST["phone"]);
  }

  if (empty($_POST["empleados"])) {
    $empleadoErr = "Rol is required";
  } else {
    $empleados = $_POST["empleados"];

    if (count($empleados) > 1) {
      $rol1 = $empleados[0];
      $rol2 = $empleados[1];
    } else {
      $rol = $empleados[0];
    }
  }

  if (isset($empleados)) {
      $operario = false;
      $jefeDPTO = false;
      $director = false;

    if (in_array("operario", $empleados)) {
      $operario = true;
    }
    if (in_array("jefeDPTO", $empleados)) {
      $jefeDPTO = true;
    }
    if (in_array("director", $empleados)) {
      $director = true;
    }
  }
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <label>Name:</label> <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  <label>E-mail:</label> <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  <label >Website:</label> <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  <label>Comment:</label> <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>

  <!--
    Esta sería la versión con el prefijo "fijo" (vágame la redundancia), de +34:
  
  <label>Phone:</label> <input type="text" name="phone" pattern="\+34 [67][0-9]{8}" value = "<?= $phone ?>">
  <span class="error">* <?php echo $phoneErr; ?></span>
  <br><br>
  
  Y esta sería la versión con prefijo variable:-->

  <label>Phone:</label> <input type="text" name="phone" pattern="\+[0-9]{2} [67][0-9]{8}" value = "<?= $phone ?>">
  <span class="error">* <?php echo $phoneErr; ?></span>
  <br><br>

  <label>Gender:</label>
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>

  <label>Empleados:</label><br>
  <ul>
    <li>Operario: <input type="checkbox" class="checkbox" name="empleados[]" id="operario" <?php if($operario) echo "checked"; ?> value="operario"></li>
    <li>Jefe de Departamento: <input type="checkbox" class="checkbox" name="empleados[]" id="jefeDPTO" <?php if($jefeDPTO) echo "checked"; ?> value="jefeDPTO"></li>
    <li>Director: <input type="checkbox" class="checkbox" name="empleados[]" id="director" <?php if($director) echo "checked"; ?> value="director"><span class="esconder" id="mensajeDirector">Debes seleccionar director como opción única</span></li>
  </ul>
  <span class="error">* <?php echo $empleadoErr; ?></span>
  <br><br>

  <input type="submit" name="submit" value="Submit">
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
echo "<br>";
echo $phone;
echo "<br>";
if (empty($rol1)&&empty($rol2)) {
  echo "Rol: <br>";
  echo $rol;
} else {
  echo "Roles: <br>";
  echo "<ul>";
  echo "<li>".$rol1."</li>";
  echo "<li>".$rol2."</li>";
  echo "</ul>";
}
?>

<script src="script.js" defer></script>

</body>
</html>