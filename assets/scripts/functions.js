

  document.getElementById('submit').addEventListener('click', function(){
      event.preventDefault();
      event.stopPropagation();

      update();
    });


  function send(method, url, data, callback)
  {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
      var DONE = this.DONE || 4;
      if(xhr.readyState === DONE)
      {
        var jsonDATA = null;
        var error = null;

        if(this.status > 0)
        {
          try
          {
            if(xhr.responseText.legth > 0)
            {
              jsonDATA = JSON.parse(xhr.responseText)
            }
          }
          catch(e)
          {
            error = 'Invalide JSON response: ' + xhr.responseText;
          }

          if(this.status >= 300)
          {
            if(jsonDATA && jsonDATA.message)
            {
              error = jsonDATA.message;
            }
            else
            {
              error = 'There is an error but no message';
            }
          }
        }
        else
        {
          error = 'cancelled';
        }
        callback(error,jsonDATA,this.status);
      }
    };
    if(method.toLowerCase() === 'get' && data != null)
    {
      if(url.indexOf('?') > 0)
      {
        url += '&';
      }
      else
      {
        url += '?';
      }
      for(var key in data)
      {
        url += key + '=' + encodeURIComponent(data[key]) + '&';
      }
      url = url.substr(0,url.length - 1);
      data = null;
    }
    xhr.open(method,url,true);
    xhr.setRequestHeader('X-Requested-Width','XMLHttpRequest');
    xhr.setRequestHeader('Content-Type','application/json');
    xhr.setRequestHeader('Accept','application/json');

    //xhr.onload = function(){
    //  document.getElementById("test").innerHTML = this.response;
    //};

    console.log('Start request',method,url,data);
    if(data === null)
    {
      xhr.send();
    }
    else
    {
      xhr.send(JSON.stringify(data));
    }
    return xhr;
  };

  function update()
  {
    //var elements = document.getElementsByClassName('inputtext');
    var email   = document.getElementById('email');
    var city    = document.getElementById('city');
    var street  = document.getElementById('street');
    var strNo   = document.getElementById('strNo');
    var zipCode = document.getElementById('zipCode');
    var site    = document.getElementById('submit');


    send('POST', window.location.href + '&json=true',{
      submit : true,
      email : email.value,
      city : city.value,
      street : street.value,
      strNo : strNo.value,
      zipCode : zipCode.value,
    }, function(error,data,status){
      console.log(data);
    });
  }

function toggle(id)
{
  var e = document.getElementById(id);
  if (e.style.display == "none")
  {
     e.style.display = "";
  } else {
     e.style.display = "none";
  }
}
