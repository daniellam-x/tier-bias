function likeTiersAjax(id) {
    let ajaxRequest; // The variable that makes Ajax possible!
    
    ajaxRequest = new XMLHttpRequest();

    ajaxRequest.onreadystatechange = function() {
        if (ajaxRequest.readyState == 4) {
            sort();
        }
    }

    let queryString = "?id=" + id;
    ajaxRequest.open("GET", "liketier.php" + queryString, true);
    ajaxRequest.send(null);
}


function likeTier(id) {
    console.log("like button with id was clicked", id);
    let pid = id.split("-")[1];
    likeTiersAjax(pid);
}



const likeSort = document.getElementById('likeSort');
const newSort = document.getElementById('newSort');
const voteBtns = document.querySelector('.voteBtn');

let sorted;
let voted;
let rank;
let tier_id

likeSort.addEventListener('click', () => {
    sorted = true
})

newSort.addEventListener('click', () => {
    sorted = false
});

// voteBtns.forEach(voteBtn => {
//     voteBtn.addEventListener('click', (e) => {
//         if (e.target.innerHTML.innerHTML == 'expand_less') {
//             let tier = e.target.parentNode;
//             // change vote number
//             tier.childNodes[2].innerHTML += 1;
//             // save tier rank
//             rank = tier.childNodes[0].innerHTML;
//             // save vote
//             voted = 'up';
//             // save post_id
//             tier_id = parseInt(tier.parentNode.parentNode.dataset.tier_id);

//             vote();
//         } else {
//             e.target.parentNode.childNodes[5].innerHTML -= 1;
//             voted = 'down';
//             vote();
//         }
//     })
// });

function sort() {
    let ajaxRequest; // The variable that makes Ajax possible!
    
    ajaxRequest = new XMLHttpRequest();
    
    ajaxRequest.onreadystatechange = function() {
        if (ajaxRequest.readyState == 4) {
            let ajaxDisplay = document.getElementById('ajaxDiv');
            ajaxDisplay.innerHTML = ajaxRequest.responseText;
        }
    }

    let sort = sorted ? 'likes' : 'new';
    let queryString = "?sort=" + sort;
    
    ajaxRequest.open("GET", "query.php" + queryString, true);
    ajaxRequest.send(null);
}

sort();

function vote() {
    let ajaxRequest; // The variable that makes Ajax possible!
    
    ajaxRequest = new XMLHttpRequest();
    
    ajaxRequest.onreadystatechange = function() {
        if (ajaxRequest.readyState == 4) {
            let ajaxDisplay = document.getElementById('ajaxDiv');
            ajaxDisplay.innerHTML = ajaxRequest.responseText;
        }
    }

    let sort = sorted ? 'likes' : 'new';
    let queryString = "?sort=" + sort;
    
    ajaxRequest.open("GET", "query.php" + queryString, true);
    ajaxRequest.send(null);
}


