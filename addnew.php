<!DOCTYPE html>
<?php
error_reporting (~E_NOTICE);
require_once "Dbconfig.php";

if (isset($_POST['btnsave'])){
$user = $_POST['user_name'];
$userjob = $_POST['user_job'];
    
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