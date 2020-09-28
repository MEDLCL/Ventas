<? PHP
$DB_HOST = 'LOCALHOST';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'prueba';


try
{
    $DB_CON = NEW PDO ("mysql:host = {$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
    $DB_CON->setAttibute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXEPTION);
}
catch(){
    echo $e->getMessage();
}

?>