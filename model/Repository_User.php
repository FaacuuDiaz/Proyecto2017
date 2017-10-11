<?php
  require_once('config.php');
  class Repository_User{

    public static function check_user($user,$pass){
        $con=Connection::open_connection();
        $consult="SELECT id FROM usuario WHERE username=:user and password=:pass";
        $sen= $con->prepare($consult);
        $sen->bindParam(':user',$user);
        $sen->bindParam(':pass',$pass);
        $sen->execute();
        $result=$sen->fetchAll();
        Connection::close_connection();
        return sizeof($result)> 0;
    }

    public static function check_admin($user){
        $con=Connection::open_connection();
        $consult="SELECT rol.id FROM usuario as u INNER JOIN usuario_tiene_rol as urol ON(u.id=urol.usuario_id) INNER JOIN rol ON(urol.rol_id=rol.id) WHERE u.username=:user";
        $sen= $con->prepare($consult);
        $sen->bindParam(':user',$user);
        $sen->execute();
        $result=$sen->fetchAll();
        Connection::close_connection();
        return $result[0][0]== 1;
    }    

    public static function register_user($name,$lastname,$user,$pass,$email){
        $con=Connection::open_connection();
        $date=date('Y-m-d');
        $consult="INSERT INTO usuario(email,username,password,activo,update_at,created_at,nombre,apellido) VALUES (:email,:user,:pass,0,:updat,:create,:name,:lastname)";
        $sen=$con->prepare($consult);
        $sen->bindParam(':email',$email);
        $sen->bindParam(':user',$user);
        $sen->bindParam(':pass',$pass);
        $sen->bindParam(':updat',$date);
        $sen->bindParam(':create',$date);
        $sen->bindParam(':name',$name);
        $sen->bindParam(':lastname',$lastname);
        $sen->execute();
        Connection::close_connection();
    }

    public static function get_user($user){
        $con=Connection::open_connection();
        $consult="SELECT * FROM usuario WHERE username=:user";
        $sen= $con->prepare($consult);
        $sen->bindParam(':user',$user);
        $sen->execute();
        $result=$sen->fetchAll();
        Connection::close_connection();
        return $result;
    }

    public static function get_role($id){
        $con=Connection::open_connection();
        $consult="SELECT rol.nombre FROM usuario as u INNER JOIN usuario_tiene_rol as urol ON(u.id=urol.usuario_id) INNER JOIN rol ON(urol.rol_id=rol.id) WHERE u.id=:id";
        $sen= $con->prepare($consult);
        $sen->bindParam(':id',$id);
        $sen->execute();
        $result=$sen->fetchAll();
        Connection::close_connection();
        return $result[0][0];
    }

    public static function get_id_role($id){
        $con=Connection::open_connection();
        $consult="SELECT rol.id FROM usuario as u INNER JOIN usuario_tiene_rol as urol ON(u.id=urol.usuario_id) INNER JOIN rol ON(urol.rol_id=rol.id) WHERE u.id=:id";
        $sen= $con->prepare($consult);
        $sen->bindParam(':id',$id);
        $sen->execute();
        $result=$sen->fetchAll();
        Connection::close_connection();
        return $result[0][0];
    }

    public static function insert_role($id_role,$id_user){
        $con=Connection::open_connection();
        $consult="INSERT INTO usuario_tiene_rol (usuario_id,rol_id) VALUES (:user,:role)";
        $sen= $con->prepare($consult);
        $sen->bindParam(':user',$id_user);
        $sen->bindParam(':role',$id_role);
        $sen->execute();
        Connection::close_connection();
    }

    public static function update_role($id_role,$id_user){
        $con=Connection::open_connection();
        $consult="UPDATE usuario_tiene_rol SET rol_id=:role WHERE usuario_id=:user";
        $sen= $con->prepare($consult);
        $sen->bindParam(':user',$id_user);
        $sen->bindParam(':role',$id_role);
        $sen->execute();
        Connection::close_connection();
    }

    public static function get_allUsers($id){
        $con=Connection::open_connection();
        $consult="SELECT * FROM usuario WHERE id<>:id";
        $sen= $con->prepare($consult);
        $sen->bindParam(':id',$id);
        $sen->execute();
        $result=$sen->fetchAll();
        Connection::close_connection();
        return $result;
    }

    public static function changeState_user($id,$state){
        $con=Connection::open_connection();
        $consult="UPDATE usuario SET activo=:state WHERE id=:id";
        $sen= $con->prepare($consult);
        $sen->bindParam(':id',$id);
        $sen->bindParam(':state',$state);
        $sen->execute();
        Connection::close_connection();
    }

    public static function remove_user($id){
        $con=Connection::open_connection();
        $consult="DELETE FROM usuario WHERE id=:id";
        $sen= $con->prepare($consult);
        $sen->bindParam(':id',$id);
        $sen->execute();
        Connection::close_connection();
    }

    public static function update_user($id,$name,$lastname,$user,$pass,$email){
        $con=Connection::open_connection();
        $consult="UPDATE usuario SET email=:email,username=:user,password=:pass,nombre=:name,apellido=:lastname WHERE id=:id";
        $sen= $con->prepare($consult);
        $sen->bindParam(':id',$id);
        $sen->bindParam(':email',$email);
        $sen->bindParam(':user',$user);
        $sen->bindParam(':pass',$pass);
        $sen->bindParam(':name',$name);
        $sen->bindParam(':lastname',$lastname);
        $sen->execute();
        Connection::close_connection();
    }

    public static function get_usersAndRoles($id){
        $con=Connection::open_connection();
        $consult="SELECT u.id,u.nombre,u.apellido,rol.id AS id_rol,rol.nombre AS nombre_rol FROM usuario as u INNER JOIN usuario_tiene_rol as urol ON(u.id=urol.usuario_id) INNER JOIN rol ON(urol.rol_id=rol.id) WHERE u.id<>:id";
        $sen= $con->prepare($consult);
        $sen->bindParam(':id',$id);
        $sen->execute();
        $result=$sen->fetchAll();
        Connection::close_connection();
        return $result;
    }

    public static function all_roles(){
        $con=Connection::open_connection();
        $consult="SELECT * FROM rol";
        $sen= $con->prepare($consult);
        $sen->execute();
        $result=$sen->fetchAll();
        Connection::close_connection();
        return $result;
    }


    public static function can_user($rol_id, $permiso_id){
        $con=Connection::open_connection();
        $consult="SELECT rol_id FROM rol_tiene_permiso rper WHERE rol_id=:rol_id and permiso_id=:permiso_id";
        $sen= $con->prepare($consult);
        $sen->bindParam(':rol_id',$rol_id);
        $sen->bindParam(':permiso_id',$permiso_id);
        $sen->execute();
        $result=$sen->fetchAll();
        Connection::close_connection();
        return sizeof($result)>0;
    }


    public static function find_user($name){
        $con=Connection::open_connection();
        $consult="SELECT * FROM usuario WHERE nombre=:name";
        $sen= $con->prepare($consult);
        $sen->bindParam(':name',$name);
        $sen->execute();
        $result=$sen->fetchAll();
        Connection::close_connection();
        return sizeof($result)>0;
    }




  }

?>
