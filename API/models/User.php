<?php

require_once __DIR__.'/../utils/FieldValidator.php';

class User implements JsonSerializable{

  private $id;
  private $email;
  private $password;
  private $username;

  public function __construct( ?int $id, string $email, string $password, ?string $username){
    $this->id=$id;
    $this->email=$email;
    $this->password=$password;
    $this->username=$username;
  }

  public function getId(): ?int { return $this->id; }
  public function getEmail(): string { return $this->email; }
  public function getPassword(): string { return $this->password; }
  public function getUsername(): string { return $this->username; }

  public function setId(int $id){ $this->id = $id; }

  public function __toString(): string{
    $out = "";
    foreach (get_object_vars($this) as $key => $value) {
      $out .= "$key: $value | ";
    }

    return $out;
  }

  public function jsonSerialize(){
    return get_object_vars($this);
  }

  public static function connect(array $data): array{
    //API URL
    $url = 'http://Maxou.me/API/api/user/connect.php';

    $data["token"] = "supertokensananes";

    $ch = curl_init($url);
    $payload = json_encode($data);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $array = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($array, true);

    return $result;
  }

  public static function listeTrain(): array{
    // create curl resource
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "localhost/exam/exam/api/train/list.php");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $arrayJson = curl_exec($ch);
    curl_close($ch);
    $array = json_decode($arrayJson, true);

    $arrayObj = [];
    foreach ($array as $train) {
      array_push($arrayObj, new Train($train["numero"], $train["marque"], $train["modele"], $train["description"], $train["anneeConstruction"], $train["isInMaintenance"], $train["idCentre"]));
    }

    return $arrayObj;
  }

  public static function modifyTrain(array $data): bool{
    //API URL
    $url = 'http://localhost/exam/exam/api/train/modify.php';

    $ch = curl_init($url);
    $payload = json_encode($data);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
  }

  public static function addToCentre(array $data){
    //API URL
    $url = 'http://localhost/exam/exam/api/train/addToCentre.php';

    $ch = curl_init($url);
    $payload = json_encode($data);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
  }

  public static function removeFromCentre(array $data){
    //API URL
    $url = 'http://localhost/exam/exam/api/train/removeFromCentre.php';

    $ch = curl_init($url);
    $payload = json_encode($data);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
  }

  public static function getTrainInCentre(int $idCentre): array{
    //API URL
    $url = 'http://localhost/exam/exam/api/train/listTrainInCentre.php';

    $data["idCentre"]=$idCentre;
    $ch = curl_init($url);
    $payload = json_encode($data);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $arrayJson = curl_exec($ch);
    curl_close($ch);

    $array = json_decode($arrayJson, true);

    if($array != null){
      $arrayObj = [];
      foreach ($array as $train) {
        array_push($arrayObj, new Train($train["numero"], $train["marque"], $train["modele"], $train["description"], $train["anneeConstruction"], $train["isInMaintenance"], $train["idCentre"]));
      }
      return $arrayObj;
    } else {
      return [];
    }
  }

  public static function deleteTrain(int $numero){
    //API URL
    $url = 'http://localhost/exam/exam/api/train/delete.php';

    $data["numero"]=$numero;

    $ch = curl_init($url);
    $payload = json_encode($data);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
  }
}

 ?>
