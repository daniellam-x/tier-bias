<!DOCTYPE html>

<html lang="en">

<head>
    <title>Creater Tier</title>
    <link rel="stylesheet" href="./styles/base.css">
    <link rel="stylesheet" href="./styles/createtier.css">
    <link rel="icon" href="images/logo.png">
    <!-- <script defer src="createtierscript.js"></script> -->
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="description" content="Tier Bias, a new social media">
    <meta name="author" content="Lori VanHoose, Daniel Lam, Jessica Trejo, Brandon Kimble">
</head> 

<body>
    <div class="topnav">
        <div class="leftnav">
            <a href="homepage.html">
                <img src="images/logo.png" alt ="Tier Bias Logo" width="30" height="30">
                <h1>Tier Bias</h1>
            </a>
        </div>


        <div class="rightnav">
            
            <a href="homepage.html">Home</a>
            <a href="createtier.html">Create Tier</a>
            <a href="search.html">Search</a>
            <a href="contact.html">Contact Us</a>
            <a href="login.html">Log-In</a>
        
        </div>
    </div>
    
    <div class="content">
        <h1>
            <a href="./homepage.html"><img src="./images/logo.png" alt ="Tier Bias Logo" width="50" height="50"/></a>
            Create Tier
        </h1>
    </div>
    <div class="tierform">
        <h1>New Tier</h1>
        <?php



            if (isset($_POST["confirm"])) {
                thanksPage();
            } else {
                tierForm();
            }


            // #######################################################################

            function tierForm ()
            {
                $script = $_SERVER['PHP_SELF'];

                echo "<form method = 'post' action = '$script'>";
                echo "  <div id='form-contents'>";
                echo "  </div>";
                echo '</form>';
            }

            // #######################################################################

            function thanksPage() {
               echo "Your tier has been submitted";
            }

        
        ?>
    </div>
    
    <div class="footer">
        <p>
            Lori VanHoose, Daniel Lam, Jessica Trejo, Brandon Kimble - 4/14/2022
        </p>
    </div>

    <script src="./scripts/createtierscripts.js"></script>
</body>
    
</html>