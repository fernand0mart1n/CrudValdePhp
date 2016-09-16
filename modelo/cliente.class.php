<?php

    require_once "conexion.class.php";
    
    // Constantes usadas en el activocontroller para el funcionamiento de activar/desactivar
    const ACTIVO = 1;
    const INACTIVO = 0;

    class Cliente {

        // Listado
        function listar()
        {

            $conn = new Conexion();

            try {
                $sql  = "SELECT clientes.id, clientes.nombre, clientes.apellido, clientes.fecha_nac, " .
                        "clientes.activo, nacionalidades.nacionalidad FROM clientes " . 
                        "JOIN nacionalidades " .
                        "ON clientes.nacionalidad_id = nacionalidades.id";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll();

                if($stmt->rowCount() > 0)
                {
                    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    return $clientes;
                }

            }catch (PDOException $e) {
                $e->getMessage();
            }
        }

        // Alta
    	function alta ($cliente) {
    		
            $conn = new Conexion();

            try {
                $sql  = "INSERT INTO clientes " . 
                        "VALUES(null, :nombre, :apellido, :fecha_nac, :nacionalidad_id, :activo)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam('nombre', $cliente['nombre'], PDO::PARAM_STR);
                $stmt->bindParam('apellido', $cliente['apellido'], PDO::PARAM_STR);
                $stmt->bindParam('fecha_nac', $cliente['fecha_nac'], PDO::PARAM_STR);
                $stmt->bindParam('nacionalidad_id', $cliente['nacionalidad_id'], PDO::PARAM_STR);
                $stmt->bindParam('activo', $cliente['activo'], PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $e) {
                $e->getMessage();
            }
    	}

        // Baja
    	function baja ($id) {
    		
            $conn = new Conexion();

            try {
                $sql  = "DELETE FROM clientes WHERE id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam('id', $id, PDO::PARAM_STR);
                $stmt->execute();

                return true;

            } catch (PDOException $e) {
                $e->getMessage();
            }

            return false;            

    	}

        // Modificación
    	function modificar ($cliente) {
    		
            $conn = new Conexion();

            try {
                $sql  = "UPDATE clientes " . 
                        "SET nombre = :nombre, apellido = :apellido, " . 
                        "fecha_nac = :fecha_nac, nacionalidad_id = :nacionalidad_id, activo = :activo " .
                        "WHERE id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam('id', $cliente['id'], PDO::PARAM_STR);
                $stmt->bindParam('nombre', $cliente['nombre'], PDO::PARAM_STR);
                $stmt->bindParam('apellido', $cliente['apellido'], PDO::PARAM_STR);
                $stmt->bindParam('fecha_nac', $cliente['fecha_nac'], PDO::PARAM_STR);
                $stmt->bindParam('nacionalidad_id', $cliente['nacionalidad_id'], PDO::PARAM_STR);
                $stmt->bindParam('activo', $cliente['activo'], PDO::PARAM_STR);
                $stmt->execute();

                if($stmt->rowCount() > 0)
                {
                    return true;
                }

            } catch (PDOException $e) {
                $e->getMessage();
            }

            return false;

    	}

        // Activación/desactivación
        function activo ($id, $cambio) {
            
            $conn = new Conexion();

            try {
                $sql  = "UPDATE clientes " . 
                        "SET activo = :activo " . 
                        "WHERE id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam('id', $id, PDO::PARAM_STR);
                $stmt->bindParam('activo', $cambio, PDO::PARAM_STR);
                $stmt->execute();

                if($stmt->rowCount() > 0)
                {
                    return true;
                }

            } catch (PDOException $e) {
                $e->getMessage();
            }

            return false;

        }

        // Consulta específica de un cliente
    	function consulta ($id) {
    		
            $conn = new Conexion();

            try {
                $sql  = "SELECT clientes.id, clientes.nombre, clientes.apellido, " .
                        "clientes.fecha_nac, clientes.nacionalidad_id, clientes.activo, nacionalidades.nacionalidad " .
                        "FROM clientes " . 
                        "JOIN nacionalidades ON clientes.nacionalidad_id = nacionalidades.id " .
                        "WHERE clientes.id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_STR);
                $stmt->execute();

                if($stmt->rowCount() == 1)
                {
                    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $cliente;
                }
                
            }catch (PDOException $e) {
                $e->getMessage();
            }

            return "No se pudo encontrar al cliente.";
            
    	}
    }