function init() {
	tinyMCEPopup.resizeToInnerSize();
}

function getCheckedValue(radioObj) {
	if(!radioObj)
		return "";
	var radioLength = radioObj.length;
	if(radioLength == undefined)
		if(radioObj.checked)
			return radioObj.value;
		else
			return "";
	for(var i = 0; i < radioLength; i++) {
		if(radioObj[i].checked) {
			return radioObj[i].value;
		}
	}
	return "";
}

function tzshortcodesubmit() {
	
	var tagtext;
	
	var tz_shortcode = document.getElementById('tzshortcode_panel');
	
	// who is active ?
	if (tz_shortcode.className.indexOf('current') != -1) {
		var tz_shortcodeid = document.getElementById('tzshortcode_tag').value;
		switch(tz_shortcodeid)
{
case 0:
 	tinyMCEPopup.close();
  break;

case "button-yellow":
	tagtext = "["+ tz_shortcodeid + "  url=\"#\" target=\"_self\" position=\"left\"] Button text [/" + tz_shortcodeid + "]";
break;

case "button-blue":
	tagtext = "["+ tz_shortcodeid + "  url=\"#\" target=\"_self\" position=\"left\"] Button text [/" + tz_shortcodeid + "]";
break;

case "button-green":
	tagtext = "["+ tz_shortcodeid + "  url=\"#\" target=\"_self\" position=\"left\"] Button text [/" + tz_shortcodeid + "]";
break;

case "button-red":
	tagtext = "["+ tz_shortcodeid + "  url=\"#\" target=\"_self\" position=\"left\"] Button text [/" + tz_shortcodeid + "]";
break;

case "button-purple":
	tagtext = "["+ tz_shortcodeid + "  url=\"#\" target=\"_self\" position=\"left\"] Button text [/" + tz_shortcodeid + "]";
break;

case "button-teal":
	tagtext = "["+ tz_shortcodeid + "  url=\"#\" target=\"_self\" position=\"left\"] Button text [/" + tz_shortcodeid + "]";
break;

case "button-white":
	tagtext = "["+ tz_shortcodeid + "  url=\"#\" target=\"_self\" position=\"left\"] Button text [/" + tz_shortcodeid + "]";
break;

case "button-dark":
	tagtext = "["+ tz_shortcodeid + "  url=\"#\" target=\"_self\" position=\"left\"] Button text [/" + tz_shortcodeid + "]";
break;

case "alert-white":
	tagtext = "["+ tz_shortcodeid + "] Alert text [/" + tz_shortcodeid + "]";
break;

case "alert-red":
	tagtext = "["+ tz_shortcodeid + "] Alert text [/" + tz_shortcodeid + "]";
break;

case "alert-orange":
	tagtext = "["+ tz_shortcodeid + "] Alert text [/" + tz_shortcodeid + "]";
break;

case "alert-green":
	tagtext = "["+ tz_shortcodeid + "] Alert text [/" + tz_shortcodeid + "]";
break;

case "callout":
	tagtext = "["+ tz_shortcodeid + " title=\"Title goes here\"] Content goes here, html allowed. [/" + tz_shortcodeid + "]";
break;

case "toggle":
	tagtext = "["+ tz_shortcodeid + " title=\"Title goes here\"] Content goes here, html allowed. [/" + tz_shortcodeid + "]";
break;

case "tabs":
	tagtext="["+tz_shortcodeid + " tab1=\"Tab 1 Title\" tab2=\"Tab 2 Title\" tab3=\"Tab 3 Title\"] [tab]Insert tab 1 content here[/tab] [tab]Insert tab 2 content here[/tab] [tab]Insert tab 3 content here[/tab] [/" + tz_shortcodeid + "]";
break;

case "tour":
	tagtext="["+tz_shortcodeid + " tab1=\"Tab 1 Title\" tab2=\"Tab 2 Title\" tab3=\"Tab 3 Title\"] [tourtab]Insert tab 1 content here[/tourtab] [tourtab]Insert tab 2 content here[/tourtab] [tourtab]Insert tab 3 content here[/tourtab] [/" + tz_shortcodeid + "]";
break;

case "small table":
	tagtext='<div class="callout_box table small"><div class="inner"><table><tr class="title"><td>Standard</td><td>Premium</td><td>Professional</td></tr><tr class="even"><td>$40 per month</td><td>$60 per month</td><td>$80 per month</td></tr><tr class="odd"><td><p><strong>Perfect for those getting started with our app.</strong></p><ul><li>15 Projects</li><li>5 GB Storage</li><li>Unlimited Users</li><li>No Time tracking</li><li>Enhanced Security</li></ul></td><td><p><strong>Perfect for those getting started with our app.</strong></p><ul><li>15 Projects</li><li>5 GB Storage</li><li>Unlimited Users</li><li>No Time tracking</li><li>Enhanced Security</li></ul></td><td><p><strong>Perfect for those getting started with our app.</strong></p><ul><li>15 Projects</li><li>5 GB Storage</li><li>Unlimited Users</li><li>No Time tracking</li><li>Enhanced Security</li></ul></td></tr><tr class="even"><td>[button-yellow url="#" target="_self"  position="left"] Sign Up! [/button-yellow]</td><td>[button-yellow url="#" target="_self"  position="left"] Sign Up! [/button-yellow]</td><td>[button-yellow url="#" target="_self"  position="left"] Sign Up! [/button-yellow]</td></tr></table></div></div>';
break;

case "large table":
	tagtext='<div class="callout_box table large"><div class="inner"><table><tr class="title"><td>Standard</td><td>Premium</td><td class="big">Professional</td><td>Plus</td><td>Maximum</td></tr><tr class="even"><td>$40 per month</td><td>$60 per month</td><td>$80 per month</td><td>$100 per month</td><td>$120 per month</td></tr><tr class="odd"><td><p><strong>Perfect for those getting started with our app.</strong></p><ul><li>15 Projects</li><li>5 GB Storage</li><li>Unlimited Users</li><li>No Time tracking</li><li>Enhanced Security</li></ul></td><td><p><strong>Perfect for those getting started with our app.</strong></p><ul><li>15 Projects</li><li>5 GB Storage</li><li>Unlimited Users</li><li>No Time tracking</li><li>Enhanced Security</li></ul></td><td><p><strong>Perfect for those getting started with our app.</strong></p><ul><li>15 Projects</li><li>5 GB Storage</li><li>Unlimited Users</li><li>No Time tracking</li><li>Enhanced Security</li></ul></td><td><p><strong>Perfect for those getting started with our app.</strong></p><ul><li>15 Projects</li><li>5 GB Storage</li><li>Unlimited Users</li><li>No Time tracking</li><li>Enhanced Security</li></ul></td><td><p><strong>Perfect for those getting started with our app.</strong></p><ul><li>15 Projects</li><li>5 GB Storage</li><li>Unlimited Users</li><li>No Time tracking</li><li>Enhanced Security</li></ul></td></tr><tr class="even"><td>[button-yellow url="#" target="_self"  position="left"] Sign Up! [/button-yellow]</td><td>[button-yellow url="#" target="_self"  position="left"] Sign Up! [/button-yellow]</td><td>[button-yellow url="#" target="_self"  position="left"] Sign Up! [/button-yellow]</td><td>[button-yellow url="#" target="_self"  position="left"] Sign Up! [/button-yellow]</td><td>[button-yellow url="#" target="_self"  position="left"] Sign Up! [/button-yellow]</td></tr></table></div><!--inner--></div><!--callout_box table-->';
break;

default:
tagtext="["+tz_shortcodeid + "] Insert you content here [/" + tz_shortcodeid + "]";
}
}

if(window.tinyMCE) {
		//TODO: For QTranslate we should use here 'qtrans_textarea_content' instead 'content'
		window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, tagtext);
		//Peforms a clean up of the current editor HTML. 
		//tinyMCEPopup.editor.execCommand('mceCleanup');
		//Repaints the editor. Sometimes the browser has graphic glitches. 
		tinyMCEPopup.editor.execCommand('mceRepaint');
		tinyMCEPopup.close();
	}
	return;
}