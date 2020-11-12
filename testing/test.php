<?php
/* AJAX check  */
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

  echo "hahaha<br>";

}
else{
?>   
<html>
    <title>Post to self</title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js">

    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.x-button').live("click", function () {
                $.ajax({
                    type: "POST",
                    url: <?php echo "\"".htmlspecialchars($_SERVER["PHP_SELF"])."\"";?>,
                    data: $(".aj").serialize(),
                    success: function (data) {
                        alert("Data Loaded:");
                    }
                });
            });
        });
    </script>
    </head>

    <body>
       <form name="input" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="aj" method="post" target="_blank">
                <article>
                    <label>Firstname</label>
                    <input type="text" name="firstname" value="Ed" class="x-input"
                    />
                </article>
                <article>
                    <label>Lastname</label>
                    <input type="text" name="lastname" value="Doe" class="x-input"
                    />
                </article>
                <article>
                    <label>City</label>
                    <input type="text" name="city" value="London" class="x-input"
                    />
                </article>
                <input type="submit" value="Update Options" class="x-button" />
            </form>
    </body>

</html>
<?php }?>