<?php

namespace App\Model;

use DateTime;


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

    public function processPayment($paymentDetails)
    {
        // process the payment using the validated payment details
        // return true if the payment was successful, false otherwise
        // the $paymentDetails argument would contain all the validated payment details, e.g. array("cardType" => "visa", "cardholderName" => "John Doe", "cardNumber" => "1234 5678 9012 3456", "expirationDate" => "02/2023", "cvv" => "123")
        // you would need to implement the payment processing logic here
        return true;
    }
}
