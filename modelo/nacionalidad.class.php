<?php

    require_once "conexion.class.php";

    class Nacionalidad {

        function listar()
        {

            $conn = new Conexion();

            try {
                $sql  = "SELECT * FROM nacionalidades";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll();

                if($stmt->rowCount() > 0)
                {
                    $nacionalidades = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    return $nacionalidades;
                }

            }catch (PDOException $e) {
                $e->getMessage();
            }
        }
    }