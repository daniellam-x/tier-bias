

const body = document.querySelector('body');
const links = ['homepage', 'createtier', 'search', 'contact', 'login'];

navDiv = document.createElement('div');
navDiv.classList.add('topnav');
leftNav = document.createElement('div');
leftNav.classList.add('leftnav');
navDive.appendChild(leftNav);
anchor = document.createElement('a');
leftNav.href = links[0] + '.html';
leftNav.appendChild(anchor);
logo = document.createElement('img');
logo.src = 'images/logo.png'
logo.alt = 'Tier Bias Logo'








// const bookDiv = document.createElement('div');
// bookTitle.classList.add('book-title');
// bookDiv.appendChild(bookTitle);