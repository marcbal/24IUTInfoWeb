
// à mettre dans le <head>

var xhr = null;


function getXMLHttpRequest() {
    var xhr = null;
     
    if (window.XMLHttpRequest || window.ActiveXObject) {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            } catch(e) {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
        } else {
            xhr = new XMLHttpRequest(); 
        }
    } else {
        alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
        return null;
    }
     
    return xhr;
}






// fonctions de callback par défaut








function ajaxSendRequest(method, uri, data, callback_OK, callback_ERROR, callback_BUZY, callback_CANTCONNECT, timeout)
{
	if (xhr == null)
	{ // cette vérification dispense le programmeur de définir l'objet XHR
		xhr = getXMLHttpRequest();
	}
	
	if (timeout == null)
		timeout = 5000;
	
	if (callback_CANTCONNECT == null)
	{
		callback_CANTCONNECT = function() {}
	}
	if (callback_BUZY == null)
	{
		callback_BUZY = function() {}
	}
	
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4)
		{
			if (xhr.status == 200)
			{
				callback_OK(xhr.responseText);
			}
			else
			{
				callback_ERROR(xhr.status);
			}
		}
		else if (xhr.readyState == 2 || xhr.readyState == 3)
		{
			callback_BUZY(xhr.readyState);
		}
	}
	
	try
	{
		xhr.timeout = timeout;
	}
	catch (InvalidStateError)
	{
	}
	
	if (method == 'GET' || method == 'get')
	{
		if (data)
			data = '?'+data;
		try
		{
			xhr.open("GET", uri + data, true);
			xhr.send(null);
		}
		catch(e)
		{
			callback_CANTCONNECT();
		}
	}
	else if (method == 'POST' || method == 'post')
	{
		try
		{
			xhr.open("POST", uri, true);
			xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			xhr.send(data);
		}
		catch(e)
		{
			callback_CANTCONNECT();
		}
	}
	else
	{
		alert("Fonction SendRequest : paramètre invalide : method");
	}
}







function hyperlinkAsync(link, CALLBACK_OK) {
	var uri = link.href;
	
	ajaxSendRequest('get', uri, '', CALLBACK_OK, function() {});
	
	return false;
}

