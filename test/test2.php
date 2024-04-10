<?php

use PHPUnit\Framework\TestCase;



class Test2 extends TestCase{
    public function testMonTest(){
        require_once 'includes/class.pdogsb.inc.php';
        $pdo_test = PdoGsb::getPdoGsb();

;
        $attendu= 
            ['id'=>'a131',
            'nom'=>'Villechalane',
            'prenom'=>'Louis',
            'login'=>'lvillachane',
            'mdp'=>'jux7g',
            'adresse'=>'8 rue des Charmes',
            'cp'=>'46000',
            'ville'=>'Cahors',
            'dateEmbauche'=>'2005-12-21',
            'role'=>0];
        
        $resultat= $pdo_test-> selectVisiteur();
        var_dump($resultat[0]);

        $this->assertSame($attendu,$resultat[0]);
    }
}
?>