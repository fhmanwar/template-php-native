function getUrlVars() {
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}
// var getQueryString = location.search;
// $("#status").append(getQueryString);
// console.log(getQueryString);

// var StringBtoA = 'Hello World!';
// var encodedStringBtoA = btoa(StringBtoA);
// var decodedStringAtoB = atob(encodedStringBtoA);

var string = getUrlVars();
if (string != null) {
    console.log(string);
    var getStatus = atob(string["msg"]);

    if (string["status"] == 'true') {
        $("#status").append('<div class="alert alert-success">'+getStatus+'</div>');        
    } else {
        $("#status").append('<div class="alert alert-warning">'+getStatus+'</div>');
    }
}