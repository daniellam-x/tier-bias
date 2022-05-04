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
