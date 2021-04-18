<?php
$un=$_POST['username'];
$em=$_POST['useremail'];

$meesg=$_POST['mesg'];
if(trim($un)!="Your Name" && trim($em)!="Your Email" && trim($wsite)!="Your Website" && trim($meesg)!="Your message" && trim($un)!="" && trim($em)!=""  && trim($meesg)!="")
{
	if(filter_var($em, FILTER_VALIDATE_EMAIL))
	{
		$message="Dies ist eine Anfrage über DJ-Zamunda.com
			<p>".$un." von folgender Kontakt-Email: ".$em." </p>

			<p>Nachricht : ".$meesg."</p>";
		
		$message_user="Hi ".$un."<p> Vielen Dank für Ihre Anfrage an DJ Prinz Paul Zamunda. Ich freue mich darüber und werden mich bei Ihnen bald melden. 
		 <br> Ihr Prinz Paul Zamunda.</p><p>Have a happy day!</p>";
		
		
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: <booking@dj-zamunda.com>' . "\r\n";

		if(mail('booking@dj-zamunda.com','Anfrage über DJ-Zamunda.com',$message,$headers ))
		{
		mail($em,'Danke für Ihre Nachricht an DJ Zamunda',$message_user,$headers );
			
		echo '1#<p style="color:green;">Die Nachricht wurde erfolgreich verschickt.</p>';
		}
		else
		{
		echo '2#<p style="color:red;">Bitte, versuchen Sie es nochmals.</p>';
		}
	}
	else
		echo '2#<p style="color:red">Bitte geben Sie eine gültige Email-Adresse ein.</p>';
}
else
{
echo '2#<p style="color:red">Bitte füllen Sie alle Felder korrekt aus.</p>';
}?>