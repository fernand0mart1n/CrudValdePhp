<?php

    require_once "conexion.class.php";

    class Usuario {

        // función que devuelve el usuario
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

        // función que trae los permisos
        function buscarPermisos($id)
        {

            $conn = new Conexion();

            try {
                $sql  = "SELECT usuario_rol.rol " .
                        "FROM usuario_rol " . 
                        "WHERE usuario = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam('id', $id, PDO::PARAM_STR);
                $stmt->execute();

                if($stmt->rowCount() > 0)
                {
                    $permisos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    return $permisos;
                
                }

            }catch (PDOException $e) {
                $e->getMessage();
            }
        }
    }