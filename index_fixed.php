
<!DOCTYPE html>
<html>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload file" name="submit">

</form>

<a href="./index.php?file=data.xml">View data</a>
<br>

</body>
</html>

<?php 
if(isset($_GET['file'])){
  
  libxml_disable_entity_loader(true);
  $xmlfile = file_get_contents("./uploads/" . $_GET['file']);
  $dom = new DOMDocument(); 
  
  $dom->loadXML($xmlfile);
  $students = simplexml_import_dom($dom);
  foreach ($students->student as $student) {
    print $student->name .  "    " . $student->year . "    " . $student->school .  "<br>";
  }
}
?>