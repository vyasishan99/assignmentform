<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <center>
      <form method="post" action="">
        <button type="submit" name="dwn">Download Our brouchers <span class="fa fa-book"></span></button>
      </form>
    </center>

    <?php
      if(isset($_POST["dwn"]))
      {
        $path='images/mysql.pdf';
         header ('Content-Description: File Transfer');
         header ('Content-Type: application/octet-stream');
         header ('Content-Disposition: attachment; filename="'.$path.'"');
         ob_clean();
         flush();
         readfile($path);
         exit;
      }
      ?>
</body>
</html>