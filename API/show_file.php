<?php
// dbconnection.php used to connect to database
include 'dbconnection.php' ;

/*** some basic sanity checks ***/
if(filter_has_var(INPUT_GET, "image_id") !== false && filter_input(INPUT_GET, 'image_id', FILTER_VALIDATE_INT) !== false)
    {
    /*** assign the image id ***/
    $image_id = filter_input(INPUT_GET, "image_id", FILTER_SANITIZE_NUMBER_INT);
    try     {

        // set database connection to dbh
        $dbh = new PDO(setConnection());

        /*** set the PDO error mode to exception ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // query for database
        $sql = "SELECT image, image_type FROM afbeelding WHERE image_id=$image_id";

        // prepare statement 
        $stmt = $dbh->prepare($sql);

        // execute statement
        $stmt->execute(); 

        // fetch associative array
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // set header for image
        $array = $stmt->fetch();

        // check if contains 1 result
        if(sizeof($array) == 2)
            {
            // set headers and display image
            header("Content-type: ".$array['image_type']);

            // print image
            echo $array['image'];
            }
        else
            {
            throw new Exception("Out of bounds Error");
            }
        }
    // catch and filter on error
    catch(PDOException $e)
        {
        echo $e->getMessage();
        }
    catch(Exception $e)
        {
        echo $e->getMessage();
        }
        }
  else
        {
        echo 'Please use a real id number';
        }
?>