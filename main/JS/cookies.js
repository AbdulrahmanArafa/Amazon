

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        usermame = c.substring(name.length, c.length);
        x=document.getElementById('name_user') ;
        x.style.display="none" ;
        document.getElementById('link_pr').innerHTML='Welcome,'+usermame;
        document.getElementById('link_pr').setAttribute('href', 'http://localhost/test/main/Pages/templetePage.html')
        //shoud re-direct it to profile 
      }
    }
    return "";
  }
  getCookie('userName') ;