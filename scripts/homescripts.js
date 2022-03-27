const rankingOrder = 'SABCDEFGHIJKLMNOPQRTUVWXYZ';

function getDummyPizzaPostData() {
    return  {
        "post-title": "Best topping on pizza?",
        "post-author": "Jess Trejo",
        "post-date": "Jan 1 2022",
        "post-tier-data": [
            {
                "option-name": "Pepperoni",
                "downvotes": 1,
                "upvotes": 100
            },
            {
                "option-name": "Ham",
                "downvotes": 10,
                "upvotes": 30
            },
            {
                "option-name": "Olives",
                "downvotes": 10,
                "upvotes": 20
            },
            {
                "option-name": "Pineapple",
                "downvotes": 100,
                "upvotes": 1
            }
        ]
    };
}

function getData() {
    return [
       getDummyPizzaPostData(),
    ];
}

function getHtmlFromPostTierData(post) {
    console.log(post)
    if(post == null ||  post["post-tier-data"] == null ||  post["post-tier-data"].length == 0) {
        return "";
    } 

    let tier_data =  post["post-tier-data"];
    let tier_html = "";
    tier_html += '<div class="tierpost-data">';
    let count = 0;
    tier_data.forEach(function(tierOption) {
        tier_html += '<div class="tierpost-data-option">';
        tier_html += `<div class="tier-ranking-box tier-ranking-box-${rankingOrder[count]}">` + rankingOrder[count] + '</div>';
        tier_html += '<div>'+tierOption["option-name"]+'</div>';
        tier_html += '<button class="tier-ranking-upvote">' + "+" + '</button>';
        tier_html += '<button class="tier-ranking-downvote">' + "-" + '</button>';

        tier_html += "</div>"
        count += 1;
    })

    tier_html += "</div>"
    return tier_html;
}


function addPostToFeed(post) {
    let post_html = "";
    post_html += '<div class="tierpost">';
    post_html += "<h2>"+post["post-title"]+"</h2>"
    post_html += "<h3> Posted by <em>"+post["post-author"]+"</em></h3>"

    post_html += getHtmlFromPostTierData(post);
    post_html += "</div>"

    $("#post-feed").append(post_html);
}

function loadFeed() {
    let posts = getData();
    posts.forEach(addPostToFeed);
}



loadFeed();