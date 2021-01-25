<?php function addUser($conn, $username, $email, $encryptedPassword, $gender, $adress, $city, $cp){
    $result = $conn->prepare("INSERT INTO users(username, email, password, gender, adress, city, cp) VALUES (?,?,?,?,?,?,?)");
    $result->bindValue(1, $username);
    $result->bindValue(2, $email);
    $result->bindValue(3, $encryptedPassword);
    $result->bindValue(4, $gender);
    $result->bindValue(5, $adress);
    $result->bindValue(6, $city);
    $result->bindValue(7, $cp);
    $result->execute();
}

function loginUser($conn, $email, $password){
    $sql = "SELECT * from users where email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'email' => $email,
    ]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($stmt == null) return null;
    else return password_verify($password, $user['password']);
}

function getUser($conn, $email){
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'email' => $email,
    ]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getUserbyId($conn, $id_user){
    $sql = "SELECT * FROM users WHERE id_user = :id_user";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'id_user' => $id_user,
    ]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function modifyUser($conn, $username, $email, $encryptedPassword, $gender, $adress, $city, $cp, $id){
    $sql = "UPDATE users SET username = :username, email = :email, password = :password, gender = :gender, adress = :adress, city = :city, cp = :cp WHERE id_user = :id";
    $result = $conn->prepare($sql);
    $result->execute([
        'username' => $username,
        'email' => $email,
        'password' => $encryptedPassword,
        'gender' => $gender,
        'adress' => $adress,
        'city' => $city,
        'cp' => $cp,
        'id' => $id,
    ]);
    return $result->fetch(PDO::FETCH_ASSOC);
}

function uploadImageinDB($conn, $newImageName, $id_user){
    $sql = "UPDATE users SET profile_image = :newImageName WHERE id_user = :id_user";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'newImageName' => $newImageName,
        'id_user' => $id_user,
    ]);
}