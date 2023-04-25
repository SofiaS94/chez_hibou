<?php

namespace App\Model;

use App\Model\DateTime;

class PaymentModel
{
    public function validateCardType($cardType)
    {
        // validate the selected card type entered in the form
        // return true if it is a valid card type, false otherwise
        $validCardTypes = array("mastercard", "visa", "amex", "paypal");
        return in_array(strtolower($cardType), $validCardTypes);
    }

    public function validateCardholderName($cardholderName)
    {
        // validate the cardholder name entered in the form
        // return true if it is a valid cardholder name, false otherwise
        return preg_match('/^[a-zA-Z\s]+$/', $cardholderName);
    }

    public function validateCardNumber($cardNumber)
    {
        // validate the card number entered in the form
        // return true if it is a valid card number, false otherwise
        return preg_match('/^\d{4}[\s\-]?\d{4}[\s\-]?\d{4}[\s\-]?\d{4}$/', $cardNumber);
    }

    public function validateExpirationDate($expirationDate)
    {
        // validate the expiration date entered in the form
        // return true if it is a valid expiration date, false otherwise
        $date = DateTime::createFromFormat('m/Y', $expirationDate);
        return $date && $date->format('m/Y') === $expirationDate;
    }

    public function validateCVV($cvv)
    {
        // validate the CVV entered in the form
        // return true if it is a valid CVV, false otherwise
        return preg_match('/^\d{3}$/', $cvv);
    }
}
