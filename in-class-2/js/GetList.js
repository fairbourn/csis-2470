function myFunction(List) {
    var objects = "<header><h1>List of Cool Books</h1></header>";

    var len = List.length;

    for(i=0;i < len; i++) {
      //shows title/author
        objects += '<br><br><b>' + '<br>' + List[i]["Title"] + ', ' + '</b>' + ' ' + List[i].Author + ' ';

        if (List[i].Forsale == true)
         {
           //if true displays the price
            objects += 'Price: ' + List[i].Price + ', ' + ' ';
        }

        //displays awards (if any)
        if (List[i].Awards instanceof Array) {
            objects += 'Awards: ' ;
            var awardcount = List[i].Awards.length

            var x = 0 ;

            while (x < awardcount) {
                objects += '' + List[i].Awards[x] + '<br> ';
                x++
            }
        }
    }
    document.getElementById("ListOfBooks").innerHTML = objects;
}
