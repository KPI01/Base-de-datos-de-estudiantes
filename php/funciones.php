<?php
function check_datos($ci, $nombre, $apellido, $ciudad, $correo, $carrera)
{

    //Comprobacion cedula
    if (empty($ci)) {
        echo '<div class="msg-error">Error: La cédula no puede estar vacía.</div>';
        $ci_valid = false;
    } elseif (!is_numeric($ci)) {
        echo '<div class="msg-error">Error: La cédula deben ser sólo números.</div>';
        $ci_valid = false;
    } else {
        $ci_valid = true;
    }

    //Comprobacion nombre
    if (empty($nombre)) {
        echo '<div class="msg-error">Error: El nombre no puede estar vacío.</div>';
        $nombre_valid = false;
    } elseif (preg_match('~[0-9]+~', $nombre)) {
        echo '<div class="msg-error">Error: El nombre debe ser sólo caracteres.</div>';
        $nombre_valid = false;
    } elseif (strlen($nombre) > 25 && strlen($nombre) < 4) {
        echo '<div class="msg-error">Error: El nombre debe tener entre 4 y 25 caracteres.</div>';
        $nombre_valid = false;
    } else {
        $nombre_valid = true;
    }

    //Comprobacion apellido
    if (empty($apellido)) {
        echo '<div class="msg-error">Error: El apellido no puede estar vacío.</div>';
        $apellido_valid = false;
    } elseif (preg_match('~[0-9]+~', $apellido)) {
        echo '<div class="msg-error">Error: El apellido debe ser sólo caracteres.</div>';
        $apellido_valid = false;
    } elseif (strlen($apellido) > 35 && strlen($apellido) < 5) {
        echo '<div class="msg-error">Error: El apellido debe tener de 5 a 35 caracteres.</div>';
        $apellido_valid = false;
    } else {
        $apellido_valid = true;
    }

    //Comprobacion ciudad
    if (empty($ciudad)) {
        echo '<div class="msg-error">Error: La ciudad no puede estar vacía.</div>';
        $ciudad_valid = false;
    } elseif (preg_match('~[0-9]+~', $ciudad)) {
        echo '<div class="msg-error">Error: La ciudad de la ciudad solo puede tener caracteres.</div>';
        $ciudad_valid = false;
    } elseif (strlen($ciudad) > 50) {
        echo '<div class="msg-error">Error: La ciudad no puede superar los 50 caracteres.</div>';
        $ciudad_valid = false;
    } else {
        $ciudad_valid = true;
    }

    //Comprobacion correo
    if (empty($correo)) {
        echo '<div class="msg-error">Error: El correo no puede estar vacío.</div>';
        $correo_valid = false;
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo '<div class="msg-error">Error: El correo debe colocarse en el formato adecuado.</div>';
        $correo_valid = false;
    } else {
        $correo_valid = true;
    }

    //Comprobacion carrera
    if (empty($carrera)) {
        echo '<div class="msg-error">Error: La carrera no puede estar vacía.</div>';
        $carrera_valid = false;
    } elseif (preg_match('~[0-9]+~', $carrera)) {
        echo '<div class="msg-error">Error: El nombre de la carrera solo puede tener caracteres.</div>';
        $carrera_valid = false;
    } elseif (strlen($carrera) > 75) {
        echo '<div class="msg-error">Error: El nombre de la carrera no puede superar los 75 caracteres.</div>';
        $carrera_valid = false;
    } else {
        $carrera_valid = true;
    }

     //Comprobar si los datos estan correctos para insertar en la base de datos
     if ($ci_valid && $nombre_valid && $apellido_valid && $ciudad_valid && $correo_valid && $carrera_valid) {
        return true;
     } else {
        return false;
     }
}

function check_dato($tipo, $valor){

    switch($tipo) {
        case 'cedula':
            if (empty($valor)) {
                echo '<div class="msg-error">Error: La cédula no puede estar vacía.</div>';
                return false;
            } elseif (!is_numeric($valor)) {
                echo '<div class="msg-error">Error: La cédula deben ser sólo números.</div>';
                return false;
            } else {
                return true;
                
            }
            break;
        
        case 'nombre':
            if (empty($valor)) {
                echo '<div class="msg-error">Error: El nombre no puede estar vacío.</div>';
                return false;
            } elseif (preg_match('~[0-9]+~', $valor)) {
                echo '<div class="msg-error">Error: El nombre debe ser sólo caracteres.</div>';
                return false;
            } elseif (strlen($valor) > 25 && strlen($valor) < 4) {
                echo '<div class="msg-error">Error: El nombre debe tener entre 4 y 25 caracteres.</div>';
                return false;
            } else {
                return true;
            }
            break;
        
            case 'apellido':
                if (empty($valor)) {
                    echo '<div class="msg-error">Error: El apellido no puede estar vacío.</div>';
                    return false;
                } elseif (preg_match('~[0-9]+~', $valor)) {
                    echo '<div class="msg-error">Error: El apellido debe ser sólo caracteres.</div>';
                    return false;
                } elseif (strlen($valor) > 35 && strlen($valor) < 5) {
                    echo '<div class="msg-error">Error: El apellido debe tener de 5 a 35 caracteres.</div>';
                    return false;
                } else {
                    return true;
                }
                break;

            case 'ciudad':
                if (empty($valor)) {
                    echo '<div class="msg-error">Error: La ciudad no puede estar vacía.</div>';
                    return false;
                } elseif (preg_match('~[0-9]+~', $valor)) {
                    echo '<div class="msg-error">Error: La ciudad de la ciudad solo puede tener caracteres.</div>';
                    return false;
                } elseif (strlen($valor) > 50) {
                    echo '<div class="msg-error">Error: La ciudad no puede superar los 50 caracteres.</div>';
                    return false;
                } else {
                    return true;
                }
                break;

            case 'correo':
                if (empty($valor)) {
                    echo '<div class="msg-error">Error: El correo no puede estar vacío.</div>';
                    return false;
                } elseif (!filter_var($valor, FILTER_VALIDATE_EMAIL)) {
                    echo '<div class="msg-error">Error: El correo debe colocarse en el formato adecuado.</div>';
                    return false;
                } else {
                    return true;
                }
                break;

            case 'carrera':
                if (empty($valor)) {
                    echo '<div class="msg-error">Error: La carrera no puede estar vacía.</div>';
                    return false;
                } elseif (preg_match('~[0-9]+~', $valor)) {
                    echo '<div class="msg-error">Error: El nombre de la carrera solo puede tener caracteres.</div>';
                    return false;
                } elseif (strlen($valor) > 75) {
                    echo '<div class="msg-error">Error: El nombre de la carrera no puede superar los 75 caracteres.</div>';
                    return false;
                } else {
                    return true;
                }
                break;
    }
};

?>