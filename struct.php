<?php
$player = [
    "name" => "Ronaldo",
    "country" => "Portugal",
    "age" => 31,
    "currentTeam" => "Real Madrid"
];

$ronaldo = [
    "name" => "Ronaldo",
    "country" => "Portugal",
    "age" => 31,
    "currentTeam" => "Real Madrid"
];
$messi = [
    "name" => "Messi",
    "country" => "Argentina",
    "age" => 27,
    "currentTeam" => "Barcelona"
];
$team = [
    "player1" => $ronaldo,
    "player2" => $messi
];

class Player
{
    public $name;
    public $country;
    public $age;
    public $currentTeam;
}
$ronaldo = new Player;
$ronaldo->name = "Ronaldo";
$ronaldo->country = "Portugal";
$ronaldo->age = 31;
$ronaldo->currentTeam = "Real Madrid";
