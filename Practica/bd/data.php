<?php
require_once 'conexion.php';

class Data
{
    public $con;

    public function __construct()
    {
        $st = new Conexion();
        $this->con = $st->getConexion();
    }
    public function isUsuarioAdmin($rut)
    {
        $sql = "SELECT COUNT(*) as 'isAdmin' FROM usuario WHERE rut = '" . $rut . "' AND tipo_id_fk = 1";
        $rs = $this->con->query($sql);

        if ($fila = $rs->fetch_assoc()) {
            $admin = $fila["isAdmin"];
            if ($admin == "1") {
                return true;
            }
        }
        return false;
    }
    public function crearMarcaPC($marca)
    {
        $sql = "INSERT INTO marca VALUES(NULL,'" . $marca . "')";
        $this->con->query($sql);
    }
    public function crearBox($b)
    {
        $sql = "INSERT INTO boxx(nombre) VALUE('" . $b . "')";
        $this->con->query($sql);
    }
    public function crearCesfam($c)
    {
        $sql = "INSERT INTO cesfam(nombre) VALUE('" . $c . "')";
        $this->con->query($sql);
    }
    public function crearSector($s)
    {
        $sql = "INSERT INTO sector(nombre) VALUE('" . $s . "')";
        $this->con->query($sql);
    }
    public function crearMarcaTel($m)
    {
        $sql = "INSERT INTO marca_telefono VALUES(NULL,'" . $m . "')";
        $this->con->query($sql);
    }

    public function crearModeloPC($modelo)
    {
        $sql = "INSERT INTO modelo VALUES(NULL,'" . $modelo['modelo'] . "','" . $modelo['marca'] . "')";
        $this->con->query($sql);
    }

    public function isUsuarioValido($nickname, $passwd)
    {
        $sql = "SELECT COUNT(*) AS 'existe' 
                    FROM usuario 
                    WHERE rut = '$nickname' AND pass = '$passwd'";
        $rs = $this->con->query($sql);

        if ($fila = $rs->fetch_assoc()) {
            $existe = $fila["existe"];
            if ($existe == "1") {
                return true;
            }
        }
        return false;
    }
    public function isUsuarioDesHabilitado($rut)
    {
        $sql = "SELECT COUNT(rut) as 'existe' FROM usuario WHERE rut = '" . $rut . "' AND estado = 1";

        $rs = $this->con->query($sql);
        if ($fila = $rs->fetch_assoc()) {
            $existe = $fila['existe'];
            if ($existe == "1") {
                return true;
            } else {

                return false;
            }
        }
    }
    public function cambiarPass($rut, $pass)
    {
        $sql = "UPDATE usuario SET pass = '" . $pass . "' WHERE rut = '" . $rut . "'";
        $this->con->query($sql);
    }
    public function isRutExiste($rut)
    {
        $sql = "SELECT COUNT(rut) as 'existe' FROM usuario WHERE rut = '" . $rut . "'";

        $rs = $this->con->query($sql);
        if ($fila = $rs->fetch_assoc()) {
            $existe = $fila['existe'];
            if ($existe == "1") {
                return true;
            } else {
                return false;
            }
        }
    }


    public function getListaUsuario()
    {
        $sql = "SELECT * FROM usuario";

        $rs = $this->con->query($sql);
        $arr = [];
        while ($fila = $rs->fetch_assoc()) {
            $arr[] = $fila;
        }
        return $arr;
    }
    public function getModelosByMarca($id)
    {
        $sql = "SELECT 
        modelo.id,
        modelo.nombre,
        modelo.marca_id_fk
    FROM modelo
    INNER JOIN marca
    ON modelo.marca_id_fk = marca.id
    WHERE modelo.marca_id_fk = $id";
        $rs = $this->con->query($sql);
        $arr = [];
        while ($fila = $rs->fetch_assoc()) {
            $arr[] = $fila;
        }
        return $arr;
    }
    public function getModelosByMarcaUPS($id)
    {
        $sql = "SELECT 
        modelo_ups.id,
        modelo_ups.modeloUPS,
        modelo_ups.marcaU_id_fk
        FROM modelo_ups
        INNER JOIN marca_ups
        ON modelo_ups.marcaU_id_fk = marca_ups.id
        WHERE modelo_ups.marcaU_id_fk =  $id";
        $rs = $this->con->query($sql);
        $arr = [];
        while ($fila = $rs->fetch_assoc()) {
            $arr[] = $fila;
        }
        return $arr;
    }

