var endless = {
    // (A) PROPERTIES
    // (A1) SETTINGS
    url: "", // URL to load content from
    // (A2) FLAGS
    page: 1, // current page
    hasMore: true, // has more contents to load?
    proceed: true, // safe to load more? another page currently loading?
    first: true, // is this the first loading cycle?
    // (A3) HTML ELEMENTS
    eLoad: null, // now loading
    eContent: null, // where to load contents into
    eLimit: "END",

    // (B) INIT
    init: function () 
    {
      // (B1) GET HTML ELEMENTS
      endless.eLoad = document.getElementById("page-loading");
      endless.eContent = document.getElementById("page-content");
      // (B2) ATTACH SCROLL LISTENER
      window.addEventListener("scroll", function()
      {
        if ((window.innerHeight + window.pageYOffset) >= document.body.offsetHeight) 
        {
          endless.load();
        }
      });
      // (B3) LOAD CONTENTS
      endless.load();
    },

    // (C) AJAX LOAD CONTENTS
    load: function () { 
      if (endless.proceed && endless.hasMore) 
      {
        // (C1) BLOCK MORE LOADING UNTIL THIS LOAD CYCLE IS DONE
        endless.proceed = false;
        // (C2) SHOW NOW LOADING
        endless.eLoad.style.display = "block";
        // (C3) DATA
        nextPg = endless.page + 1;
        var data = new FormData();
        data.append('p',nextPg);
        data.append('endless','true');
        // (C4) AJAX
        var xhr = new XMLHttpRequest();
        xhr.open("POST", endless.url);

        xhr.onload = function () {
          // NO MORE CONTENTS TO LOAD
          if (this.response.slice(-3) == endless.eLimit)
          {
            endless.eLoad.innerHTML = "";
            endless.hasMore = false;
          }
          // PUT CONTENTS INTO HTML
          else 
          {
            endless.eContent.innerHTML += this.response;
            endless.eLoad.style.display = "none";
            endless.page = nextPg;
            endless.proceed = true;
            // (C5) ON INIT ONLY
            // LOAD MORE IF CONTENTS DID NOT HIT THE END OF WINDOW
            if (endless.first && endless.hasMore) 
            {
              if (document.body.scrollHeight <= window.innerHeight) 
              { 
                endless.load(); 
              }
              else 
              { 
                endless.first = false; 
              }
            } 
            else 
            { 
              endless.first = false; 
            }
          }
        };
        xhr.send(data);
      }
    },
  };

window.addEventListener("DOMContentLoaded", endless.init);