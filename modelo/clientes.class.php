<?php

    include "conexion.class.php";

    public function listar()
    {

        $conn = new conexion();

        try {
            $sql = "SELECT * FROM clientes";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $sql->fetchAll();

            if($stmt->rowCount() > 0)
            {
                $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $clientes;
            }

        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

	public function alta ($nombre, $apellido, $fecha_nac, $nacionalidad, $activo) {
		
        $conn = new conexion();

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

	public function baja ($id) {
		
        $conn = new conexion();

        try {
            $sql = "DELETE FROM clientes WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam('id', $cliente['id'], PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() == 1) {
                return "Cliente dado de alta exitosamente.";
            } else {
                return "Error al cargar cliente.";
            }

        } catch (PDOException $e) {
            $e->getMessage();
        }
	}

	public function modificacion ($id, $nombre, $apellido, $fecha_nac, $nacionalidad, $activo) {
		
        $conn = new conexion();

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
            else
            {
                return "Error al actualizar cliente.";
            }

        } catch (PDOException $e) {
            $e->getMessage();
        }
	}

	public function consulta ($id) {
		
        $conn = new conexion();

        try {
            $sql = "SELECT * FROM clientes WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            $stmt->execute();

            if($stmt->rowCount() == 1)
            {
                $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
                return $cliente;
            } else {
                return "No se pudo encontrar al cliente.";
            }
            
        }catch (PDOException $e) {
            $e->getMessage();
        }
	}