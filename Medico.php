<?php
class Medico {
    private $id;
    private $apellidos;
    private $nombres;
    private $especialidad;
    private $fechaNacimiento;
    private $correo;
    private $password;

    public function __construct($apellidos, $nombres, $especialidad, $fechaNacimiento, $correo, $password) {
        $this->id = rand(1000, 9999); // ID aleatorio
        $this->apellidos = $apellidos;
        $this->nombres = $nombres;
        $this->especialidad = $especialidad;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->correo = $correo;
        $this->password = $password;
    }

    // Getters
    public function getId() { return $this->id; }
    public function getApellidos() { return $this->apellidos; }
    public function getNombres() { return $this->nombres; }
    public function getEspecialidad() { return $this->especialidad; }
    public function getFechaNacimiento() { return $this->fechaNacimiento; }
    public function getCorreo() { return $this->correo; }
    public function getPassword() { return $this->password; }

    // Calcular edad
    public function calcularEdad() {
        $fecha = new DateTime($this->fechaNacimiento);
        $hoy = new DateTime();
        return $hoy->diff($fecha)->y;
    }
}
?>
