<?php

namespace App\Models;

class Favourite{
    public $rooms = null;
    public $totalQuanty = 0;
    public function __construct($room){
        if($room){
            $this->rooms = $room->rooms;
            $this->totalQuanty = $room->totalQuanty;
        }
    }

    public function AddFavorite($room,$id){
        $newRoom = ['quanty' => 0,'roomInfo' => $room];
        if($this->rooms){
            if(array_key_exists($id,$this->rooms)){
                $newRoom = $this->rooms[$id];
            }
        }
        $newRoom['quanty']++;
        $this->rooms[$id] = $newRoom;
        $this->totalQuanty += $newRoom['quanty'];

    }
    
    public function DeleteFavorite($id){
        unset($this->rooms[$id]);
    }
}