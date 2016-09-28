<?php

    require_once "conexion.class.php";

    class Usuario {

        // Devolvemos el usuario
        function buscarUsuario($nombre_usuario)
        {

            $conn = new Conexion();

            try {
                $sql  = "SELECT * " .
                        "FROM usuarios " . 
                        "WHERE usuarios.nombre_usuario = :nombre_usuario";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam('nombre_usuario', $nombre_usuario, PDO::PARAM_STR);
                $stmt->execute();

                if($stmt->rowCount() == 1)
                {
                    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $usuario;
                }

            }catch (PDOException $e) {
                $e->getMessage();
            }
        }
    }