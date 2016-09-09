<?php

    require_once "conexion.class.php";

    class Cliente {

        function listar()
        {

            $conn = new Conexion();

            try {
                $sql = "SELECT * FROM clientes";
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

    	function alta ($cliente) {
    		
            $conn = new Conexion();

            try {
                $sql = "INSERT INTO clientes VALUES(null, :nombre, :apellido, :fecha_nac, :nacionalidad, :activo)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam('nombre', $cliente['nombre'], PDO::PARAM_STR);
                $stmt->bindParam('apellido', $cliente['apellido'], PDO::PARAM_STR);
                $stmt->bindParam('fecha_nac', $cliente['fecha_nac'], PDO::PARAM_STR);
                $stmt->bindParam('nacionalidad', $cliente['nacionalidad'], PDO::PARAM_STR);
                $stmt->bindParam('activo', $cliente['activo'], PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $e) {
                $e->getMessage();
            }
    	}

    	function baja ($id) {
    		
            $conn = new Conexion();

            try {
                $sql = "DELETE FROM clientes WHERE id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam('id', $cliente['id'], PDO::PARAM_STR);
                $stmt->execute();

                if ($stmt->rowCount() == 1) {
                    return "Cliente dado de baja exitosamente.";
                }
            } catch (PDOException $e) {
                $e->getMessage();
            }

            return "Error al cargar cliente.";            

    	}

    	function modificar ($cliente) {
    		
            $conn = new Conexion();

            try {
                $sql = "UPDATE clientes SET nombre = :nombre, apellido = :apellido, fecha_nac = :fecha_nac, nacionalidad = :nacionalidad, activo = :activo WHERE id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam('id', $cliente['id'], PDO::PARAM_STR);
                $stmt->bindParam('nombre', $cliente['nombre'], PDO::PARAM_STR);
                $stmt->bindParam('apellido', $cliente['apellido'], PDO::PARAM_STR);
                $stmt->bindParam('fecha_nac', $cliente['fecha_nac'], PDO::PARAM_STR);
                $stmt->bindParam('nacionalidad', $cliente['nacionalidad'], PDO::PARAM_STR);
                $stmt->bindParam('activo', $cliente['activo'], PDO::PARAM_STR);
                $stmt->execute();

                if($stmt->rowCount() > 0)
                {
                    return "Cliente actualizado correctamente.";
                }

            } catch (PDOException $e) {
                $e->getMessage();
            }

            return "Error al actualizar cliente.";

    	}

    	function consulta ($id) {
    		
            $conn = new Conexion();

            try {
                $sql = "SELECT * FROM clientes WHERE id = :id";
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