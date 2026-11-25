<?php

class Empleado
{
    private $nombre;
    private $apellidos;
    private $fechaNac;
    private $sueldo;
    private $categoria;
    private $sexo;
    private $aficiones;
    private $foto;

    private $errores = [];

    public function __construct()
    {
        $this->nombre = "";
        $this->apellidos = "";
        $this->fechaNac = "";
        $this->sueldo = "";
        $this->categoria = "";
        $this->sexo = "";
        $this->aficiones = [];
        $this->foto = "";
    }

    public function validar($datos)
    {
        $this->validarNombre($datos);
        $this->validarApellidos($datos);
        $this->validarFecha($datos);
        $this->validarSueldo($datos);
        $this->validarCategoria($datos);
        $this->validarSexo($datos);
        $this->validarAficiones($datos);
        $this->validarFoto();

        $this->comprobarSueldoCategoria();
        $this->comprobarEdad();
        $this->comprobarAficiones();

        return empty($this->errores);
    }

    private function validarNombre($datos)
    {
        if (empty($datos['nombre'])) {
            $this->errores['nombre'] = "Nombre está vacío";
        } elseif (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ-]{3,}$/', $datos['nombre'])) {
            $this->errores['nombre'] = "El nombre no es válido";
        } else {
            $this->nombre = Sanear::sanear($datos['nombre']);
        }
    }

    private function validarApellidos($datos)
    {
        if (empty($datos['apellidos'])) {
            $this->errores['apellidos'] = "Apellidos están vacíos";
        } elseif (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ-]{3,}( [a-zA-ZáéíóúÁÉÍÓÚñÑ-]{3,})+$/', $datos['apellidos'])) {
            $this->errores['apellidos'] = "Los apellidos no son válidos";
        } else {
            $this->apellidos = Sanear::sanear($datos['apellidos']);
        }
    }

    private function validarFecha($datos)
    {
        if (empty($datos['fechaNac'])) {
            $this->errores['fechaNac'] = "La fecha de nacimiento está vacía";
        } else {
            $partes = explode("-", $datos['fechaNac']);

            if (count($partes) != 3 || !checkdate((int)$partes[1], (int)$partes[2], (int)$partes[0])) {
                $this->errores['fechaNac'] = "La fecha no es válida";
            } else {
                $this->fechaNac = Sanear::sanear($datos['fechaNac']);
            }
        }
    }

    private function validarSueldo($datos)
    {
        if (empty($datos['sueldo'])) {
            $this->errores['sueldo'] = "Sueldo está vacío";
        } elseif (!is_numeric($datos['sueldo'])) {
            $this->errores['sueldo'] = "Sueldo no es un número";
        } else {
            $this->sueldo = Sanear::sanear((float)$datos['sueldo']);
        }
    }

    private function validarCategoria($datos)
    {
        $categorias = ["peon", "oficial", "jefeDepto", "director"];

        if (empty($datos['categoria'])) {
            $this->errores['categoria'] = "Categoría está vacía";
        } elseif (!in_array($datos['categoria'], $categorias)) {
            $this->errores['categoria'] = "La categoría no es válida";
        } else {
            $this->categoria = $datos['categoria'];
        }
    }

    private function validarSexo($datos)
    {
        $sexos = ["hombre", "mujer"];

        if (empty($datos['sexo'])) {
            $this->errores['sexo'] = "Sexo está vacío";
        } elseif (!in_array($datos['sexo'], $sexos)) {
            $this->errores['sexo'] = "El sexo no es válido";
        } else {
            $this->sexo = $datos['sexo'];
        }
    }

    private function validarAficiones($datos)
    {
        if (empty($datos['aficiones'])) {
            $this->errores['aficiones'] = "Aficiones están vacías";
        } else {
            $this->aficiones = $datos['aficiones'];
        }
    }

    private function validarFoto()
    {
        if (empty($_FILES["foto"]["name"])) {
            if ($this->sexo === "hombre") {
                $this->foto = "../img/hombre.png";
            } else {
                $this->foto = "../img/mujer.png";
            }

            return;
        }

        if ($_FILES["foto"]["error"] !== UPLOAD_ERR_OK) {
            $this->errores["foto"] = "Error al subir la foto";
            return;
        }

        if ($_FILES["foto"]["size"] > 4 * 1024 * 1024) {
            $this->errores["foto"] = "La foto no puede superar los 4 MB";
            return;
        }

        $tipo = mime_content_type($_FILES["foto"]["tmp_name"]);

        if (strpos($tipo, "image/") !== 0) {
            $this->errores["foto"] = "El archivo debe ser una imagen";
            return;
        }

        $nombre = basename($_FILES["foto"]["name"]);
        $ruta = "uploads/" . $nombre;

        move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta);

        $this->foto = $ruta;
    }

    private function comprobarSueldoCategoria()
    {
        if (!$this->categoria || !$this->sueldo) {
            return;
        }

        switch ($this->categoria) {
            case "peon":
                if ($this->sueldo < 600 || $this->sueldo > 1200) {
                    $this->errores['sueldo'] =
                        "El sueldo no cumple con los requisitos de la categoría seleccionada";
                }
                break;

            case "oficial":
                if ($this->sueldo < 900 || $this->sueldo > 1500) {
                    $this->errores['sueldo'] =
                        "El sueldo no cumple con los requisitos de la categoría seleccionada";
                }
                break;

            case "jefeDepto":
                if ($this->sueldo < 1400 || $this->sueldo > 2500) {
                    $this->errores['sueldo'] =
                        "El sueldo no cumple con los requisitos de la categoría seleccionada";
                }
                break;

            case "director":
                if ($this->sueldo < 2000 || $this->sueldo > 3000) {
                    $this->errores['sueldo'] =
                        "El sueldo no cumple con los requisitos de la categoría seleccionada";
                }
                break;
            default:
            break;
        }
    }

    private function comprobarEdad()
    {
        if (!$this->fechaNac) {
            return;
        }

        if ($this->fechaNac <= "1950-01-01" || $this->fechaNac >= date("Y-m-d")) {
            $this->errores['fechaNac'] = "La fecha no es válida";
            return;
        }

        $fecha18 = date("Y-m-d", strtotime("-18 years"));

        if ($this->fechaNac > $fecha18) {
            $this->errores['fechaNac'] = "El empleado debe tener al menos 18 años";
        }
    }

    private function comprobarAficiones()
    {
        if (!$this->sexo || !$this->aficiones) {
            return;
        }

        if (
            $this->sexo === "hombre" &&
            count($this->aficiones) <= 1 &&
            in_array("deportes", $this->aficiones)
        ) {
            $this->errores['aficiones'] =
                "Los hombres deben seleccionar más de una afición";
        }
    }

    public function getError($campo)
    {
        if (isset($this->errores[$campo])) {
            return $this->errores[$campo];
        }

        return "";
    }

    public function tieneErrores()
    {
        return !empty($this->errores);
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function getFechaNac()
    {
        return $this->fechaNac;
    }

    public function getSueldo()
    {
        return $this->sueldo;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function getSexo()
    {
        return $this->sexo;
    }

    public function getAficiones()
    {
        return $this->aficiones;
    }

    public function getFoto()
    {
        return $this->foto;
    }
}
?>