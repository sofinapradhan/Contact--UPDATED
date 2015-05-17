/* Written by lpeters
 * Date: 2015/05/12
 * Usage: Included by register.php.
 */
	
function checkForm()
{
	console.log("Beginning validation...");
	var targForm = document.getElementById("regForm");
	var errorFlag = false;
	clearWarn();
	if (targForm.custfirstname.value == "")
	{
		errorFlag = true;
		document.getElementById("fb-custfirstname").innerHTML = "Error: First Name requires a value.";
	}
	if (targForm.custlastname.value == "")
	{
		errorFlag = true;
		document.getElementById("fb-custlastname").innerHTML = "Error: Last Name requires a value.";
	}
	if (targForm.custaddress.value == "")
	{
		errorFlag = true;
		document.getElementById("fb-custaddress").innerHTML = "Error: Address requires a value.";
	}
	if (targForm.custcity.value == "")
	{
		errorFlag = true;
		document.getElementById("fb-custcity").innerHTML = "Error: City requires a value.";
	}
	if (targForm.custprov.value == "")
	{
		errorFlag = true;
		document.getElementById("fb-custprov").innerHTML = "Error: Province requires a value.";
	}
	if (targForm.custcountry.value == "")
	{
		errorFlag = true;
		document.getElementById("fb-custcountry").innerHTML = "Error: Country requires a value.";
	}
	//var re = new RegExp(/^[A-Z]\d[A-Z]\s?\d[A-Z]\d$/i);
	if (targForm.custpostal.value == "")
	{
		errorFlag = true;
		document.getElementById("fb-custpostal").innerHTML = "Error: Postal Code requires a value.";
	}
	//else if (!re.test(targForm.custpost.value))
	else if (!new RegExp(/^[A-Z]\d[A-Z]\s?\d[A-Z]\d$/i).test(targForm.custpostal.value))
	{
		errorFlag = true;
		document.getElementById("fb-custpostal").innerHTML = "Error: Postal Code must be valid.";
	}
	if (targForm.custhomephone.value == "")
	{
		errorFlag = true;
		document.getElementById("fb-custhomephone").innerHTML = "Error: Home Phone requires a value.";
	}
	if (targForm.custbusphone.value == "")
	{
		errorFlag = true;
		document.getElementById("fb-custbusphone").innerHTML = "Error: Work Phone requires a value.";
	}
	if (targForm.custemail.value == "")
	{
		errorFlag = true;
		document.getElementById("fb-custemail").innerHTML = "Error: E-mail Address requires a value.";
	}
	if (targForm.destination.value == "")
	{
		errorFlag = true;
		document.getElementById("fb-destination").innerHTML = "Error: Destination requires a value.";
	}
	if (targForm.ccname.value == "")
	{
		errorFlag = true;
		document.getElementById("fb-ccname").innerHTML = "Error: Credit Card Provider requires a value.";
	}
	if (targForm.ccnumber.value == "")
	{
		errorFlag = true;
		document.getElementById("fb-ccnumber").innerHTML = "Error: Credit Card Number requires a value.";
	}
	if (targForm.ccexpiry.value == "")
	{
		errorFlag = true;
		document.getElementById("fb-ccexpiry").innerHTML = "Error: Credit Card Expiry requires a value.";
	}
	console.log("errorFlag=" + errorFlag);
	return (errorFlag === false && confirm("Are you sure you want to submit registration?"));
}
function clearWarn()
{
	console.log("Clearing warnings...");
	document.getElementById("fb-custfirstname").innerHTML = "";
	document.getElementById("fb-custlastname").innerHTML = "";
	document.getElementById("fb-custaddress").innerHTML = "";
	document.getElementById("fb-custcity").innerHTML = "";
	document.getElementById("fb-custprov").innerHTML = "";
	document.getElementById("fb-custcountry").innerHTML = "";
	document.getElementById("fb-custpostal").innerHTML = "";
	document.getElementById("fb-custhomephone").innerHTML = "";
	document.getElementById("fb-custbusphone").innerHTML = "";
	document.getElementById("fb-custemail").innerHTML = "";
	document.getElementById("fb-destination").innerHTML = "";
	document.getElementById("fb-ccname").innerHTML = "";
	document.getElementById("fb-ccnumber").innerHTML = "";
	document.getElementById("fb-ccexpiry").innerHTML = "";
}
function showHint(fieldName)
{
	console.log("showHint(" + fieldName + ")");
	//document.getElementById("fb-" + fieldName).innerHTML = formHintList[fieldName];
	document.getElementById("fh-" + fieldName).style.visibility = "visible";
}
function hideHint(fieldName)
{
	console.log("hideHint(" + fieldName + ")");
	document.getElementById("fh-" + fieldName).style.visibility = "hidden";
}
