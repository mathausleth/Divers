<?php
// Classe Mouton
class Mouton {
    private $nom;
    private $valeur;

    public function __construct($nom, $valeur) {
        $this->nom = $nom;
        $this->valeur = $valeur;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getValeur() {
        return $this->valeur;
    }
}
// Classe Troupeau
class Troupeau {
    private static $moutons;
	
	public static function initialiserTroupeau() {
        self::$moutons = array(new Mouton('Danny', 75), new Mouton('Richard', 60));
    }
	
    public static function ajouterMouton($nom, $valeur) {
        self::$moutons[] = new Mouton($nom, $valeur);
    }

    public static function calculerMoyenneValeur() {
        $sumValMoutons = 0;
        foreach (self::$moutons as $mouton) {
            $sumValMoutons += $mouton->getValeur();
        }
        return $sumValMoutons / count(self::$moutons);
    }

    public static function genererNomAleatoire() {
		$nbCharsNameMouton=rand(3,15);
        $chaine = "abcdefghijklmnpqrstuvwxyABCDEFGHIJKLMNOPQRSUTVWXYZ";
        $nbChars = strlen($chaine);
        $randNameMouton = '';
        for ($i = 0; $i < $nbCharsNameMouton; $i++) {
            $randNameMouton .= $chaine[rand(0, $nbChars - 1)];
        }
        return $randNameMouton;
    }

    public static function ajouterMoutonsAleatoires($nombre) {
        for ($j = 0; $j < $nombre; $j++) {
            $randNameMouton = self::genererNomAleatoire();
            $randValMoutons = rand(10, 200);
            self::ajouterMouton($randNameMouton, $randValMoutons);
        }
    }

    public static function afficherMoyenne() {
        $moyValMoutons = self::calculerMoyenneValeur();
        echo "Moyenne de la valeur de mes " . count(self::$moutons) . " moutons : " . $moyValMoutons . PHP_EOL;
    }
}
// Je récupère mes 2 moutons Danny et Richard
Troupeau::initialiserTroupeau();
// J'ajoute un mouton
Troupeau::ajouterMouton('Gérard', 120);

// J'affiche la moyenne de la valeur de mes moutons
Troupeau::afficherMoyenne();


// Ajout de 100 moutons aléatoires
Troupeau::ajouterMoutonsAleatoires(100);

// Affichage de la nouvelle moyenne
Troupeau::afficherMoyenne();
?>