    public function getModelosByMarcaTel($id)
    {
        $sql = "SELECT 
        modelo_telefono.id,
        modelo_telefono.modeloTel,
        modelo_telefono.marcaT_id_fk
        FROM modelo_telefono
        INNER JOIN marca_telefono
        ON modelo_telefono.marcaT_id_fk = marca_telefono.id
        WHERE modelo_telefono.marcaT_id_fk = $id";
        $rs = $this->con->query($sql);
        $arr = [];
        while ($fila = $rs->fetch_assoc()) {
            $arr[] = $fila;
        }
        return $arr;
    }
    public function getNombreUsu()
    {
        $sql = "SELECT nombre FROM usuario";
        $rs = $this->con->query($sql);
        $arr = [];
        while ($fila = $rs->fetch_assoc()) {
            $arr[] = $fila;
        }
        return $arr;
    }


    public function getEstadobyId()
    {
        $sql = "SELECT * FROM usuario WHERE estado = '0'";
        $rs = $this->con->query($sql);
        $arr = [];
        while ($fila = $rs->fetch_assoc()) {
            $arr[] = $fila;
        }
        return $arr;
    }
    public function getEstadobyIdPC()
    {
        $sql = "SELECT equipo.id, equipo.tipo_pc , equipo.centro_de_costo , equipo.n_serie, equipo.licencia, equipo.estado,
        equipo.responsable , equipo.fecha_de_ingreso, equipo.estadoActual , marca.nombre_marca , modelo.nombre ,
		  cesfam.nombre AS 'Cesfam', 
        boxx.nombre AS 'Box', 
        sector.nombre AS 'Sector'
        FROM equipo 
        INNER JOIN modelo 
        ON modelo.id = equipo.modelo_id_fk
        INNER JOIN marca
        ON marca.id = equipo.marca_id_fk
        INNER JOIN cesfam
        ON cesfam.id = equipo.cesfam_id_fk
        INNER JOIN boxx
        ON boxx.id = equipo.boxx_id_fk
        INNER JOIN sector
        ON sector.id = equipo.boxx_id_fk
        WHERE equipo.estadoActual = 0
        ORDER BY equipo.id";
        $rs = $this->con->query($sql);
        $arr = [];
        while ($fila = $rs->fetch_assoc()) {
            $arr[] = $fila;
        }
        return $arr;
    }
    public function getEstadobyIdUPS()
    {
        $sql = "SELECT ups.id, ups.n_de_serie, marca_ups.marcaUPS, modelo_ups.modeloUPS,
        cesfam.nombre AS 'Cesfam', 
        boxx.nombre AS 'Box', 
        sector.nombre AS 'Sector'
        FROM ups
        INNER JOIN marca_ups
        ON marca_ups.id = ups.marca_id_fk
        INNER JOIN modelo_ups
        ON modelo_ups.id = ups.modelo_id_fk
        INNER JOIN cesfam
        ON cesfam.id = ups.cesfam_id_fk
        INNER JOIN boxx
        ON boxx.id = ups.boxx_id_fk
        INNER JOIN sector
        ON sector.id = ups.sector_id_fk
        WHERE ups.estado = '0'
        ORDER BY ups.id";
        $rs = $this->con->query($sql);
        $arr = [];
        while ($fila = $rs->fetch_assoc()) {
            $arr[] = $fila;
        }
        return $arr;
    }
    public function getEstadobyIdTelefono()
    {
        $sql = "SELECT telefono.id, telefono.n_serie, marca_telefono.marcaTel, modelo_telefono.modeloTel, telefono.tipo_tecno,
        cesfam.nombre AS 'Cesfam', 
        boxx.nombre AS 'Box', 
        sector.nombre AS 'Sector'
        FROM telefono
        INNER JOIN marca_telefono
        ON marca_telefono.id = telefono.marca_id_fk
        INNER JOIN modelo_telefono
        ON modelo_telefono.id = telefono.modelo_id_fk
        INNER JOIN cesfam
        ON cesfam.id = telefono.cesfam_id_fk
        INNER JOIN boxx
        ON boxx.id = telefono.boxx_id_fk
        INNER JOIN sector
        ON sector.id = telefono.sector_id_fk
        WHERE telefono.estado = '0'
        ORDER BY telefono.id";
        $rs = $this->con->query($sql);
        $arr = [];
        while ($fila = $rs->fetch_assoc()) {
            $arr[] = $fila;
        }
        return $arr;
    }

