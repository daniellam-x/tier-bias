

function getMyTiers() {
    let ajaxRequest; // The variable that makes Ajax possible!
    
    ajaxRequest = new XMLHttpRequest();

    ajaxRequest.onreadystatechange = function() {
        if (ajaxRequest.readyState == 4) {
            let ajaxDisplay = document.getElementById('mytiers');
            ajaxDisplay.innerHTML = ajaxRequest.responseText;
        }
    }

    ajaxRequest.open("GET", "mytierposts.php", true);
    ajaxRequest.send(null);
}

function deleteTiersAjax(id) {
    let ajaxRequest; // The variable that makes Ajax possible!
    
    ajaxRequest = new XMLHttpRequest();

    ajaxRequest.onreadystatechange = function() {
        if (ajaxRequest.readyState == 4) {
            getMyTiers();
        }
    }

    let queryString = "?id=" + id;
    ajaxRequest.open("GET", "deletetier.php" + queryString, true);
    ajaxRequest.send(null);
}


function deleteTier(id) {
    console.log("button with id was clicked", id);
    let pid = id.split("-")[1];
    deleteTiersAjax(pid);
}
getMyTiers();
