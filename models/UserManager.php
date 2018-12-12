<?php

class UserManager extends Manager {
    

    public function addUser(User $user){
        $req = $this->getDb()->prepare('INSERT INTO users(pseudo, pass, email, avatar) VALUES (:pseudo, :pass, :email, :avatar)');
        $req->bindValue(':pseudo', $user->getPseudo(), PDO::PARAM_STR);
        $req->bindValue(':pass', $user->getPass(), PDO::PARAM_STR);
        $req->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
        $req->bindValue(':avatar', $user->getAvatar());
        $req->execute();
    }

    public function exist($arg_pseudo)
    {
        $req = $this->getDb()->prepare('SELECT * FROM users WHERE pseudo = :pseudo');
        $req->bindValue(':pseudo', $arg_pseudo, PDO::PARAM_STR);
        $req->execute();
        $rep = $req->fetch();
        return $rep;
    }

    public function getUsers(){
        $req = $this->getDb()->query('SELECT * FROM users');
        $data_users = $req->fetchAll(PDO::FETCH_ASSOC);
        var_dump($data_users);
    }

    public function getUSerbypseudo($email){
        $req = $this->getDb()->prepare('SELECT * FROM users WHERE email = :email');
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->execute();
        $rep = $req->fetch();
        $data_user = new User($rep);
        return $data_user;
    }

    public function emailExist($email)
    {
        $req = $this->db->prepare('SELECT COUNT(id) FROM users WHERE email = :email');
        $req->bindValue('email', $email, PDO::PARAM_STR);
        $req->execute();
        return $req->fetchColumn() > 0;
    }

    public function passwordVerify($email, $pass)
    {
        $req = $this->db->prepare('SELECT pass FROM users WHERE email = :email');
        $req->bindValue('email', $email, PDO::PARAM_STR);
        $req->execute();
        return password_verify($pass, $req->fetch()['pass']);
    }

    public function getUser($id)
    {
        if(ctype_digit($id))
        { 
            $req = $this->db->prepare('SELECT * FROM users WHERE id = :id');
            $req->bindValue('id', $id, PDO::PARAM_INT);
        }
        else 
        {
            $req = $this->db->prepare('SELECT * FROM users WHERE email = :email');
            $req->bindValue('email', $id, PDO::PARAM_STR);
        }
        $req->execute();
        return new User($req->fetch(PDO::FETCH_ASSOC));
    }

    public function setUserToken($user, $token)
    {
        $req = $this->db->prepare('UPDATE users SET token = :token WHERE id = :id');
        $req->bindValue('token', $token, PDO::PARAM_STR);
        $req->bindValue('id', $user->getId(), PDO::PARAM_INT);
        $req->execute();
    }
}
