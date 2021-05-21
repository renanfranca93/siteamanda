<?php
include 'assets/services/conn.php';

$msg="";

if(isset($_POST['accesskey'])){

    $select_query = "SELECT * FROM keys_lg WHERE key_lg = '".$_POST['accesskey']."'";

    $executed = mysqli_query($con, $select_query);

    $result = mysqli_fetch_array($executed, MYSQLI_ASSOC);

    $reference = null;

    if (!is_null($result)) {
    $reference = $result['reference'];
    $language = $result['language'];
    $range = $result['range_lg'];
    }


    if (!is_null($reference)) {
        session_start();

        $_SESSION["language"]=$language;
        $_SESSION["reference"]=$reference;
        $_SESSION["range"]=$range;

        if($_SESSION["reference"]=="teacher"){
            header("Location: panel.php");     
        }else{
            if($_SESSION["language"]=="ek"){
            header("Location: portalkid.php"); 
            }else{
                header("Location: portal.php"); 
            }
        }
        
    }
    else $msg="Senha incorreta!";
}

?>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Include the above in your HEAD tag -->

<link rel="stylesheet" href="css/loginstyle.css">
<div class="main">
    
    
    <div class="container">
<center>
<div class="middle">
      <div id="login">

        <form action="login.php" method="post">

          <fieldset class="clearfix">

            <!-- <p ><span class="fa fa-user"></span><input type="text"  Placeholder="Username" required></p>  -->
            <p><span class="fa fa-lock"></span><input type="password" name="accesskey"  Placeholder="Chave de acesso" required></p> <!-- JS because of IE support; better: placeholder="Password" -->
            
             <div>
                                 <span style=" color:red; text-align:left;  display: inline-block;">&nbsp;<?php echo $msg; ?></span>
                                <span style="width:50%; text-align:right;  display: inline-block;"><input type="submit" value="Entrar"></span>
                            </div>

          </fieldset>
<div class="clearfix"></div>
        </form>

        <div class="clearfix"></div>

      </div> <!-- end login -->
      <div class="logo"><img width="200px" src="assets/img/logo.png">
          
          <div class="clearfix"></div>
      </div>
      
      </div>
</center>
    </div>

</div>