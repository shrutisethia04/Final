<?php

// function to validate file type

function file_chk ($filename)
{
$upload_status =1;
$name = $filename['name'];
$tmp_name = $filename['tmp_name'];
$size= $filename["size"];
$extension = strtolower(substr($name, strpos($name,'.')+1) );

if ($size >=2097152 )
{  $upload_status =0;
   echo "File too large ! greater than 2 mb";
}
else  { if ($size ==0 )
          {  $upload_status =0;
             echo "File empty !!";
          }
          else   {  if($extension == "jpg" || $extension == "png" || $extension == "jpeg" || $extension == "gif" )
                          $upload_status =1;
                     else  { echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>"; $upload_status =0; }
                  }

       }
return $upload_status ;
}

//*********************************************************************************
function clean($string) {
   $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
   $string = str_replace('-', '', $string);
   return preg_replace('/[^A-Za-z0-9\-]/','',$string); // Removes special chars.
}
//*********************************************************************************

echo '
<script>
var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];
function ValidateSingleInput(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
         if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }

            if (!blnValid) {

               alert ("Sorry, invalid file , only images are allowed" );
                oInput.value = "";
                return false;
            }
        }
    }
    return true;
}</script> ';
   // alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
   //January is 0!
echo '
<script>
function Validate_date(Input)
{
var check = false;
var d = new Date(Input.value);
var today = new Date();
var cdd = today.getDate();
var cmm = today.getMonth()+1;
var cyyyy = today.getFullYear();
if(d.getFullYear() >= cyyyy )
{
  if( (d.getMonth()+1) >= cmm )
   {
     if( d.getDate() >= cdd )
         { check=true ; }
   }
}
 if (!check) {

               alert ("Sorry, invalid date !!" );
                Input.value = "";
                return false;
            }
return true ;
}


</script>
';
// document.getElementById("content").innerHTML = "<br><br>";
 
?>