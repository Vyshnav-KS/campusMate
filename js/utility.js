function include(file) { 

var script = document.createElement('script'); 
script.src = file; 
script.type = 'text/javascript'; 
script.defer = true; 

document.getElementsByTagName('head').item(0).appendChild(script); 

} 

function getRootUrl() 
{
    document.getElementById('rootresult').innerHTML += 
    window.location.origin 
        ? window.location.origin + '/'
        : window.location.protocol + '/' + window.location.host + '/';
    
    getBaseUrl();
}

/* Include Jquery */
include('https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'); 
