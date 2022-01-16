/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function info(t) {
    console.log(t);
    var data_file = "things.json";
    var http_request = new XMLHttpRequest();

    try {
        // Opera 8.0+, Firefox, Chrome, Safari
        http_request = new XMLHttpRequest();

    } catch (e) {
        // Internet Explorer Browsers
        try {
            http_request = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                http_request = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                // Something went wrong
                alert("Your browser broke!");
                return false;
            }
        }
    }
    http_request.onreadystatechange = function () {
        if (http_request.readyState == 4) {
            // Javascript function JSON.parse to parse JSON data
            var jsonObj = JSON.parse(http_request.responseText);

            // jsonObj variable now contains the data structure and can
            // be accessed as jsonObj.name and jsonObj.country.
            var text = "";
            for (var i = 0; i < jsonObj.hobby.length; i++) {
                if (jsonObj.hobby[i].id == t) {
                    text = text + " " +jsonObj.hobby[i].desc;
                    var selection = i;
                }

            }
            console.log(selection);
            document.getElementById("information").innerHTML = text;

        }
    }
    http_request.open("GET", data_file, true);
    http_request.send();
}
