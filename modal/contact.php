<?php

// Put contacting email here
$php_main_email = "manoel@optionstech.com.br";

//Fetching Values from URL
$php_name = $_POST['ajax_name'];
$php_email = $_POST['ajax_email'];
$php_message = $_POST['ajax_message'];



//Sanitizing email
$php_email = filter_var($php_email, FILTER_SANITIZE_EMAIL);


//After sanitization Validation is performed
if (filter_var($php_email, FILTER_VALIDATE_EMAIL)) {
	
	
		$php_subject = "Mensagem do formulário de contato";
		
		// To send HTML mail, the Content-type header must be set
		$php_headers = 'MIME-Version: 1.0' . "\r\n";
		$php_headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$php_headers .= 'From:' . $php_email. "\r\n"; manoel@optionstech.com.br // Sender's Email
		$php_headers .= 'Cc:' . $php_email. "\r\n"; contato@optionstech.com.br // Carbon copy to Sender
		
		$php_template = '<div style="padding:50px;">Hello ' . $php_name . ',<br/>'
		. 'Obrigado por entrar em contato comigo.<br/><br/>'
		. '<strong style="color:#f00a77;">Name:</strong>  ' . $php_name . '<br/>'
		. '<strong style="color:#f00a77;">Email:</strong>  ' . $php_email . '<br/>'
		. '<strong style="color:#f00a77;">Message:</strong>  ' . $php_message . '<br/><br/>'
		. 'Este é um e-mail de confirmação de contato.'
		. '<br/>'
		. 'Entraremos em contato com você o mais breve possível .</div>';
		$php_sendmessage = "<div style=\"background-color:#f5f5f5; color:#333;\">" . $php_template . "</div>";
		
		// message lines should not exceed 70 characters (PHP rule), so wrap it
		$php_sendmessage = wordwrap($php_sendmessage, 70);
		
		// Send mail by PHP Mail Function
		mail($php_main_email, $php_subject, $php_sendmessage, $php_headers);
		echo "";
	
	
} else {
	echo "<span class='contact_error'>* Email invalido *</span>";
}

?>