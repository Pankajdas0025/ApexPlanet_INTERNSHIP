
// to open login up box ...........................................................................................
document.getElementById("lbtn").addEventListener("click",openSignIn);
function openSignIn()
{

    var a=document.querySelector(".box2");
    var b=document.querySelector(".box");
    a.style.display="block";
  

}

document.getElementById("Sibtn").addEventListener("click",openSignUp);
// to open sign up box ...........................................................................................
function openSignUp()
{

    var a=document.querySelector(".box2");
    var b=document.querySelector(".box");
    a.style.display="none";
  

}

//client side form validation .........................................................................................//

function Formsignup()
{
    
    var Name=document.querySelector("#uName").value;
    
    var Email=document.querySelector("#uEmail").value;
    
    var Password=document.querySelector("#uPass").value;

    if(Name=="" && Email=="" && Password=="")
    {
        alert("All field is required");
    }
    else
    {
        if(Name.match(/[0-9]/))
            {
	         alert("Numbers are not allowed to Write Name");
             return false;

            }

              else if(Password.length<6)
            {
             
	         alert("Password should be greater than 6 character !");
             return false;
            
            }





    }
}