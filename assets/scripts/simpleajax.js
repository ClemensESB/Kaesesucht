function ajaxCall(url) 
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function() {
      document.getElementById("srv").innerHTML = this.responseText;
    };
    //alert(data.get('js'));
    xmlhttp.open("POST", url);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("js=true");
}