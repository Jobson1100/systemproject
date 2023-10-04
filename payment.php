<?php
    session_start();
  

        // Database connection parameters
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'project';

        // Create a database connection
        $connection = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        
    require_once('../payment/vendor/autoload.php');

    use \Stripe\Stripe;
    use \Stripe\Checkout\Session;

    $secret_key = "sk_test_51NvE3WFVFyheGHQmD9t77B4PRMRSMVGEAXlCaLwckpMPkc0dL27lTIVHTCn70cZwwJSnyCkVArHWMVaqvc5HUfe300dI5i9W5Q";

    Stripe::setApiKey($secret_key);


    header("Content-Type: application/json");
// Retrieve the total budget from the URL using GET
$totalBudget = isset($_GET['totalBudget']) ? (float)$_GET['totalBudget'] : 0;

// Add this line before creating the Checkout Session
echo "Total Budget: " . $totalBudget . "<br>";

    $checkout_session = Session::create
    ([
        'line_items' =>
        [[
            'price_data' =>
            [
                'currency' => 'mwk',
                'product_data' =>
                [
                    'name' => 'NEHUWA Quotation Payments'
                ],
                'unit_amount' =>  $totalBudget,
            ],
            'quantity' => 1
        ]],
        'mode' => 'payment',
        'success_url' => 'http://localhost/payment/src/paid.php',
        'cancel_url' => 'http://localhost/payment/src/error.php'
    ]);

    header("HTTP/1.1 303 See Other");
    header("Location: " . $checkout_session->url);
?>

