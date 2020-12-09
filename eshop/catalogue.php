<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link href="css/catalogue/style.css" rel="stylesheet">
    <link href="css/main/style.css" rel="stylesheet">

</head>

<body>
    <div class="wrapper">
        <header>
            <?php
            include($_SERVER['DOCUMENT_ROOT'] . "/iNordic/eshop/components/header/header.php");
            ?>
        </header>
        <main>
            <?php
            if ($_GET['catalogue'] == "men")
                include($_SERVER['DOCUMENT_ROOT'] . "/iNordic/eshop/components/catalogue/men.php");
            if($_GET['catalogue'] == "women")
                include($_SERVER['DOCUMENT_ROOT'] . "/iNordic/eshop/components/catalogue/women.php");
            ?>
        </main>
        <?php
        include($_SERVER['DOCUMENT_ROOT'] . "/iNordic/eshop/components/footer/footer.php");
        ?>
    </div>
</body>

</html>