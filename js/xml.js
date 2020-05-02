//Permet de charger un document XML
var xhttp = new XMLHttpRequest();

xhttp.onreadystatechange = function()
{
    if(this.readyState == 4 && this.status == 200)
    {
        showResult(xhttp.responseXML);
    }
};

//Charge le document XML souhaité
xhttp.open("GET", "books.xml", true);
xhttp.send();

function showResult(xml)
{
    var txt = "";
    path = /*indiquer le XPath ici*/"";

    if(xml.evaluate)
    {
        var nodes = xml.evaluate(path, xml, null, XPathResult.ANY_TYPE, null);
        var result = nodes.iterateNext();

        while (result)
        {
            txt += result.childNodes[0].nodeValue + "<br>";
            result = nodes.iterateNext();
        }
        // Code pour Internet Explorer
    }
    else
        if(window.ActiveXObject || xhttp.responseType == "msxml-document")
        {
            xml.setProperty("SelectionLanguage", "XPath");
            nodes = xml.selectNodes(path);
            for (i = 0; i < nodes.length; i++)
            {
                txt += nodes[i].childNodes[0].nodeValue + "<br>";
            }
        }

    document.getElementById("demo").innerHTML = txt;
}