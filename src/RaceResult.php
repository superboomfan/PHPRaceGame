<?php

class RaceResult
{
    /**
     * @var array of StepResult
     */
    private $roundResults = [];

    public function getRoundResults(): array
    {
        return $this->roundResults;
    }

    public function addRoundResults(array $roundResults)
    {
        array_push($this->roundResults, $roundResults);
    }
}
