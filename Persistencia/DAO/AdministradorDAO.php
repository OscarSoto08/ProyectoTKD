<?
require('DAO.php');
require('/Logica/Administrador.php');

class AdministradorDAO extends DAO {
    // Constructor
    public function __construct($conexion) {
        parent::__construct($conexion);  // Llama al constructor de la clase base DAO
    }

    // Método para autenticar administrador
    public function autenticar($correo, $clave) {
        $sql = "SELECT idAdministrador, nombre, apellido, foto, correo, clave, telefono, estado
                FROM Administrador
                WHERE correo = ?";
        $stmt = $this->conexion->prepare($sql);
        if ($stmt === false) {
            return false;
        }
        $stmt->bind_param('s', $correo);
        $stmt->execute();
        $resultado = $stmt->get_result();
        if ($resultado->num_rows > 0) {
            $registro = $resultado->fetch_assoc();
            if (password_verify($clave, $registro['clave'])) {
                return $registro;
            }
        }
        return false;
    }

    // Método para consultar todos los administradores
    public function consultarTodos() {
        $sql = "SELECT idAdministrador, nombre, apellido, foto, correo, clave, telefono, estado 
                FROM Administrador";
        $this->getConexion()->iniciarConexion();
        $administradores = array();
        $result = $this->getConexion()->ejecutarConsulta($sql);
        while ($registro = $this->getConexion()->extraer($result)) {
            $administrador = new Administrador(
                $registro['idAdministrador'],
                $registro['nombre'],
                $registro['apellido'],
                $registro['correo'],
                $registro['clave'],
                $registro['foto'], 
                $registro['telefono'],
                $registro['estado']
            );
            array_push($administradores, $administrador);
        }
        $this->getConexion()->cerrarConexion();
        return $administradores;
    }

    // Método para consultar un administrador por ID
    public function consultarPorId($id) {
        $sql = "SELECT idAdministrador, nombre, apellido, foto, correo, clave, telefono, estado
                FROM Administrador
                WHERE idAdministrador = ?";
        $this->getConexion()->iniciarConexion();
        $stmt = $this->getConexion()->prepararConsulta($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $this->getConexion()->cerrarConexion();

        if ($resultado && $resultado->num_rows == 1) {
            $registro = $resultado->fetch_assoc();
            return new Administrador(
                $registro['idAdministrador'],
                $registro['nombre'],
                $registro['apellido'],
                $registro['correo'],
                $registro['clave'],
                $registro['foto'], 
                $registro['telefono'],
                $registro['estado']
            );
        }

        return null;
    }

    // Método para insertar un nuevo administrador
    public function insertar($administrador) {
        $sql = "INSERT INTO Administrador (nombre, apellido, foto, correo, clave, telefono, estado)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $this->getConexion()->iniciarConexion();
        $stmt = $this->getConexion()->prepararConsulta($sql);
        $hashedPassword = password_hash($administrador->getClave(), PASSWORD_BCRYPT);
        $stmt->bind_param(
            'ssssssss',
            $administrador->getNombre(),
            $administrador->getApellido(),
            $administrador->getFoto(),
            $administrador->getCorreo(),
            $hashedPassword,
            $administrador->getTelefono(),
            $administrador->getEstado()
        );
        $stmt->execute();
        $this->getConexion()->cerrarConexion();
    }

    // Método para actualizar un administrador
    public function actualizar($administrador) {
        $sql = "UPDATE Administrador 
                SET nombre = ?, apellido = ?, foto = ?, correo = ?, clave = ?, telefono = ?, estado = ?
                WHERE idAdministrador = ?";
        $this->getConexion()->iniciarConexion();
        $stmt = $this->getConexion()->prepararConsulta($sql);
        $hashedPassword = password_hash($administrador->getClave(), PASSWORD_BCRYPT);
        $stmt->bind_param(
            'ssssssssi',
            $administrador->getNombre(),
            $administrador->getApellido(),
            $administrador->getFoto(),
            $administrador->getCorreo(),
            $hashedPassword,
            $administrador->getTelefono(),
            $administrador->getEstado(),
            $administrador->getIdAdministrador()
        );
        $stmt->execute();
        $this->getConexion()->cerrarConexion();
    }

    // Método para eliminar un administrador
    public function eliminar($id) {
        $sql = "DELETE FROM Administrador WHERE idAdministrador = ?";
        $this->getConexion()->iniciarConexion();
        $stmt = $this->getConexion()->prepararConsulta($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $this->getConexion()->cerrarConexion();
    }
}
