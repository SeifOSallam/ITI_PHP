<?php 
    require_once './db_connection_pdo.php';
    function add_user($data) {
        $pdo = connect_to_db_pdo();
        $name = $data['name'];
        $password = $data['password'];
        $email = $data['email'];
        $roomNo = $data['app'];
        $ext = $data['ext'];
        $image = $data['image'];
        $sql = "INSERT INTO users (name, email, password, room_num, ext, profile_pic) 
        VALUES (?,?,?,?,?,?)";
        $pdo->prepare($sql)->execute([$name, $email, $password, $roomNo, $ext, $image]);
    }
    function select_users() {
        try{
            $pdo = connect_to_db_pdo();
            if ($pdo){
                $select_query = 'select * from users;';
                $stmt= $pdo->prepare($select_query); # PDOStatement
                $res= $stmt->execute();
                if($res){
                    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    return $rows;
                }
            }
        }catch(Exception $e){
            echo "<h3 style='color:red'>{$e->getMessage()}</h3>";
        }
    }
    function select_single_user($id) {
        try{
            $pdo = connect_to_db_pdo();
            if ($pdo){
                $select_query = "select * from users WHERE id={$id};";
                $stmt= $pdo->prepare($select_query); # PDOStatement
                $res= $stmt->execute();
                if($res){
                    $rows = $stmt->fetch();
                    return $rows;
                }
            }
        }catch(Exception $e){
            echo "<h3 style='color:red'>{$e->getMessage()}</h3>";
        }
    }
    function update_user($id, $data) {
        
        $pdo = connect_to_db_pdo();
        $sql = "UPDATE users SET";

        $params = array();
        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];
        $ext = $data['ext'];
        $room_num = $data['room_num'];
        if (!empty($name)) {
            $sql .= " name = :name,";
            $params[':name'] = $name;
        }
        if (!empty($email)) {
            $sql .= " email = :email,";
            $params[':email'] = $email;
        }
        if (!empty($password)) {
            $sql .= " password = :password,";
            $params[':password'] = $password;
        }
        if (!empty($room_num)) {
            $sql .= " room_num = :room_num,";
            $params[':room_num'] = $room_num;
        }
        if (!empty($ext)) {
            $sql .= " ext = :ext,";
            $params[':ext'] = $ext;
        }
        if (!empty($profile_pic)) {
            $sql .= " profile_pic = :profile_pic,";
            $params[':profile_pic'] = $profile_pic;
        }
        if (empty($params)) {
            return;
        }
        $sql = rtrim($sql, ',');

        $sql .= " WHERE id = :id";
        try {
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            
            foreach ($params as $param => &$value) {
                $stmt->bindParam($param, $value);
            }
            
            $stmt->execute();
        }
        catch (PDOException $e) {
            echo "Update failed: " . $e->getMessage();
        }
    }
    function delete_user($id) {
        $pdo = connect_to_db_pdo();
        $sql = "DELETE FROM users WHERE id=?";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$id]);
    }
?>