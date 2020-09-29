<!DOCTYPE html>
<?php
error_reporting(~E_NOTICE);
require_once "Dbconfig.php";

if (isset($_POST['btnsave'])) {
    $username = $_POST['user_name'];
    $userjob = $_POST['user_job'];
    $imgFile = $_FILES['user_image']['name'];
    $tmp_dir = $_FILES['user_image']['tmp_name'];
    $imgSize = $_FILES['user_image']['size'];

    if (empty($username)) {
        $errMSG = "por favor ingrese su nombre";
    } else if (empty($userjob)) {
        $errMSG = "ingrese su trabajo";
    } else if (empty($imgFile)) {
        $errMSG = "por favor seleccione una imagen";
    } else {
        $upload_dir = 'user_images/';
        $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));

        $valid_extensions = array('jpeg', 'jpg', 'png', 'git');

        $userpic = rand(1000, 1000000) . "." . $imgExt;

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
        $stmt = $DB_CON->prepare('INSERT INTO tbl_user(userName,userProfesion,userPic) values (:uname,:ujob,:upic)');
        $stmt->bindparam(':uname',$username);
        $stmt->bindparam(':ujob',$userjob);
        $stmt->bindparam(':upic',$userpic);
        
        if ($stmt->execute()){
            $succesMSG = "new record succesFully inserted...";
            header("refresh:5;index.php");
        }else{
            $errMSG = "Error while inserting...";
        }
    }

}
?>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Perfil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">

</head>

<body>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="user_name" class="col-sm-2 control-label">Username.</label>
                    <div class="col-sm-10">
                        <input type="text" name="user_name" id="user_name" placeholder="Ingrese nombre"
                            class="form-control" value="<?php echo $username; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="user_job" class="col-sm-2 control-label">Profession.</label>
                    <div class="col-sm-10">
                        <input type="text" name="user_job" id="user_job" placeholder="Ingrese profesion"
                            class="form-control" value="<?php echo $userjob; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="user_image" class="col-sm-2 control-label">Profil Img</label>
                    <div class="col sm-10">
                        <input type="file" name="user_image" id="user_image" placeholder="Your profession"
                            value="<?php echo $userjob; ?>" class="input-group">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 offset-sm-4">
                        <button type="submit" name="btnsave" class="btn btn-success">
                            <span class="glyphicon glyphicon-save"></span>&nbsp; save
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>

    <script src="js/jq.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
</body>

</html>