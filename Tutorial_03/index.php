
<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <section>
  <?php
  //$error='';
  //if(isset($_POST['submit'])){
   // echo $_POST['dob'];
    //echo $_POST['dob'];
    //$dob=$_POST['dob'];//correct
    //$tdy=new DateTime(date('y-m-d'));//correct
    //$age=date_diff(time($tdy),date_create($dob));
    //$age=date_diff($tdy,$dob);
    //$age=$tdy->diff($dob);//correct
    //echo "Your age is ".$age->y." years, ".$age->m." months and ".$age->d." days";//correct
 // } 
  if(isset($_POST['dob'])&& $_POST['dob'] != ''){
    echo calculateage($_POST['dob']);
  }
  else{
    echo "input your birth date first!";
  }
  function calculateage($dob){
    $bd=new DateTime($dob);
    $tdy=new DateTime(date('y-m-d'));
    $inputdob=new DateTime($_POST['dob']);

    $age=$tdy->diff($bd);
    return 'Your Age is ' . $age->y . ' Years ' . ' , ' . $age->m . ' months and ' . $age->d . ' days ';
    
  }
?></section>
    <form action="" method="POST" class="form">
    <h1>Age Calculator</h1>
    <div>
    <label>Date of birth : </label><input type="date" name="dob"><br>
    </div>
    <input type="submit" name="submit" value="Calculate" class="submit">
    </form>
  </body>
</html>
