function check()
{
    if(check_usr()&&check_pwd()&&check_same())
        return true;
    else
        return false;
    //Return false will not execute submit
}
function check_usr()
{
    var x;
    x=document.forms["info"]["username"].value;
    var pat=/^[a-zA-Z]\w{5,15}$/;  //Matching regular expressions
    if(x.search(pat)==-1)
    {
        var txt=document.getElementById("usr").innerHTML;
        txt=txt.replace(txt,"Username format is wrong!");
        document.getElementById("usr").innerHTML=txt;
        return false;
    }
    else
    {
        var txt=document.getElementById("usr").innerHTML;
        txt=txt.replace(txt," ");
        document.getElementById("usr").innerHTML=txt;
        return true;
    }
}
function check_pwd()
{
    var x;
    x=document.forms["info"]["password"].value;
    var pat=/^\w{6,16}$/;
    if(x.search(pat)==-1)
    {
        var txt=document.getElementById("pwd").innerHTML;
        txt=txt.replace(txt,"The password format is incorrect!");
        document.getElementById("pwd").innerHTML=txt;
        return false;
    }
    else
    {
        var txt=document.getElementById("pwd").innerHTML;
        var tmp=txt.replace(txt," ");
        document.getElementById("pwd").innerHTML=tmp;
        return true;
    }
}
function check_same()
{
    var x=document.forms["info"]["password"].value;
    var y=document.forms["info"]["password_again"].value;
    //Get input information from the table
    if(x!=y)
    {
        var txt=document.getElementById("not_same").innerHTML;
        txt=txt.replace(txt,"The two inputs are inconsistent!");
        document.getElementById("not_same").innerHTML=txt;
        return false;
    }
    else
    {
        var txt=document.getElementById("not_same").innerHTML;
        txt=txt.replace(txt," ");
        document.getElementById("not_same").innerHTML=txt;
        return true;
    }
}
