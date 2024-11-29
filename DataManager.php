<?php declare(strict_types=1);

class DataManager
{
    private PDO $db;

    public function __construct() {
        $this->db = $this->connect();
    }

    private function connect(): PDO
    {
    
        try{
            $db = new PDO('mysql:host=localhost;dbname=op-art0;charset=utf8','root','',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }catch(\Exception $e){
            die('Erreur: '.$e->getMessage());
        }
        return $db;
    }

    public function GetOeuvreById(int $id): array
    {
        $s = $this->db->prepare("SELECT * FROM oeuvre WHERE id = :id");
        $s->bindParam(':id',$id);
        $s->execute();
        return $s->fetch();
    }
    public function GetAllOeuvre(): array
    {
        $r = $this->db->prepare("SELECT * FROM oeuvre");
        $r->execute();
        return $r->fetchAll();
    }
    public function InsertOeuvre(string $artist, string $titre, string $img, string $des)
    {
        $req = $this->db->prepare("INSERT INTO `oeuvre`(`artiste`, `titre`, `img`, `des`) VALUES (:artist, :titre, :img, :des)");
        $req->bindParam(':artist', $artist);
        $req->bindParam(':titre', $titre);
        $req->bindParam(':img', $img);
        $req->bindParam(':des', $des);
        $req->execute();
    }
}