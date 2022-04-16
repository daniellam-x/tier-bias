

<!DOCTYPE html>

<html lang="en">

<head>
    <title>Creater Tier</title>
    <link rel="stylesheet" href="./styles/base.css">
    <link rel="stylesheet" href="./styles/createtier.css">
    <link rel="icon" href="images/logo.png">
    <script defer src="createtierscript.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet">
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

    <?php



        if (isset($_POST["confirm"])) {
            thanksPage();
        } else {
            tierForm ();
        }


        #######################################################################

        function tierForm ()
        {
            $script = $_SERVER['PHP_SELF'];

            print <<<FORM
                <form method = "post" action = "$script">
                    <label for="title">Tier Title</label><br><br>
                    <input type="text" id="title" value="Title"><br><br>
                    <label for="row" id="rowlabel">Enter Rankings</label><br><br>
                    <input type="text" id="row" value="Enter List Element"><br><br>
                    <input type="text" id="row" value="Enter List Element"><br><br><br>
                    <button>Add Row</button><br><br>
                    <button>Delete Row</button><br><br>
                    <button>Post Tier List</button><br><br>
                    <button>Delete Tier List</button>
                    <input type="submit" name="confirm" value="Confirm Tier"><br><br>
                </form>
            FORM;
        }

        #######################################################################

        function thanksPage() {
            print <<<PAGE3

                <h2>
                    Your tier has been submitted.
                </h2>
                
            PAGE3;
        }

    
    ?>

    
    <div class="footer">
        <p>
            Lori VanHoose, Daniel Lam, Jessica Trejo, Brandon Kimble - 4/14/2022
        </p>
    </div>

</body>
    
</html>