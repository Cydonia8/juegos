<?php
    class comentario{
        private $usuario;
        private $juego;
        private $fecha;
        private $texto;
        private $bd;

        public function __construct(){
            $this->usuario="";
            $this->juego=0;
            $this->fecha="";
            $this->texto="";
            $this->bd=conectar::conectarBD();
        }

        public function __get($atr){
            return $this->$atr;
        }

        public function __set($atr, $valor){
            $this->$atr=$valor;
        }

        public function ultimosComentarios(){
            $ultimos = $this->bd->query("select caratula, u.nombre user, texto, fecha from comentario c, juegos j, usuarios u where c.usuario = u.id and j.id = c.juego order by fecha desc limit 5");
            $i = 0;
            while($fila=$ultimos->fetch_array(MYSQLI_ASSOC)){
                $comentarios[$i]['foto'] = $fila['caratula'];
                $comentarios[$i]['usuario'] = $fila['user'];
                $comentarios[$i]['comentario'] = $fila['texto'];
                $comentarios[$i]['fecha'] = $fila['fecha'];
                $i++;
            }
            return $comentarios;
        }

        public function comentariosJuego($id, $plat){
            $comentarios = $this->bd->prepare("select texto, fecha, u.nombre usuario, j.nombre juego from comentario c, juegos j, usuarios u where c.juego = j.id and c.usuario = u.id and c.juego = ? and j.plataforma = ?");
            $comentarios->bind_param('ii', $id, $plat);
            $comentarios->bind_result($texto, $fecha, $usuario, $juego);
            $comentarios->execute();
            $i=0;
            $coments = array();
            while($comentarios->fetch()){
                $coments[$i]["texto"] = $texto;
                $coments[$i]["fecha"] = $fecha;
                $coments[$i]["usuario"] = $usuario;
                $coments[$i]["juego"] = $juego;
                $i++;
            }
            $comentarios->close();
            return $coments;
        }

        public function insertarComentario($usuario, $juego, $texto, $fecha){
            $insertar = $this->bd->prepare("insert into comentario values (?, ?, ?, ?)");
            $insertar->bind_param('iiss', $usuario, $juego, $texto, $fecha);
            $insertar->execute();
            $insertar->close();
        }
    }
?>