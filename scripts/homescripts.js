// list of ranking characters
// S is first then the rest of the alphabet
const rankingOrder = 'SABCDEFGHIJKLMNOPQRTUVWXYZ';

// Dummy Post Object
function getDummySubPostData() {
    return  {
        "post-title": "Best topping on Subway Sandwich?",
        "post-author": "John Doe",
        "post-date": "Jan 1 2022",
        "post-tier-data": [
            {
                "option-name": "Black Forest Ham",
                "downvotes": 1,
                "upvotes": 100
            },
            {
                "option-name": "Turkey",
                "downvotes": 10,
                "upvotes": 30
            },
            {
                "option-name": "Meatball",
                "downvotes": 10,
                "upvotes": 20
            },
            {
                "option-name": "Tuna",
                "downvotes": 100,
                "upvotes": 1
            }
        ]
    };
}


// Dummy Post Object
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

// return list of post objects for feed
// when we add sql and php code, it will get this data from the database
// instead of returning a hardcoded dummy data
function getData() {
    return [
       getDummyPizzaPostData(),
       getDummySubPostData(),
    ];
}

// creates a post-tier-data div from post data
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

// generates HTML for a post and append it to the #post-feed div
function addPostToFeed(post) {
    if(post == null) {
        return;
    }


    let post_html = "";
    post_html += '<div class="tierpost">';
    post_html += "<h2>"+post["post-title"]+"</h2>"
    post_html += "<h3> Posted by <em>"+post["post-author"]+"</em></h3>"

    post_html += getHtmlFromPostTierData(post);
    post_html += "</div>"

    $("#post-feed").append(post_html);
}

// grabs the posts and populates the feed by adding html for each post
function loadFeed() {
    let posts = getData();
    posts.forEach(addPostToFeed);
}






const currentPosts = [];

// NOTE: you cannot have the conflicting variable names and functions names
// commenting out variables below to keep code working
// const controversialSort = [];
// const newestSort = [];
const newPosts = [];

function controversialSort(){
    // Sort current posts by total of upvotes and downvotes
    
}

function newestSort(){
    // Sort current posts by newest added

}

function addPost(){
    // Add post to at end of posts
    // controversialSort.push(newPosts);
    // newestSort.push(newPosts);
}

// once the page is ready, load the feed
$(document).ready(function(){
    loadFeed();
});

