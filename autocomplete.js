function dopln(hodnota) {
    if (hodnota != "") {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
                
  
                var vysledok = xhr.responseText;
                var miesto = document.getElementById("vysledky");
                if (vysledok !== "") {
                    var vypis = "";
                    var objekt = JSON.parse(vysledok);
                    objekt.forEach(function(kluc, polozka, pole) {
                        vypis += ("<div onclick='document.getElementById(\"autor\").value = this.innerHTML; this.parentNode.className = \"\"'>" + kluc + "</div>");
                    })
                    miesto.innerHTML = vypis;
                    miesto.className = "odkryt";
                }
                else {
                    miesto.className = "";
                }
            }
        }
        xhr.open("POST", "autocomplete.php");
        xhr.send(hodnota);
    }
    
    else {
        document.getElementById("vysledky").className = "";
    }
}


