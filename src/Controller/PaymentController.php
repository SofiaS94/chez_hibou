<?php

namespace App\Model;

use App\Model\PaymentModel;

class PaymentController
{
    public function processPayment()
    {
        $paymentModel = new PaymentModel();

        $cardType = $_POST['cardType'];
        $cardholderName = $_POST['cardholderName'];
        $cardNumber = $_POST['cardNumber'];
        $expirationDate = $_POST['expirationDate'];
        $cvv = $_POST['cvv'];

        // Validate payment details
        if (!$paymentModel->validateCardType($cardType)) {
            echo "Invalid card type";
            return;
        }

        if (!$paymentModel->validateCardholderName($cardholderName)) {
            echo "Invalid cardholder name";
            return;
        }

        if (!$paymentModel->validateCardNumber($cardNumber)) {
            echo "Invalid card number";
            return;
        }

        if (!$paymentModel->validateExpirationDate($expirationDate)) {
            echo "Invalid expiration date";
            return;
        }

        if (!$paymentModel->validateCVV($cvv)) {
            echo "Invalid CVV";
            return;
        }

        // Process payment
        $paymentDetails = array(
            'cardType' => $cardType,
            'cardholderName' => $cardholderName,
            'cardNumber' => $cardNumber,
            'expirationDate' => $expirationDate,
            'cvv' => $cvv
        );

        if (!$paymentModel->processPayment($paymentDetails)) {
            echo "Payment processing failed";
            return;
        }

        // Payment success
        echo "Payment successful!";
    }
}
