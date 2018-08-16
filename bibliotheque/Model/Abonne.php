<?php

namespace Model;

class Abonne
{
    /**
     * 
     * @var int
     */
    private $id;

    /**
     * 
     * @var string
     */
    private $prenom;

    public function __construct( $prenom = null, $id = null)
    {
        $this->setId($id);
        $this->setPrenom($prenom);
    }
    

    /**
     * Get the value of id
     *
     * @return  int
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param  int  $id
     *
     * @return  self
     */ 
    public function setId( $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of prenom
     *
     * @return  string
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @param  string  $prenom
     *
     * @return  self
     */ 
    public function setPrenom( $prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    public static function fetchAll()
    {
        $pdo = Cnx::getInstance();

        $stmt = $pdo->query('SELECT * FROM abonne');
        $abonnes = [];

        foreach ($stmt->fetchAll() as $abonne) {
            $abonnes[] = new self(
                $abonne['prenom'],
                $abonne['id']
            );
        }

        return $abonnes;

    
    }
    
    public function save()
    {
      $pdo = Cnx::getInstance();
      $query = 'INSERT INTO abonne (prenom) VALUES (:prenom)';
      $stmt = $pdo->prepare($query);
      $stmt->execute([
          ':prenom' => $this->getPrenom(),
      ]);
   }
}