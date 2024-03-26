<?php
// dataFactory gets all rows from the controllers and returns printables or prints the rows directly.
// This gives a readable ETL process

include 'API/controllers/controller.php';

function printTestRecords($result)
{
    foreach ($x = mysqli_fetch_assoc($result) as $attribute) {
        echo " | " . $attribute . " | ";
    }
    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
        $customer = mysqli_fetch_assoc($result);
        echo "<br>";
        foreach ($customer as $attribute) {
            echo " | " . $attribute . " | ";
        }
    }
}

function printProducts($products) // Can also print a single product
{
    $result = $products;


    while ($row = mysqli_fetch_assoc($result)) {
?>
    <html>
        <!-- ------------------------------------>;
        <div id="product">n
            <form action="add.php" method="post">;
                <input type="hidden" name="productnummer" value="<?php $row["productnummer"]; ?>" />;

                <!-- <div id="prodnummer">".$row["productnummer"]."</div>; -->

                <p> <img id='plaatje' src= <?php /* showfile.php?image_id=$row["image_id"] */ printImage($row["image_id"])?> ></p> ; <p><img id='image' src=""></p>;

                <div id="prijs">€ ".number_format($row["prijs"], 2, ',', '.')."</div>;
                <div id="prodnaam">".$row["productnaam"]."</div>;
                <div id="beschrijving">".$row["beschrijving"]."</div>;
                <div id="leverbaar">Leverbaar: ".$row["leverbaar"]."</div>";
                <div id="voorraad">Voorraad: ".$row["voorraad"]."</div>;
                <div id="selecteer">Aantal: <input type="text" name="hoeveelheid" size="2" maxlength="2" value="1" />;
                <input type="submit" value="Bestel" class="button" />
                </div>;
            </form>
        </div>;
    </html>
<?php 
        mysqli_close(setConnection());
    }
}

function printImage($images)
{
    $result = $images;

    while ($row = mysqli_fetch_assoc($result)) {
        return $row;
    }
}


?>