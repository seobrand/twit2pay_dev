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
		var validation='';
		
		
		if(document.property_locater_form.property.value =='')
		{
			validation ="Please Select a Property Type\n";
		}		

		if(document.property_locater_form.unit_type.value ==''){
			validation +="Please Select a Unit Type\n";
		}

		if(document.property_locater_form.price.value ==''){
			validation +="Please Select Price\n";
		}

		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		
		if(document.property_locater_form.email.value =='*Email')
		{
			validation +="Please Enter Your E-mail Address\n";
		}
		
		else if(reg.test(document.property_locater_form.email.value) == false) {
			validation +="Invalid Email Address\n";
      	
   		}
		
		if(document.property_locater_form.pl_mobile.value =='*Mobile' || document.property_locater_form.pl_mobile.value =='')
		{
			validation +="Please Enter Your Mobile Number\n";
		}
		
		 if (str1 != str2)
		 {
			 validation +="Captcha does not match\n";
		 }
		
		if(validation)
		{
			alert(validation);
			return false;
		}
		else {

			return true;

		}
		

}

/////////////////////////////validation for enquiry center//////////////////

function check2(){

		var validation='';
		var str3 = removeSpaces(document.enquirey_center_form.txtCaptcha12.value);
		var str4 = removeSpaces(document.enquirey_center_form.txtInput12.value);
		var validation='';
		cond = true;

		if(document.enquirey_center_form.name.value =='*Name')
		{
			validation='Please Enter Your Name\n';
		}

		
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;	
		if(document.enquirey_center_form.email.value =='*Email')
		{
			validation +='Please Enter Your Email Address\n';
			
		}
		else if(reg.test(document.enquirey_center_form.email.value) == false) 
		{
      		validation +='Invalid Email Address\n';
		}
		
		if(document.enquirey_center_form.mobile.value =='*Mobile')
		{
			validation +='Please Enter Your Mobile Number\n';
			
		}
		else if(isNaN(document.enquirey_center_form.mobile.value)) 
		{
			validation +='Please Enter only numeric Mobile Number\n';
		}

		if(document.enquirey_center_form.state.value =='*State')
		{
			validation +='Please Enter Your State\n';	
		}

		if(document.enquirey_center_form.city.value =='*City')
		{
			validation +='Please Enter Your City\n';	
		}

		if(document.getElementById('radio_1').checked==false && document.getElementById('radio_2').checked==false && document.getElementById('radio_3').checked==false ){

			validation +='Please Select Type of Enquiry\n';
		}

		if(document.enquirey_center_form.project.value =='')
		{
			validation +='Please Select Project Type\n';
		}

		if(document.enquirey_center_form.comment.value==null || document.enquirey_center_form.comment.value=="" || document.enquirey_center_form.comment.value=="Write Comments")
		{
			validation +='Please Put Your Comment\n';
		}
		
		 if (str3 != str4)
		 {	
		 	validation +='Captcha does not match\n';
		 }
		if(validation)
		{
			alert(validation);
			return false;
		}
		else{

			return true;

		}

}
///////////////// validation for offer partenship form ///////////////////
function check3(){

		var validation='';

		cond = true;
		
		if(document.form4.Location.value =='')
		{
			validation='Please Enter Location\n';
		}		
	
		if(document.form4.area_of_land.value =='')
		{
			validation +='Please Enter Area of Land\n';
		}
		if(document.form4.land_unit.value ==''){
			validation +='Please Select Unit of Measurement\n';
		}
		
		if(document.form4.road_width.value =='')
		{
			validation +='Please Enter Road Width\n';
		}
		
		if(document.form4.land_use.value =='')
		{
			validation +='Please Select Land Use\n';
		}
		if(document.form4.Name.value =='')
		{
			validation +='Please Enter Your Name\n';
		}
		
		
		if(document.form4.Mobile.value =='')
		{
			validation +='Please Enter Your Mobile Number\n';
		}
		else if(isNaN(document.form4.Mobile.value)) 
		{
			validation +='Please Enter only numeric Mobile Number\n';
		}
		
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;	
		
		if(document.form4.Email.value =='')
		{
			validation +='Please Enter Your Email Address\n';
		}
		else if(reg.test(document.form4.Email.value) == false) 
		{
				validation +='Invalid Email Address\n';
		}


		if(validation)
		{
			alert(validation);
			return false;
		}
		else{
			return true;
		}

}