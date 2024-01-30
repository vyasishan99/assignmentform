<?php
    //   if(isset($_POST["dwn"]))
    //   {
    //     $path='images/ishan.jpg';
    //      header ('Content-Description: File Transfer');
    //      header ('Content-Type: application/octet-stream');
    //      header ('Content-Disposition: attachment; filename="'.$path.'"');
    //      ob_clean();
    //      flush();
    //      readfile($path);
    //      exit;
    //   }
    //   ?>

<?php
      if(isset($_POST["dwn"]))
      {
        $path='images/natures.jpg';
         header ('Content-Description: File Transfer');
         header ('Content-Type: application/octet-stream');
         header ('Content-Disposition: attachment; filename="'.$path.'"');
         ob_clean();
         flush();
         readfile($path);
         exit;
      }
      ?>