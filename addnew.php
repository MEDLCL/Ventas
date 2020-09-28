<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Perfil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">

</head>

<body>
    <form action="" method="post" enctype="multipart/form-data" class="form-Horizontal">
        <table class="table table-bordered table-responsive">
            <tr>
                <td><label for="" class="control-label">Username.</label>
                </td>
                <td> <input type="text" name="user_name" id="user_name" placeholder="Ingrese nombre"
                        class="form-control" value="<?php echo $username; ?>"></td>
            </tr>
            <tr>
                <td><label for="" class="control-label">Profession(Job)</label></td>
                <td><input type="text" name="user_job" id="user_job" placeholder="Your profession" clase="form-control"
                        value="<?php echo $userjob; ?>"></td>
            </tr>
            <tr>
                <td><label for="" class="control-label">Profil Img</label></td>
                <td><input type="file" name="user_image" id="user_image" placeholder="Your profession"
                        value="<?php echo $userjob; ?>" class="input-group"></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name="btnsave" calss btn btn-default>
                        <span class="glyphicon glyphicon-save"></span>&nbsp; save
                    </button>
                </td>

            </tr>

        </table>
    </form>
    <script src="bootstrap/js/bootstrap.js"></script>
</body>

</html>