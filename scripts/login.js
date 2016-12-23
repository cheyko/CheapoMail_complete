var auname;
var apword;
var hide;

function checklog (){
	apword= document.forms["logform"]["password"].value;
	auname = document.forms["logform"]["username"].value;
	hide = document.forms["logform"]["hide"].value;
	
	// so ..............
	if( auname == null || auname == ""){
		document.getElementsByTagName('input')[0].className = "change";
	} 
	
	// then .............	
	if( apword == null || apword == "" ){
		document.getElementsByTagName('input')[1].className = "change";	
	}
	
	// thus .................
	if (( auname == null || auname == "") || ( apword == null || apword == "" )){
		return false;
	}
	
	// or ..................
	if (( auname != null || auname != "") && ( apword != null || apword != "" )){
		return true;
	}
		
}