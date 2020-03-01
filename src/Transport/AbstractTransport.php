<?php

namespace src\Transport;

/**
 * Class AbstractTransport
 * @package src\Transport
 */
abstract class AbstractTransport implements TransportInterface
{

    /**
     * @var string
     */
    protected $departureDestination;

    /**
     * @var string
     */
    protected $arrivalDestination;

    /**
     * @constant Message handler
     */
    const MESSAGE_FINAL_DESTINATION = 'You have arrived at your final destination.';

    /**
     * AbstractTransport constructor.
     * @param array $trip
     */
    public function __construct(array $trip)
    {
        foreach ($trip as $key => $value) {

            // Make attribute's first character lowercase
            $property = lcfirst($key);

            // check if required porperty exists
            if (property_exists($this, $property)) {
                $this->{$property} = $value;
            }
        }
    }

}
