<?php
    require_once __DIR__ . '/../mongodb/vendor/autoload.php';  
        
    try {
        $client = (new MongoDB\Client(
            'mongodb+srv://dbUser:dbUserPassword@cluster0.fumom.mongodb.net/xml_processor_book_db?retryWrites=true&w=majority'
        ));          

        // $databases=$client->listDatabases();  //
        // print_r($databases); //

        $db = $client->xml_processor_book_db;   
        // echo "\r\nSuccessfully connected to MongoDB database ", $db, "! : )","\r\n"; //
    } catch (MongoDB\Driver\Exception\ConnectionException $e) {
        echo "ConnectionException:", $e->getMessage(), "\n";   
    } catch (MongoDB\Driver\Exception\ConnectionTimeoutException $e) {
        echo "\r\n","Exception:", $e->getMessage(), "\n";
    } catch (Exception $e) {
        echo "\r\n","Exception:", $e->getMessage(), "\n";
    }
?>