    public function deshabilitarById($id)
    {
        $sql = "UPDATE usuario SET estado = '0' WHERE id = $id";
        $this->con->query($sql);
    }

    public function habilitarById($id)
    {
        $sql = "UPDATE usuario SET estado = '1' WHERE id = $id";
        $this->con->query($sql);
    }
    public function habilitarByIdPC($id)
    {
        $sql = "UPDATE equipo SET estadoActual = 1 WHERE id = $id";
        $this->con->query($sql);
    }
    public function habilitarByIdUPS($id)
    {
        $sql = "UPDATE ups SET estado = '1' WHERE id = $id";
        $this->con->query($sql);
    }
    public function habilitarByIdTelefono($id)
    {
        $sql = "UPDATE telefono SET estado = '1' WHERE id = $id";
        $this->con->query($sql);
    }

    public function getMarca()
    {
        $sql = "SELECT * FROM marca";
        $rs = $this->con->query($sql);
        $arr = [];
        while ($fila = $rs->fetch_assoc()) {
            $arr[] = $fila;
        }
        return $arr;
    }
    public function actualizarById($usuario)
    {
        $sql = "UPDATE usuario SET nombre = '" . $usuario['nombre'] . "', apellido='" . $usuario['apellido'] . "', rut = '" . $usuario['rut'] . "', cargo = '" . $usuario['cargo'] . "', email = '" . $usuario['email'] . "' WHERE id = '" . $usuario['id'] . "' ";
        $this->con->query($sql);
        #echo "". $sql;
        #$sql = "UPDATE usuario SET nombre = 'holaaaaaa' WHERE id = 1";
    }
    public function actualizarByIdUPS($ups)
    {
        $sql = "UPDATE ups SET n_de_serie = '".$ups['serie']."',
        marca_id_fk = '".$ups['marca']."',
        modelo_id_fk = '".$ups['modelo']."',
        cesfam_id_fk = '".$ups['cesfam']."',
        boxx_id_fk = '".$ups['box']."',
        sector_id_fk = '".$ups['sector']."'
        WHERE id = '".$ups['id']."'";
        $this->con->query($sql);
    }
    public function actualizarByIdPC($pc)
    {
        $sql = "UPDATE equipo SET tipo_pc = '" . $pc['equipo'] . "' , 
        centro_de_costo = '" . $pc['centro'] . "',
        n_serie = '" . $pc['serie'] . "',
        licencia = '" . $pc['licencia'] . "',
        estado = '" . $pc['estado'] . "',
        responsable = '" . $pc['responsable'] . "',
        fecha_de_ingreso = '" . $pc['fecha'] . "',
        marca_id_fk = '" . $pc['marca'] . "',
        modelo_id_fk = '" . $pc['modelo'] . "',
        cesfam_id_fk = '" . $pc['cesfam'] . "',
        boxx_id_fk = '" . $pc['boxx'] . "',
        sector_id_fk = '" . $pc['sector'] . "'
        WHERE id = '" . $pc['id'] . "'";
        $this->con->query($sql);
    }
    public function actualizarByIdTelefono($fono)
    {
        $sql = "UPDATE telefono SET n_serie = '".$fono['serie']."',
        tipo_tecno = '".$fono['tipo']."',
        marca_id_fk = '".$fono['marca']."',
        modelo_id_fk = '".$fono['modelo']."',
        cesfam_id_fk = '".$fono['cesfam']."',
        boxx_id_fk = '".$fono['box']."',
        sector_id_fk = '".$fono['sector']."'
        WHERE id = '".$fono['id']."'";
        $this->con->query($sql);
    }
    public function getPC()
    {
        $sql = "SELECT equipo.id, equipo.tipo_pc,equipo.centro_de_costo,equipo.n_serie,equipo.licencia,equipo.estado,equipo.responsable,equipo.fecha_de_ingreso,equipo.estadoActual,
        marca.nombre_marca, 
        modelo.nombre,
        cesfam.nombre AS 'Cesfam', 
        boxx.nombre AS 'Box', 
        sector.nombre AS 'Sector'
        FROM equipo
        INNER JOIN marca
        ON marca.id = equipo.marca_id_fk
        INNER JOIN modelo
        ON modelo.id = equipo.modelo_id_fk
        INNER JOIN cesfam
        ON cesfam.id = equipo.cesfam_id_fk
        INNER JOIN boxx
        ON boxx.id = equipo.boxx_id_fk
        INNER JOIN sector
        ON sector.id = equipo.sector_id_fk
        ORDER BY equipo.id";
        $rs = $this->con->query($sql);
        $arr = [];
        while ($fila = $rs->fetch_assoc()) {
            $arr[] = $fila;
        }
        return $arr;
    }
    public function getPCAsociado()
    {
        $sql = "SELECT equipo.id, equipo.tipo_pc, equipo.responsable, modelo.nombre,
        cesfam.nombre AS 'Cesfam',
        boxx.nombre AS 'Box',
        sector.nombre AS 'Sector'
        FROM equipo
        INNER JOIN modelo
        ON modelo.id = equipo.modelo_id_fk
        INNER JOIN cesfam
        ON cesfam.id = equipo.cesfam_id_fk
        INNER JOIN boxx
        ON boxx.id = equipo.boxx_id_fk
        INNER JOIN sector
        ON sector.id = equipo.sector_id_fk
        ORDER BY equipo.id";
        $rs = $this->con->query($sql);
        $arr = [];
        while ($fila = $rs->fetch_assoc()) {
            $arr[] = $fila;
        }
        return $arr;
    }
    public function getUPS()
    {
        $sql = "SELECT ups.id, ups.n_de_serie, ups.estado, marca_ups.marcaUPS, modelo_ups.modeloUPS,
        cesfam.nombre AS 'Cesfam',
        boxx.nombre AS 'Box',
        sector.nombre AS 'Sector'
        FROM ups
        INNER JOIN marca_ups
        ON marca_ups.id = ups.marca_id_fk
        INNER JOIN modelo_ups
        ON modelo_ups.id = ups.modelo_id_fk
        INNER JOIN cesfam
        ON cesfam.id = ups.cesfam_id_fk
        INNER JOIN boxx
        ON boxx.id = ups.boxx_id_fk
        INNER JOIN sector
        ON sector.id = ups.sector_id_fk
        ORDER BY ups.id";
        $rs = $this->con->query($sql);
        $arr = [];
        while ($fila = $rs->fetch_assoc()) {
            $arr[] = $fila;
        }
        return $arr;
    }
    public function getUPSAsociado()
    {
        $sql = "SELECT ups.id, modelo_ups.modeloUPS, ups.n_de_serie,
        cesfam.nombre AS 'Cesfam',
        boxx.nombre AS 'Box',
        sector.nombre AS 'Sector'
        FROM ups
        INNER JOIN modelo_ups
        ON modelo_ups.id = ups.modelo_id_fk
        INNER JOIN cesfam
        ON cesfam.id = ups.cesfam_id_fk
        INNER JOIN boxx
        ON boxx.id = ups.boxx_id_fk
        INNER JOIN sector
        ON sector.id = ups.sector_id_fk
        ORDER BY ups.id";

        $rs = $this->con->query($sql);
        $arr = [];
        while ($fila = $rs->fetch_assoc()) {
            $arr[] = $fila;
        }
        return $arr;
    }
    public function getTelefonoAsociado()
    {
        $sql = "SELECT telefono.id, telefono.tipo_tecno, modelo_telefono.modeloTel, telefono.n_serie,
        cesfam.nombre AS 'Cesfam',
        boxx.nombre AS 'Box',
        sector.nombre AS 'Sector'
        FROM telefono
        INNER JOIN modelo_telefono
        ON modelo_telefono.id = telefono.modelo_id_fk
        INNER JOIN cesfam
        ON cesfam.id = telefono.cesfam_id_fk
        INNER JOIN boxx
        ON boxx.id = telefono.boxx_id_fk
        INNER JOIN sector
        ON sector.id = telefono.sector_id_fk
        ORDER BY telefono.id";
        $rs = $this->con->query($sql);
        $arr = [];
        while ($fila = $rs->fetch_assoc()) {
            $arr[] = $fila;
        }
        return $arr;
    }
    public function buscarComputador($pc)
    {
        $sql = "SELECT equipo.id, equipo.tipo_pc,equipo.centro_de_costo,equipo.n_serie,equipo.licencia,equipo.estado,equipo.responsable,equipo.fecha_de_ingreso,equipo.estadoActual,
        marca.nombre_marca, 
        modelo.nombre,
        cesfam.nombre AS 'Cesfam', 
        boxx.nombre AS 'Box', 
        sector.nombre AS 'Sector'
        FROM equipo
        INNER JOIN marca
        ON marca.id = equipo.marca_id_fk
        INNER JOIN modelo
        ON modelo.id = equipo.modelo_id_fk
        INNER JOIN cesfam
        ON cesfam.id = equipo.cesfam_id_fk
        INNER JOIN boxx
        ON boxx.id = equipo.boxx_id_fk
        INNER JOIN sector
        ON sector.id = equipo.sector_id_fk
        WHERE cesfam.nombre LIKE '%" . $pc . "%' 
        OR cesfam.nombre LIKE BINARY '%" . $pc . "%'
        ORDER BY equipo.id";
        $rs = $this->con->query($sql);
        $arr = [];
        while ($fila = $rs->fetch_assoc()) {
            $arr[] = $fila;
        }
        return $arr;
    }
    public function buscarTelefono($fono)
    {
        $sql = "SELECT telefono.id, telefono.n_serie, telefono.tipo_tecno, telefono.estado, marca_telefono.marcaTel, modelo_telefono.modeloTel,
        cesfam.nombre AS 'Cesfam',
        boxx.nombre AS 'Box',
        sector.nombre AS 'Sector'
        FROM telefono
        INNER JOIN marca_telefono
        ON marca_telefono.id = telefono.marca_id_fk
        INNER JOIN modelo_telefono
        ON modelo_telefono.id = telefono.modelo_id_fk
        INNER JOIN cesfam
        ON cesfam.id = telefono.cesfam_id_fk
        INNER JOIN boxx
        ON boxx.id = telefono.boxx_id_fk
        INNER JOIN sector
        ON sector.id = telefono.sector_id_fk
        WHERE cesfam.nombre LIKE '%" . $fono . "%'
        OR cesfam.nombre LIKE BINARY '%" . $fono . "%'
        ORDER BY telefono.id";
        $rs = $this->con->query($sql);
        $arr = [];
        while ($fila = $rs->fetch_assoc()) {
            $arr[] = $fila;
        }
        return $arr;
    }
    public function buscarUPS($ups)
    {
        $sql = "SELECT ups.id, ups.n_de_serie, ups.estado, marca_ups.marcaUPS, modelo_ups.modeloUPS,
        cesfam.nombre AS 'Cesfam',
        boxx.nombre AS 'Box',
        sector.nombre AS 'Sector'
        FROM ups
        INNER JOIN marca_ups
        ON marca_ups.id = ups.marca_id_fk
        INNER JOIN modelo_ups
        ON modelo_ups.id = ups.modelo_id_fk
        INNER JOIN cesfam
        ON cesfam.id = ups.cesfam_id_fk
        INNER JOIN boxx
        ON boxx.id = ups.boxx_id_fk
        INNER JOIN sector
        ON sector.id = ups.sector_id_fk
        WHERE cesfam.nombre LIKE '%" . $ups . "%'
        OR cesfam.nombre LIKE BINARY '%" . $ups . "%'
        ORDER BY ups.id";

        $rs = $this->con->query($sql);
        $arr = [];
        while ($fila = $rs->fetch_assoc()) {
            $arr[] = $fila;
        }
        return $arr;
    }
    public function getUPSById($id)
    {
        $sql = "SELECT ups.id, ups.n_de_serie, ups.estado, marca_ups.marcaUPS, modelo_ups.modeloUPS,
        cesfam.nombre AS 'Cesfam',
        boxx.nombre AS 'Box',
        sector.nombre AS 'Sector'
        FROM ups
        INNER JOIN marca_ups
        ON marca_ups.id = ups.marca_id_fk
        INNER JOIN modelo_ups
        ON modelo_ups.id = ups.modelo_id_fk
        INNER JOIN cesfam
        ON cesfam.id = ups.cesfam_id_fk
        INNER JOIN boxx
        ON boxx.id = ups.boxx_id_fk
        INNER JOIN sector
        ON sector.id = ups.sector_id_fk
        WHERE ups.id = $id
        ORDER BY ups.id";
        $rs = $this->con->query($sql);
        $arr = [];
        while ($fila = $rs->fetch_assoc()) {
            $arr[] = $fila;
        }
        return $arr;
    }
    public function getMarcaUPS()
    {
        $sql = "SELECT * FROM marca_ups";
        $rs = $this->con->query($sql);
        $arr = [];
        while ($fila = $rs->fetch_assoc()) {
            $arr[] = $fila;
        }
        return $arr;
    }
    public function crearMarcaUPS($m)
    {
        $sql = "INSERT INTO marca_ups VALUES(NULL,'" . $m . "')";
        $this->con->query($sql);
    }
    public function getModeloUPS()
    {
        $sql = "SELECT * FROM modelo_ups";
        $rs = $this->con->query($sql);
        $arr = [];
        while ($fila = $rs->fetch_assoc()) {
            $arr[] = $fila;
        }
        return $arr;
    }
    public function crearModeloUPS($m)
    {
        $sql = "INSERT INTO modelo_ups VALUES(NULL,'" . $m['modelo'] . "','" . $m['marca'] . "')";
        $this->con->query($sql);
    }
    public function crearModeloTel($m)
    {
        $sql = "INSERT INTO modelo_telefono VALUES(NULL,'" . $m['modelo'] . "','" . $m['marca'] . "')";
        $this->con->query($sql);
    }
    public function getMarcaTelefono()
    {
        $sql = "SELECT * FROM marca_telefono";
        $rs = $this->con->query($sql);
        $arr = [];
        while ($fila = $rs->fetch_assoc()) {
            $arr[] = $fila;
        }
        return $arr;
    }
    public function getModeloTelefono()
    {
        $sql = "SELECT * FROM modelo_telefono";
        $rs = $this->con->query($sql);
        $arr = [];
        while ($fila = $rs->fetch_assoc()) {
            $arr[] = $fila;
        }
        return $arr;
    }
    public function getTelefono()
    {
        $sql = "SELECT * FROM telefono";
        $rs = $this->con->query($sql);
        $arr = [];
        while ($fila = $rs->fetch_assoc()) {
            $arr[] = $fila;
        }
        return $arr;
    }
    public function getTelefonoConF()
    {
        $sql = "SELECT telefono.id, telefono.n_serie, telefono.tipo_tecno, telefono.estado, marca_telefono.marcaTel, modelo_telefono.modeloTel,
        cesfam.nombre AS 'Cesfam',
        boxx.nombre AS 'Box',
        sector.nombre AS 'Sector'
        FROM telefono
        INNER JOIN marca_telefono
        ON marca_telefono.id = telefono.marca_id_fk
        INNER JOIN modelo_telefono
        ON modelo_telefono.id = telefono.modelo_id_fk
        INNER JOIN cesfam
        ON cesfam.id = telefono.cesfam_id_fk
        INNER JOIN boxx
        ON boxx.id = telefono.boxx_id_fk
        INNER JOIN sector
        ON sector.id = telefono.sector_id_fk
        ORDER BY telefono.id";
        $rs = $this->con->query($sql);
        $arr = [];
        while ($fila = $rs->fetch_assoc()) {
            $arr[] = $fila;
        }
        return $arr;
    }
    public function getTelefonoById($id)
    {
        $sql = "SELECT telefono.id, telefono.n_serie, telefono.tipo_tecno, telefono.estado, marca_telefono.marcaTel, modelo_telefono.modeloTel,
        cesfam.nombre AS 'Cesfam',
        boxx.nombre AS 'Box',
        sector.nombre AS 'Sector'
        FROM telefono
        INNER JOIN marca_telefono
        ON marca_telefono.id = telefono.marca_id_fk
        INNER JOIN modelo_telefono
        ON modelo_telefono.id = telefono.modelo_id_fk
        INNER JOIN cesfam
        ON cesfam.id = telefono.cesfam_id_fk
        INNER JOIN boxx
        ON boxx.id = telefono.boxx_id_fk
        INNER JOIN sector
        ON sector.id = telefono.sector_id_fk
        WHERE telefono.id = $id
        ORDER BY telefono.id";
        $rs = $this->con->query($sql);
        $arr = [];
        while ($fila = $rs->fetch_assoc()) {
            $arr[] = $fila;
        }
        return $arr;
    }
    public function getPCById($id) //ACÁ LO DEJÉ 26/116
    {
        $sql = "SELECT equipo.id, equipo.tipo_pc,equipo.centro_de_costo,equipo.n_serie,equipo.licencia,equipo.estado,equipo.responsable,equipo.fecha_de_ingreso,equipo.estadoActual,
        marca.nombre_marca, modelo.nombre as 'nombre_modelo' FROM modelo 
        INNER JOIN equipo 
        ON equipo.modelo_id_fk = modelo.id
        INNER JOIN marca
        ON marca.id = modelo.marca_id_fk
        WHERE equipo.id = $id
        ORDER BY equipo.id";
        $rs = $this->con->query($sql);
        $arr = [];
        while ($fila = $rs->fetch_assoc()) {
            $arr[] = $fila;
        }
        return $arr;
    }
    public function deshabilitarTelefonoById($id)
    {
        $sql = "UPDATE telefono SET estado = '0' WHERE id = $id";
        $this->con->query($sql);
    }
    public function deshabilitarUPSById($id)
    {
        $sql = "UPDATE ups SET estado = '0' WHERE id = $id";
        $this->con->query($sql);
    }
    public function deshabilitarPCById($id)
    {
        $sql = "UPDATE equipo SET estadoActual = 0 WHERE id = $id";
        $this->con->query($sql);
    }
    public function getClienteById($id)
    {
        $sql = "SELECT * from usuario where id = $id;";
        $res = $this->con->query($sql);
        $arr = [];
        while ($usuario = $res->fetch_assoc()) {
            $arr[] = $usuario;
        }
        return $arr;
    }
    public function crearUsuario($u)
    {
        $sql = "INSERT INTO usuario VALUES(NULL,'" . $u['nombre'] . "','" . $u['apellido'] . "','" . $u['rut'] . "','','" . $u['cargo'] . "','" . $u['email'] . "',1)";
        $this->con->query($sql);
    }
    public function crearUsuarioFromLogin($u)
    {
        $sql = "INSERT INTO usuario VALUES(NULL,'" . $u['nombre'] . "','" . $u['apellido'] . "','" . $u['rut'] . "','" . $u['pass'] . "','" . $u['cargo'] . "','" . $u['email'] . "',1,2)";
        $this->con->query($sql);
    }
    public function crearUPS($ups)
    {
        $sql = "INSERT INTO ups VALUES(NULL,'" . $ups['serie'] . "','" . $ups['marca'] . "','" . $ups['modelo'] . "',1,'" . $ups['cesfam'] . "','" . $ups['boxx'] . "','" . $ups['sector'] . "')";
        $this->con->query($sql);
    }
    public function crearTelefono($fono)
    {
        $sql = "INSERT INTO telefono VALUES(NULL,'" . $fono['serie'] . "','" . $fono['tipo_tecno'] . "',1,'" . $fono['marca'] . "','" . $fono['modelo'] . "','" . $fono['cesfam'] . "','" . $fono['boxx'] . "','" . $fono['sector'] . "')";
        $this->con->query($sql);
    }
    public function crearPC($pc)
    {
        $sql = "INSERT INTO equipo VALUES(NULL, '" . $pc['equipo'] . "',
        '" . $pc['centro'] . "',
        '" . $pc['serie'] . "',
        '" . $pc['licencia'] . "',
         '" . $pc['estado'] . "',
         '" . $pc['responsable'] . "',
         '" . $pc['fecha'] . "', 
         1 
         ,'" . $pc['marca'] . "',
         '" . $pc['modelo'] . "',
         '" . $pc['cesfam'] . "',
         '" . $pc['boxx'] . "',
         '" . $pc['sector'] . "')";
        $this->con->query($sql);
    }
    public function getNombreByRUT($rut)
    {
        $sql = "SELECT nombre FROM usuario WHERE rut = '" . $rut . "'";
        $res = $this->con->query($sql);
        $arr = [];
        while ($usuario = $res->fetch_assoc()) {
            $arr[] = $usuario;
        }
        return $arr;
    }
    public function getCesfam()
    {
        $sql = "SELECT * FROM cesfam";
        $rs = $this->con->query($sql);
        $arr = [];
        while ($fila = $rs->fetch_assoc()) {
            $arr[] = $fila;
        }
        return $arr;
    }
    public function getBoxx()
    {
        $sql = "SELECT * FROM boxx";
        $rs = $this->con->query($sql);
        $arr = [];
        while ($fila = $rs->fetch_assoc()) {
            $arr[] = $fila;
        }
        return $arr;
    }
    public function getSector()
    {
        $sql = "SELECT * FROM sector";
        $rs = $this->con->query($sql);
        $arr = [];
        while ($fila = $rs->fetch_assoc()) {
            $arr[] = $fila;
        }
        return $arr;
    }
}
