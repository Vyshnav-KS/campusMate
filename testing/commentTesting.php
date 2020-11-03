<!DOCTYPE html>
<html>
<title>Comment test</title>
    <style>
      .commentBox {
        width: 40%;
        height: 100px;
        padding: 10px;
        background-color: #d0e2bc;
      }
    </style>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>

<p>Comment Sys Test</p><br>
<textarea type="text" id="text_box" name="lname" class="commentBox"></textarea><br>
<button class="send">Add comment</button>
<p id="paragraph_here"> </p>


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
