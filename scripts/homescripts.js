
const likeSort = document.getElementById('likeSort');
const newSort = document.getElementById('newSort');

let sorted;

likeSort.addEventListener('click', () => {
    sorted = true
})

newSort.addEventListener('click', () => {
    sorted = false
});

function sort() {
    let ajaxRequest; // The variable that makes Ajax possible!
    
    ajaxRequest = new XMLHttpRequest();
    
    ajaxRequest.onreadystatechange = function() {
        if (ajaxRequest.readyState == 4) {
            let ajaxDisplay = document.getElementById('tierFeed');
            ajaxDisplay.innerHTML = ajaxRequest.responseText;
        }
    }

    let sort = sorted ? 'likes' : 'new';
    let queryString = "?sort=" + sort;
    
    ajaxRequest.open("GET", "query.php" + queryString, true);
    ajaxRequest.send(null);
}

sort();
