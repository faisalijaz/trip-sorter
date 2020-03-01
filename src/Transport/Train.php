<?php

namespace src\Transport;

/**
 * Class Train
 * @package src\Transport
 */
class Train extends AbstractTransport
{

    /**
     * @var string
     */
    protected $transportationNumber;

    /**
     * @var string
     */
    protected $seatNumber;

    const MESSAGE = 'Take train %s';
    const MESSAGE_FROM_TO = ' from %s to %s. ';
    const MESSAGE_SEAT = 'Sit in seat %s.';

    /**
     * Return a message for the trip,
     *
     * @return string
     */
    public function getMessage()
    {
        // Add Transportation number to the message
        $message = sprintf(static::MESSAGE, $this->transportationNumber);

        // Add (from => to) to the message
        $message = sprintf(
            $message . static::MESSAGE_FROM_TO,
            $this->departureDestination,
            $this->arrivalDestination
        );

        // Add Seat number to the message
        $message = sprintf($message . static::MESSAGE_SEAT, $this->seatNumber);

        return $message . '<br/>';
    }
}
