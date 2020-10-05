<?php
error_reporting(~E_NOTICE);
require_once "Dbconfig.php";

if (isset($_POST['btnsave'])) {
    $username = $_POST['user_name'];
    $userjob = $_POST['user_job'];
    $imgFile = $_FILES['user_image']['name'];
    $tmp_dir = $_FILES['user_image']['tmp_name'];
    $imgSize = $_FILES['user_image']['size'];
    $uid = $_POST['idempleado'];

    if (empty($username)) {
        $errMSG = "por favor ingrese su nombre";
    } else if (empty($userjob)) {
        $errMSG = "ingrese su trabajo";
    } else if (empty($imgFile)) {
        $errMSG = "por favor seleccione una imagen";
        $userpic = $_POST['imagenactual'];
    } else {
        
        $upload_dir = 'user_images/';
        $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));

        $valid_extensions = array('jpeg', 'jpg', 'png', 'git');

        $userpic = rand(1000, 1000000) . "." . $imgExt;
        if (!file_exists($_FILES['user_image']['tmp_name']))
        if (in_array($imgExt, $valid_extensions)) {
            if ($imgSize < 5000000) {
                move_uploaded_file($tmp_dir, $upload_dir . $userpic);
            } else {
                echo "Archivo demasiado grande";
            }
        } else {
            $errMSG = "tipo de archivo no admitido";
        }
    }
    if (!isset($errMSG)){
        if (isset($_POST['idempleado'])){
            $stmt = $DB_CON->prepare('INSERT INTO tbl_user(userName,userProfesion,userPic) values (:uname,:ujob,:upic)');
            $stmt->bindparam(':uname',$username);
            $stmt->bindparam(':ujob',$userjob);
            $stmt->bindparam(':upic',$userpic);
            
            if ($stmt->execute()){
                $succesMSG = "new record succesFully inserted...";
               // header("refresh:5;index.php");
               echo "<p>datos ingresados </p>";
            }else{
                $errMSG = "Error while inserting...";
                echo "<p>datos errones </p>";
            }
        }else{
            $stmt = $DB_CON->prepare('UPDATE tlb_users 
                    set userName = :uname,
                    userProfesion=:ujob
                    userPic= :upic
                    where userID=:uid');
             $stmt->bindparam(':uname',$username);    
             $stmt->bindparam(':ujob',$userjob);  
             $stmt->bindparam(':upic',$userpic);  
             $stmt->bindparam(':uid',$uid);     
        }
       
    }

}
?>