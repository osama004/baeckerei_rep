<?php

namespace App;

class UserCacheData
{
    public $name;
    public $email;
    public $telephone;
    public $note;
    public $zip;
    public $city;
    public $street;
    public $stairsHomeNr;

    /**
     * @param $name
     * @param $email
     * @param $telephon
     * @param $note
     * @param $zip
     * @param $city
     * @param $street
     * @param $stairsHomeNr
     */
    public function __construct($userCacheData)
    {
        if ($userCacheData != null) {
            $this->name = $userCacheData->name;
            $this->email =$userCacheData->email;
            $this->telephone =$userCacheData->telephone;
            $this->note =$userCacheData->note;
            $this->zip =$userCacheData->zip;
            $this->city =$userCacheData->city;
            $this->street =$userCacheData->street;
            $this->stairsHomeNr =$userCacheData->stairsHomeNr;
        }
        else {
            $this->name = "";
            $this->email = "";
            $this->telephone = "";
            $this->note = "";
            $this->zip = "";
            $this->city = "";
            $this->street = "";
            $this->stairsHomeNr = "";
        }

    }


}
