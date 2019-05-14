<?php
require_once __DIR__ . '/../utils/DatabaseManager.php';
require_once __DIR__ . '/../models/User.php';

class UserService {

  private static $instance;

  private function __construct() {

  }

  public static function getInstance(): UserService {
    if(!isset(UserService::$instance)){
      UserService::$instance = new UserService();
    }
    return UserService::$instance;
  }


  function connect(User $userObj): ?array{
    $db = DatabaseManager::getDatabase();
    $user = $db->findOne('SELECT * FROM users WHERE email = ? AND password = ? ',[$userObj->getEmail(),$userObj->getPassword()]);
    if ($user) {
      $response = array('status_code' => 1,'message' => "user", 'data' => $user);
      return $response;
    } else {
      return $response = array('status_code' => 0, 'message' => "user");
    }
  }

  public static function hashPassword(string $password): string {
    $salting='a34Rvepin1adokvTnwSeiMaxImWillETYOU';
    return hash('md5',$salting.$password);
  }

  function getTrainInCentre( int $idCentre): array{
    $db = DatabaseManager::getDatabase();
    $list = $db->getALL('SELECT * FROM train WHERE idCentre = ? ',[$idCentre]);
    return $list;
  }

  public function insert(Train $train): ?Train {
    $db = DatabaseManager::getDatabase();
    $affectedRows = $db->exec('INSERT INTO train (marque, modele, description, anneeConstructionn, isInMaintenance) VALUES ( ?, ?, ?, ?, 0) ', [$train->getMarque(),$train->getModele(),$train->getDescription(),$train->getAnneeConstruction()]);
    if ($affectedRows > 0) {
      $train->setNumero(intval($db->lastInsertId()));
      return $train;
    }
    return null;
  }

  public function modify(int $numero, string $description): bool {
    $db = DatabaseManager::getDatabase();
    $affectedRows = $db->exec('UPDATE train SET description = "'.$description.'" WHERE numero = '.$numero.' ');
    if ($affectedRows > 0) {
      return true;
    }
    return false;
  }

  public function delete(int $numero): bool {
    $db = DatabaseManager::getDatabase();
    $affectedRows = $db->exec('DELETE FROM train WHERE numero = ? ',[$numero]);
    if ($affectedRows > 0) {
      return true;
    }
    return false;
  }

  public function addToCentre(int $numero, int $idCentre): bool {
    $db = DatabaseManager::getDatabase();
    $affectedRows = $db->exec('UPDATE train SET isInMaintenance = 1 , idCentre = "'.$idCentre.'" WHERE numero = '.$numero.' ');
    if ($affectedRows > 0) {
      return true;
    }
    return false;
  }

  public function removeFromCentre(int $numero): bool {
    $db = DatabaseManager::getDatabase();
    $affectedRows = $db->exec('UPDATE train SET isInMaintenance = 0 , idCentre = NULL WHERE numero = '.$numero.' ');
    if ($affectedRows > 0) {
      return true;
    }
    return false;
  }
}
