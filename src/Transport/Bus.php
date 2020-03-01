<?php

namespace src\Transport;

/**
 * Class Bus
 * @package src\Transport
 */
class Bus extends AbstractTransport
{
    const MESSAGE = 'Take the bus from airport';
    const MESSAGE_FROM_TO = ' from %s to %s. ';
    const MESSAGE_NO_SEAT = 'Set not Assigned.';

    /**
     * @return string
     * Return a message for a trip
     */
    public function getMessage()
    {
        // print message
        $message = sprintf(
            self::MESSAGE . self::MESSAGE_FROM_TO,
            $this->departureDestination,
            $this->arrivalDestination
        );

        $message .= self::MESSAGE_NO_SEAT;

        return $message . '<br/>';
    }
}
