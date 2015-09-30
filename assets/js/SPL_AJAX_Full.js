// holds an instance of XMLHttpRequest
var SPLxmlHttp = SPLcreateXmlHttpRequestObject();
var LastArea=1;

// creates an XMLHttpRequest instance
function SPLcreateXmlHttpRequestObject() 
{
  // will store the reference to the XMLHttpRequest object
  var xmlHttp;
  // this should work for all browsers except IE6 and older
  try
  {
    // try to create XMLHttpRequest object
    xmlHttp = new XMLHttpRequest();
  }
  catch(e)
  {
    // assume IE6 or older
    var XmlHttpVersions = new Array('MSXML2.XMLHTTP.6.0',
                                    'MSXML2.XMLHTTP.5.0',
                                    'MSXML2.XMLHTTP.4.0',
                                    'MSXML2.XMLHTTP.3.0',
                                    'MSXML2.XMLHTTP',
                                    'Microsoft.XMLHTTP');
    // try every prog id until one works
    for (var i=0; i<XmlHttpVersions.length && !xmlHttp; i++) 
    {
      try 
 
      { 
        // try to create XMLHttpRequest object
        xmlHttp = new ActiveXObject(XmlHttpVersions[i]);
      } 
      catch (e) {}
    }
  }
  // return the created object or display an error message
  if (!xmlHttp)
    alert("Error creating the XMLHttpRequest object.");
  else 
    return xmlHttp;
}


// function called when the state of the HTTP request changes
function SPLhandleRequestStateChange() 
{
  try
  {
	  // when readyState is 4, we are ready to read the server response
	  if (SPLxmlHttp.readyState == 4) 
	  {
	    // continue only if HTTP status is "OK"
	    if (SPLxmlHttp.status == 200) 
	    {
	      try
	      {
		// do something with the response from the server
		SPLhandleServerResponse();
	      }
	      catch(e)
	      {
		// display error message
		//alert("Error reading the response: " + e.toString());
	      }
	    } 
	    else
	    {
	      // display status message
	      alert("There was a problem retrieving the data:\n" + 
		    SPLxmlHttp.statusText);
	    }
	  }
   }
   catch(e)
   {
   // ignore
   }
}
 
// #################### Get Address to Combo ############################ 

// read a file from the server (area is for multiple address sections on same page)
function SPLGetAddressData(postcode,area)
{
  LastArea = area;
  // only continue if xmlHttp isn't void
  if (SPLxmlHttp)
  {
    // try to connect to the server
    try
    {
      // initiate reading a file from the server
      var purl = jQuery('input[name="plugin_dir1"]').attr('value');
      SPLxmlHttp.open("GET", purl + "?postcode=" + escape(postcode), true);
      SPLxmlHttp.onreadystatechange = SPLhandleRequestStateChange;
      SPLxmlHttp.send(null);
    }
    // display the error in case of failure
    catch (e)
    {
      //alert("Can't connect to server:\n" + e.toString());
      //Suppress error, since can be cause by two calls at once
    }
  }
}

// #################### On Click on Combo ############################ 
 
// handles click on combo
function SPLAddressChange(AddressCombo) {
    LastArea = 1;
       // only continue if xmlHttp isn't void
       if (SPLxmlHttp) {
         // try to connect to the server
         try {
           // initiate reading a file from the server
           var purl2 = jQuery('input[name="plugin_dir2"]').attr('value');
           SPLxmlHttp.open("GET", purl2 + "?AddressID=" + AddressCombo.options[AddressCombo.selectedIndex].value, true);
           SPLxmlHttp.onreadystatechange = SPLhandleRequestStateChange;
           SPLxmlHttp.send(null);
         }
         // display the error in case of failure
         catch (e) {
           //alert("Can't connect to server:\n" + e.toString());
           //Suppress error, since can be cause by two calls at once
         }
  	}
     
     document.getElementById("SPLSearchArea0").innerHTML = "";
} 
 
 
// #################### Handle returned data ############################ 
function SPLhandleServerResponse() {
  //##########################################################
  //### Delete this line on production server              ###
  //### This can be used for debuging to show XML returned ###
  //alert(SPLxmlHttp.responseText);
  //##########################################################

    // Test that XML contains valid Address, test for <line1>
    var Credits="",COMP="", LINE1="",LINE2="",LINE3="",TOWN="",COUNTY="",POSTCODE="",COUNTRY="",MultiLineAddress=""
    var XMLresponse = SPLxmlHttp.responseText;
    console.log(XMLresponse);
    if ( LastArea==0 || LastArea=='0' ) {
        //if contains a </select> then must be combo box
        document.getElementById("SPLSearchArea" + LastArea).innerHTML = XMLresponse;
    } else {
      
        if (XMLresponse.indexOf("<line1>")==-1) {
           // error or no data so show message
      	   document.getElementById("SPLSearchArea" + LastArea).innerHTML = XMLresponse;
        } else {
            
            //contains address information so write to fields
            // read the message from the server
            var xmlResponse = SPLxmlHttp.responseXML;

            // obtain the XML's document element
            xmlRoot = xmlResponse.documentElement;
            
            if (xmlRoot.getElementsByTagName("credits_display_text").item(0).firstChild) {
              Credits = xmlRoot.getElementsByTagName("credits_display_text").item(0).firstChild.data ;
            }

            if (xmlRoot.getElementsByTagName("organisation").item(0).firstChild) {
                COMP = xmlRoot.getElementsByTagName("organisation").item(0).firstChild.data;
            }

            if (xmlRoot.getElementsByTagName("line1").item(0).firstChild) {
                LINE1 = xmlRoot.getElementsByTagName("line1").item(0).firstChild.data;
            }

            if (xmlRoot.getElementsByTagName("line2").item(0).firstChild) {
                LINE2 = xmlRoot.getElementsByTagName("line2").item(0).firstChild.data;
            }

            if (xmlRoot.getElementsByTagName("line3").item(0).firstChild) {
                LINE3 = xmlRoot.getElementsByTagName("line3").item(0).firstChild.data;
            }

            if (xmlRoot.getElementsByTagName("town").item(0).firstChild) {
                TOWN = xmlRoot.getElementsByTagName("town").item(0).firstChild.data;
            }

            if (xmlRoot.getElementsByTagName("county").item(0).firstChild) {
                COUNTY = xmlRoot.getElementsByTagName("county").item(0).firstChild.data;
            }

            if (xmlRoot.getElementsByTagName("postcode").item(0).firstChild) {
                POSTCODE = xmlRoot.getElementsByTagName("postcode").item(0).firstChild.data;
            }

            if (xmlRoot.getElementsByTagName("country").item(0).firstChild) {
                COUNTRY = xmlRoot.getElementsByTagName("country").item(0).firstChild.data;
            }

            if (LastArea==1) {
                jQuery('#company').val(COMP);
                //jQuery('#postcode').val(POSTCODE);
                jQuery('#housenumber').val(LINE1);
                jQuery('#street').val(LINE2);
                jQuery('#street2').val(LINE3);
                jQuery('#city').val(TOWN);
                jQuery('#county').val(COUNTY);
                jQuery('#addresscountry').val(COUNTRY);
            } else {

                jQuery('#company').val(COMP);
                //jQuery('#postcode').val(POSTCODE);
                jQuery('#housenumber').val(LINE1);
                jQuery('#street').val(LINE2);
                jQuery('#street2').val(LINE3);
                jQuery('#city').val(TOWN);
                jQuery('#county').val(COUNTY);
                jQuery('#addresscountry').val(COUNTRY);

            }
      }
  }
}

 
