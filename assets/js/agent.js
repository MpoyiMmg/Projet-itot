document.addEventListener('DOMContentLoaded', function(){
    
    var element=document.querySelector('#save_entry');
    element.addEventListener('click', function(){
        var titre=document.querySelector('#entry_name').value;
        var heure=document.querySelector('#enter_hour').value;
        var fin=document.querySelector('#enter_hourfin').value;
        var note=document.querySelector('#entry_note').value;
        var nbrdv=document.querySelector('#enter_rdv').value;
        var day=document.querySelector('#entryDay').innerText;
        var format=day.split(" ");
        format.reverse();
        format = format.join('-');
        
        var xhr = getXMLHttpRequest();
        fd = new FormData();
        fd.append('titre', titre);
        fd.append('deb', heure+":00:00");
        fd.append('fin',fin+":00:00");
        fd.append('note', note);
        fd.append('format', format);
        fd.append('nbrdv', nbrdv);
        console.log(format);
        
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
                console.log(xhr.responseText);            
            }
        };
        xhr.open("POST", base_url+"Welcome/enregistrer" , true);
        xhr.send(fd);
    });
});
function getXMLHttpRequest() {
    var xhr = null;
    if (window.XMLHttpRequest || window.ActiveXObject) {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
        } else {
            xhr = new XMLHttpRequest();
        }
    } else {
        alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
        return null;
    }
    return xhr;
}



