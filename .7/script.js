function openPopup(h,w,loc,title,child) {
clearTimeout(fpTimer);
document.getElementById('popup_container').style.visibility='visible';
document.getElementById('popupWindow').style.visibility='visible';
document.getElementById('popupWindowTitle').style.visibility='visible';
document.getElementById('popupWindowTitle').style.width=(w)-6+"px";
document.getElementById('popupWindow').style.height=h+"px";
document.getElementById('popupWindow').style.width=w+"px";
document.getElementById('popupWindow').style.marginLeft=(document.getElementById('popup_container').parentNode.clientWidth-w)/2+"px";
document.getElementById('popupWindow').style.marginTop=(document.getElementById('popup_container').parentNode.clientHeight-h)/3+"px";
document.getElementById('popupWindowTitle').style.marginLeft=((document.getElementById('popup_container').parentNode.clientWidth-w)/2)+"px";
document.getElementById('popupWindowTitle').style.marginTop=((document.getElementById('popup_container').parentNode.clientHeight-h)/3)-21+"px";
document.getElementById('popupWindowTitleText').innerHTML='Fines & Penalties - '+title;
document.getElementById('popupWindow').innerHTML = '<iframe style="width:'+w+'px;height:'+h+'px;" frameborder="0" scrolling="no" src="' + loc + '" />';
}
function popupCenter() {
document.getElementById("demo").innerHTML = 'Hello World';
} 
function myfunction() {
window.open('/signUp.php', 'Sign Up', 'width=800, height=377'); 
}
function signup(x) {
    x.style.background = "yellow";
}
function checkLength(){
    var textbox = document.getElementById("username1");
    if(username1.value.length <= 10 && username1.value.length >= 5){
        alert("success");
    }
    else{
        alert("make sure the input is between 5-10 characters long")
    }
}



  function checkPassword(str)
  {
    var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
    return re.test(str);
  }

  function checkCreateForm(form)
  {
    if(form.firstName.value == "") {
      alert("Error: First name cannot be blank!");
      form.firstName.focus();
      return false;
    }
    if(form.lastName.value == "") {
      alert("Error: Last name cannot be blank!");
      form.lastName.focus();
      return false;
    }
    if(form.username1.value == "") {
      alert("Error: Username cannot be blank!");
      form.username1.focus();
      return false;
    }
    re = /^\w+$/;
    if(!re.test(form.username1.value)) {
      alert("Error: Username must contain only letters, numbers and underscores!");
      form.username1.focus();
      return false;
    }
    if(form.password1.value != "" && form.password1.value == form.confirmpassword.value) {
      if(!checkPassword(form.password1.value)) {
        alert("The password you have entered is not valid!/n" 
                  + "Must have at least one number, one lowercase and one uppercase letter/n"
                   + "Must be at least six characters that are letters, numbers or the underscore");
        form.password1.focus();
        return false;
      }
    } else {
      alert("Error: Please check that you've entered and confirmed your password!");
      form.password1.focus();
      return false;
    }
    return true;
  }


