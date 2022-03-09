<?php
include('RoundResult.php');

class Car
{
    private $curveSpeed = 0;
    private $straightSpeed = 0;
    private $distance = 0;  //distance the current car has travelled through the track

    public function __construct(int $minSpeed, int $maxSpeed)
    {
        $this->curveSpeed = rand($minSpeed,$maxSpeed - $minSpeed);
        $this->straightSpeed = $maxSpeed - $this->curveSpeed;
    }

    public function distance(int $distance)
    {
        $this->distance = $distance;
    }

    public function getDistance(): int
    {
        return $this->distance;
    }

    public function getCurveSpeed(): int
    {
        return $this->curveSpeed;
    }

    public function getStraightSpeed(): int
    {
        return $this->straightSpeed;
    }

    public function roundResult(array $trackElement): int
    {
        //end of race for racer
        if ($this->distance >= 1999) 
        {
            return 1999;
        }
        else if($trackElement[$this->distance] == 0) //curve
        {
            for ($i=0; $i < $this->curveSpeed; $i++, $this->distance++) 
            { 
                //end of race for racer
                if ($this->distance >= 1999) 
                {
                    return 1999;
                }

                //exits if the track element doesn't match the next element in the array and advances the distance by 1 for the next group of track
                if ($trackElement[$this->distance] != $trackElement[$this->distance+1])
                {
                    //advance distance by one for next group of track
                    $this->distance++;
                    return $this->distance;
                }
            }
            //return new RoundResult($this->$round, $this->$distance);
            return $this->distance;
        }
        else if($trackElement[$this->distance] == 1) //straight
        {
            for ($i=0; $i < $this->straightSpeed; $i++, $this->distance++) 
            { 
                //end of race for racer
                if ($this->distance >= 1999) 
                {
                    return 1999;
                }

                //exits if the track element doesn't match the next element in the array and advances the distance by 1 for the next group of track
                if ($trackElement[$this->distance] != $trackElement[$this->distance+1])
                {
                    $this->distance++;
                    return $this->distance;
                }
            }
            return $this->distance;
        }
        
    }


}