<?php
require_once 'models/UserRelation.php';

class UserRelationDaoMysql implements UserRelationDAO {
    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    public function insert(UserRelation $u)
    {
        $sql = $this->pdo->prepare('INSERT INTO posts (id_user, type, created_at, body) VALUES (:id_user, :type, :created_at, :body)');
        $sql->bindValue(':id_user', $u->id_user);
        $sql->bindValue(':type', $u->type);
        $sql->bindValue(':created_at', $u->created_at);
        $sql->bindValue(':body', $u->body);
        $sql->execute();
    }

    public function getFollowing($id)
    {
        $users = [];

        $sql = $this->pdo->prepare("SELECT user_to FROM userrelations WHERE user_from = :user_from");
        $sql->bindValue(':user_from', $id);
        $sql->execute();

        if ($sql->rowCount() > 0 ) {
            $data = $sql->fetchAll();
            foreach($data as $item){
                $users[] = $item["user_to"];
            }
        }

        return $users;
    }

    public function getFollowers($id)
    {
        $users = [];
        $sql = $this->pdo->prepare("SELECT user_from FROM userrelations WHERE user_to = :user_to");
        $sql->bindValue(':user_to', $id);
        $sql->execute();

        if ($sql->rowCount() > 0 ) {
            $data = $sql->fetchAll();
            foreach($data as $item){
                $users[] = $item["user_from"];
            }
        }

        return $users;
    }
}