<?php

use PHPUnit\Framework\TestCase;



class Test extends TestCase{
    public function testMonTest(){
        require_once 'includes/class.pdogsb.inc.php';
        $pdo_test = PdoGsb::getPdoGsb();

        $pdo = new PDO('mysql:host=127.0.0.1;port=3307;dbname=gsb','root',''); 
        $requetePrepare = $pdo->prepare(
            'SELECT *
            FROM visiteur
            where role= 0'
        );
        $requetePrepare->execute();
        $attendu= $requetePrepare->fetchAll();
        
         $resultat= $pdo_test-> selectVisiteur();

        $this->assertSame($attendu,$resultat);
    }
}
?>