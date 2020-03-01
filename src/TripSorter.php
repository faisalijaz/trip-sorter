<?php

namespace src;

/**
 * Class TripSorter
 * @package src
 */
class TripSorter
{
    /**
     * @var array
     * Boardings
     */
    protected $boardings = array();

    /**
     * @var array
     * Sorted boardings
     */
    protected $sortedBoardings = array();

    /**
     * @var array
     * Default set of transportation
     */
    protected static $transportations = array(
        'Train' => 'src\Transport\Train',
        'Bus' => 'src\Transport\Bus',
        'Plane' => 'src\Transport\Plane',
    );

    function __construct($boardings)
    {
        $this->boardings = $boardings;
    }

    public function addBoarding($boarding)
    {
        $this->boardings[] = $boarding;
    }

    /**
     * Sort boardings
     * This function sorts the boardings in order
     */
    public function sort()
    {
        // Create SortBoarding instance to sort data
        $boardingSorter = new SortBoarding($this->boardings);

        // Sort boardings and assign them to the sorted boardings array
        $boardingSorter->sort();
        $this->sortedBoardings = $boardingSorter->getBoardings();
    }

    /**
     * @return array
     * Get sorted transportations as an array of objects
     */
    public function getTransportations()
    {
        $transportationList = array();

        if (count($this->sortedBoardings) == 0) {
            return $transportationList;
        }

        foreach ($this->sortedBoardings as $boarding) {
            $type = $boarding['Transportation'];

            if (!isset(static::$transportations[$type])) {
                throw new Exception\RuntimeException(
                    sprintf(
                        'Unsupported transportation : %s',
                        $type
                    )
                );
            }
            $transportationList[] = new static::$transportations[$type]($boarding);
        }

        return $transportationList;

    }

    /**
     * Display TripSorter
     */
    public function tripString()
    {
        foreach ($this->getTransportations() as $idx => $transportaton) {

            echo ($idx + 1) . ". " . $transportaton->getMessage() . PHP_EOL . PHP_EOL;

            // Final destination message
            if ($idx == (count($this->boardings) - 1)) {
                echo ($idx + 2) . ". " . $transportaton::MESSAGE_FINAL_DESTINATION . PHP_EOL;
            }
        }

    }

    /**
     * @return array()
     * Get boardings
     */
    public function getBoardings()
    {
        return $this->boardings;
    }

    /**
     * @return array()
     * Get sorted boardings
     */
    public function getSortedBoardings()
    {
        return $this->sortedBoardings;
    }
}
