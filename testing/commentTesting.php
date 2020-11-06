<!DOCTYPE html>
<html>
<title>Comment test</title>
<head>
  <link rel="stylesheet" href="CSScomment/comment.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>

<p>Comment Sys Test</p><br>
<textarea type="text" id="text_box" name="lname" class="commentBox"></textarea><br><br>
<button class="send">Add comment</button>
<div class="commentChat"><p id="paragraph_here" class="comSec"> </p></div>


  <script type="text/javascript">
  $(document).ready(function () {
  $(document).on('click', '.send', function () {
  $.ajax({
                type: 'POST',
                url: 'comments.php',
                data: {"page_id" : "page1" , "msg" : document.getElementById("text_box").value},

  success: function(response) {
      if (response == "error::not_logged_in") 
        {
          //Redirect to login page
          window.location.replace("../login.php");
        }
      $('#paragraph_here').html(response);
  }
  });
  });
  });
  </script>

</body>
</html>
