<?php

namespace src\Transport;

/**
 * Class Plane
 * @package src\Transport
 */
class Plane extends AbstractTransport
{

    /**
     * @var string|number
     */
    protected $transportationNumber;

    /**
     * @var string|number
     */
    protected $seatNumber;

    /**
     * @var string|number
     */
    protected $gateNumber;

    /**
     * @var string
     */
    protected $baggage;

    const MESSAGE = 'From %s, take flight %s to %s. Gate %s, seat %s.';
    const MESSAGE_BAGGAGE_TICKET = 'Baggage drop at ticket counter %s.';
    const MESSAGE_NO_BAGGAGE_TICKET = 'Baggage will we automatically transferred from your last leg.';

    /**
     * @return string
     * Return a message for the trip
     */
    public function getMessage()
    {
        $message = sprintf(
            static::MESSAGE,
            $this->departureDestination,
            $this->transportationNumber,
            $this->arrivalDestination,
            $this->gateNumber,
            $this->seatNumber
        );

        // Add Baggage message
        if (!empty($this->baggage)) {
            $message .= sprintf(
                PHP_EOL . '   ' . static::MESSAGE_BAGGAGE_TICKET,
                $this->baggage
            );

            return $message . '<br/>';
        }

        // We don't have bagage
        $message .= PHP_EOL . '   ' . static::MESSAGE_NO_BAGGAGE_TICKET;

        return $message . '<br/>';
    }
}
