/* Transparent Email Obfuscation 2011 by Patrick Heck
	patrick (at) patrickheck.de
	
	this reverses all changes made to obfuscate email addesses */

$(function() {
	// restore mailto: links
	$("a[href^='#NOSPAM:']").each(function(){
		var email = $(this).attr("href").substr(8);
		// replace email with its reversed version
		email = email.split("").reverse().join("");
		// replace "#NOSPAM:" with "mailto:"
		$(this).attr("href","mailto:" + email);			
	}); 
	
	// restore other email addresses
	$(".transparent-email-obfuscation-unreverse").each(function() {
		// replace complete tag with its reversed content
		$(this).replaceWith($(this).text().split("").reverse().join(""));
	});
});