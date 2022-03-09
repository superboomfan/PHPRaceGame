<?php
include('Car.php');
include('RaceResult.php');

class Race
{
    public function runRace(): RaceResult
    {
        $trackElement = array();
        $counter = 0; //for changing track between curved and straight in rand loop
        $trackRand = rand(0,1); //0 is curved, 1 is straight
        $round = 0; //round number

        //Set up the curves and straights for the track.
        for ($i = 0; $i < 2000; $i++, $counter++) 
        { 
            if($counter >= 40)
            {
                $counter = 0;
                $trackRand = rand(0,1);
            }

            $trackElement[$i] = $trackRand;
            echo $counter . "counter \n";
            echo count($trackElement) - 1 . "element \n";
            echo $trackElement[$i] . "random \n";

        }

        //new objects for car. Min speed(4), max speed(22)
        $car1 = new Car(4, 22);
        $car2 = new Car(4, 22);
        $car3 = new Car(4, 22);
        $car4 = new Car(4, 22);
        $car5 = new Car(4, 22);

        $raceResult = new RaceResult();

        while (!($car1Distance == 1999 && $car2Distance == 1999 && $car3Distance == 1999 && $car4Distance == 1999 && $car5Distance == 1999)) 
        {
            //car positions after a round
            $car1Distance = $car1->roundResult($trackElement);
            $car2Distance = $car2->roundResult($trackElement);
            $car3Distance = $car3->roundResult($trackElement);
            $car4Distance = $car4->roundResult($trackElement);
            $car5Distance = $car5->roundResult($trackElement);

            //adding car positions to an array
            $carPositions = array($car1Distance, $car2Distance, $car3Distance, $car4Distance, $car5Distance);

            $roundResult = new RoundResult($round, $carPositions);  //round result
            $raceResult->addRoundResults((array)$roundResult);  //tally up of round results
            $round++;
        }

        return $raceResult;
    }

}
