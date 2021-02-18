<?php
$dir = 'sqlite:eshop';
$dbh  = new PDO($dir) or die("cannot open the database");
?>




<!DOCTYPE html>
<html lang="eng">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale-1.0">
        <title>PRODUCTS|Ecommerce Project</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;600;700&display=swap" rel="stylesheet">
        <link href="https://unpkg.com/tabulator-tables@4.9.1/dist/css/tabulator.min.css" rel="stylesheet">
        <script type="text/javascript" src="https://unpkg.com/tabulator-tables@4.9.1/dist/js/tabulator.min.js"></script>
    </head>
    <body>
        <div class="header">
            <div class="container">
                <div class="navbar">
                    <div class="logo">
                        <img src="images/logo.png" alt="Site Logo" width="60px">
                    </div>
                    <nav>
                        <ul id="MenuItems">
                            <li><a href="index.html"><b>HOME</b></a></li>
                            <li><a href="products.html"><b>PRODUCTS</b></a></li>
                            <li><a href="about.html"><b>ABOUT</b></a></li>
                            <li><a href="contact.html"><b>CONTACT US</b></a></li>
                            <li><a href="login.html"><b>ACCOUNT</b></a></li>
                        </ul>
                    </nav>
                    <img src="images/Shopping_cart.png" alt="Shopping cart" width="30px" height="30px">
                    <img src="images/Menu.png" alt="Menu icon"  class="Menu_Icon" onclick="menutoggle()">
                </div>
            </div>
        </div>
        <div id="product-table">

        </div>
        <!--footer-->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-col-1">
                        <h3>Project</h3>
                        <p>
                            Dummy text Dummy text Dummy text Dummy text<br> 
                            Dummy text Dummy text Dummy text Dummy text<br> 
                            Dummy text Dummy text Dummy text Dummy text<br> 
                        </p>
                    </div>
                    <div class="footer-col-2">
                        <img src="images/Logo-white.png" alt="Site Logo">
                    </div>
                </div>
            </div>
        </div>
    <!----js for product table-->
  
    <script type="text/javascript">
        var tabledata = [
            <?php
                $query =  "SELECT * FROM cds ";
                foreach ($dbh->query($query) as $row)
                {
                    ?>
                    {id:<?php echo $row['cd_id']?>, Album:"<?php echo $row['album_name']?>",Artist:"<?php echo $row['Artist']?>", Reviews:<?php echo $row['reviews']?>, Genre:"<?php echo $row['genre']?>"},
                    <?php
                }
                ?>
 
        ];

//initialize table
var table = new Tabulator("#product-table", {
    
    data:tabledata,           //load row data from array
    layout:"fitColumns",      //fit columns to width of table
    responsiveLayout:"hide",  //hide columns that dont fit on the table
    tooltips:true,            //show tool tips on cells
    addRowPos:"top",          //when adding a new row, add it to the top of the table
    history:true,             //allow undo and redo actions on the table
    pagination:"local",       //paginate the data
    paginationSize:3,         //allow 7 rows per page of data
    movableColumns:true,      //allow column order to be changed
    resizableRows:true,       //allow row order to be changed
   
    initialSort:[             //set the initial sort order of the data
        {column:"name", dir:"asc"},
    ],
    columns:[                 //define the table columns
        {title:"Album", field:"Album"},
        {title:"Artist", field:"Artist"},
        {title:"Reviews", field:"Reviews", hozAlign:"left", formatter:"progress", editor:true},
        {title:"Genre", field:"Genre"},
    ],
});
    </script>    
    <!------js for toggle menu-->
    <script>
        var MenuItems=document.getElementById("MenuItems");
        MenuItems.style.maxHeight="0px";
        function menutoggle(){
            if(MenuItems.style.maxHeight=="0px")
            {
                MenuItems.style.maxHeight="200px";
            }
            else
            {
                MenuItems.style.maxHeight="0px";
            }
        }
    </script>
    </body>
</html>

<?php
    $dbh = null; //This is how you close a PDO connection
?>