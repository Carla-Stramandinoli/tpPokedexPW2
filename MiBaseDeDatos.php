<?php
class MyBaseDeDatos extends \mysqli
{
    /** @var mysqli  */
    private $conexion;

    public function __construct(){
        $config = parse_ini_file("config.ini");

        $this->conexion = new mysqli(
            $config["hostname"],
            $config["username"],
            $config['password'],
            $config["database"],
            $config["port"]);
    }

    public function __destruct()
    {
       $this->conexion->close();
    }

    public function doQuery($sqlQuery): mysqli_result|bool
    {
       return $this->conexion->query($sqlQuery);
    }

    public function escape(string $valor): string
    {
        return $this->conexion->real_escape_string($valor);
    }
}

