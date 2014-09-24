///////////validation for property form/////////////
//Created / Generates the captcha function  
function DrawCaptchaEn()
    {
        var e = Math.ceil(Math.random() * 10)+ '';
        var f = Math.ceil(Math.random() * 10)+ '';       
        var g = Math.ceil(Math.random() * 10)+ '';  
        var h = Math.ceil(Math.random() * 10)+ '';  
        var i = Math.ceil(Math.random() * 10)+ '';  
        var j = Math.ceil(Math.random() * 10)+ '';  
        var k = Math.ceil(Math.random() * 10)+ '';  
        var code12 = e + ' ' + f + ' ' + ' ' + g + ' ' + h + ' ' + i + ' '+ j + ' ' + k;
        document.getElementById("txtCaptcha12").value = code12
 }
 
  function removeSpacesEn(string)
{
        return string.split(' ').join('');
} 
 
function DrawCaptcha()
    {
        var a = Math.ceil(Math.random() * 10)+ '';
        var b = Math.ceil(Math.random() * 10)+ '';       
        var c = Math.ceil(Math.random() * 10)+ '';  
        var d = Math.ceil(Math.random() * 10)+ '';  
        var e = Math.ceil(Math.random() * 10)+ '';  
        var f = Math.ceil(Math.random() * 10)+ '';  
        var g = Math.ceil(Math.random() * 10)+ '';  
        var code = a + ' ' + b + ' ' + ' ' + c + ' ' + d + ' ' + e + ' '+ f + ' ' + g;
        document.getElementById("txtCaptcha").value = code
    }

    // Validate the Entered input aganist the generated security code function   
/*    function ValidCaptcha(){
        var str1 = removeSpaces(document.getElementById('txtCaptcha').value);
        var str2 = removeSpaces(document.getElementById('txtInput').value);
        if (str1 == str2) return true;        
        return false;
        
    }
*/
    // Remove the spaces from the entered and generated code
 function removeSpaces(string)
{
        return string.split(' ').join('');
} 
function check1(){
	
		var str1 = removeSpaces(document.property_locater_form.txtCaptcha.value);
        var str2 = removeSpaces(document.property_locater_form.txtInput.value);
		//alert(str1);alert(str2); return false;
		cond = true;

		

		if(document.property_locater_form.property.value ==''){

			alert("Please Select a Property Type!");

			return false;

		}		

		if(document.property_locater_form.unit_type.value ==''){

			alert("Please Select a Unit Type!");

			return false;

		}

		if(document.property_locater_form.price.value ==''){

			alert("Please Select Price!");

			return false;

		}

		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		
		if(document.property_locater_form.email.value =='*Email'){

			alert("Please Enter Your Email Address");

			return false;

		}
		
		else if(reg.test(document.property_locater_form.email.value) == false) {
			
      		alert('Invalid Email Address');
			
      		return false;
   		}
		
		if(document.property_locater_form.pl_mobile.value =='*Mobile' || document.property_locater_form.pl_mobile.value ==''){

			alert("Please Enter Your Mobile Number");

			return false;

		}
		
		 if (str1 != str2)
		 {
			 alert('Captcha does not match');
			 return false;
		 }
		
	
		else {

			return true;

		}
		

}

/////////////////////////////validation for enquiry center//////////////////

function check2(){

		var str3 = removeSpaces(document.enquirey_center_form.txtCaptcha12.value);
       var str4 = removeSpaces(document.enquirey_center_form.txtInput12.value);

		cond = true;

		if(document.enquirey_center_form.name.value =='*Name'){

			alert("Please Enter Your Name");

			return false;

		}

		

		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;	
		if(document.enquirey_center_form.email.value =='*Email'){

			alert("Please Enter Your Email Address");

			return false;

		}

		
		else if(reg.test(document.enquirey_center_form.email.value) == false) {
      		alert('Invalid Email Address');
      		return false;
   		}
		
		if(document.enquirey_center_form.mobile.value =='*Mobile'){

			alert("Please Enter Your Mobile Number");

			return false;

		}
		else if(isNaN(document.enquirey_center_form.mobile.value)) {
		
			alert('Please Enter only numeric Mobile Number');
			
			return false;
		}

		if(document.enquirey_center_form.state.value =='*State'){

			alert("Please Enter Your State");

			return false;

		}

		

		if(document.enquirey_center_form.city.value =='*City'){

			alert("Please Enter Your City");

			return false;

		}

		//alert(document.forms.enquirey_center_form.elements.radio_1.value);

	

		if(document.getElementById('radio_1').checked==false && document.getElementById('radio_2').checked==false && document.getElementById('radio_3').checked==false ){

			alert("Please Select Type of Enquiry");

			return false;
		}

		if(document.enquirey_center_form.project.value ==''){

			alert("Please Select Project Type");

			return false;

		}

		if(document.enquirey_center_form.comment.value==null || document.enquirey_center_form.comment.value=="" || document.enquirey_center_form.comment.value=="Write Comments")

		{

			alert("Please Put Your Comment");

			return false;

		}
		
		 if (str3 != str4)
		 {
			 alert('Captcha does not match');
			 return false;
		 }
		

		else{

			return true;

		}

}
///////////////// validation for offer partenship form ///////////////////
function check3(){



		cond = true;
		
		if(document.form4.Location.value ==''){

			alert("Please Enter Location");

			return false;

		}		
		if(document.form4.area_of_land.value ==''){

			alert("Please Enter Area of Land");

			return false;
		
		}
		if(document.form4.land_unit.value ==''){

			alert("Please Select Unit of Measurement");

			return false;

		}		
		if(document.form4.road_width.value ==''){

			alert("Please Enter Road Width");

			return false;

		}
		if(document.form4.land_use.value ==''){

			alert("Please Select Land Use");

			return false;

		}
		if(document.form4.Name.value ==''){

			alert("Please Enter Your Name");

			return false;

		}
		
		
		if(document.form4.Mobile.value ==''){

			alert("Please Enter Your Mobile Number");

			return false;

		}
		else if(isNaN(document.form4.Mobile.value)) {
		
			alert('Please Enter only numeric Mobile Number');
			
			return false;
		}
		
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;	
		if(document.form4.Email.value ==''){

			alert("Please Enter Your Email Address");

			return false;

		}

		
		else if(reg.test(document.form4.Email.value) == false) {

			alert('Invalid Email Address');
      		
			return false;
   		}

/*		if(document.form4.City.value ==''){

			alert("Please Enter Your City");

			return false;

		}*/

		else{
			return true;
		}

}