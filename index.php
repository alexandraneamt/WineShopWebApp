<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">  <!--allows browsers to view content-->
        <title></title>
    </head>
    <body>
        <?php require 'toolbar.php' ?> <!--calls the toolbar.php class and displays it-->
        <h1>Welcome</h1>
        <p>A wine shop wants to build a website to sell wines online to its 
            customers. For each wine, the name of the wine, a description of the
            wine, the year the wine was made, the type of wine (red, white, 
            rose, sparkling, dessert, fortified), and ideal serving temperature 
            needs to be recorded. Each wine comes from a particular winery. For
            each winery, the name, address, contact name, contact phone number, 
            contact email address, and website address need to be recorded. Each
            winery can produce several wines.</p>

        <p>The company also needs to record the type of grapes used to make each
            wine. Each wine can be made from several different types of grapes. 
            Each grape type can be used in several different types of wine. For 
            each wine, the percentage of each grape type in that wine needs to 
            be recorded. For each grape type, the name of the grape type, its 
            country of origin, and a description need to be recorded.</p>

        <p>Finally, the company wants to allow customers to leave comments about
            the wines the shop sells. For each comment, the following details 
            need to be recorded: the title of the comment, the body of the 
            comment, the date and time that the comment was made, and the name 
            of the person leaving the comment.</p>
    </body>
</html>
