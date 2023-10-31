const INPUT = document.querySelector('main > div > input');
const BTN_IN = document.querySelector('main > div > div > button:first-child');
const BTN_OUT = document.querySelector('main > div > div > button:nth-child(2)');
const OUTPUT = document.querySelector('main > div:nth-child(2)');

BTN_IN.addEventListener('click', insert );
BTN_OUT.addEventListener('click', outsert );

function outsert() {
    OUTPUT.replaceChildren();
}

function insert() {
    fetch(INPUT.value.trim())
    .then(url => url.json())
    .then(data => addImg(data))
    .catch(err => console.log(err))
}

function addImg(data) {
    data.forEach( object => {
        const ADD_DIV = document.createElement('div');
        const ADD_P = document.createElement('p');
        const ADD_IMG = document.createElement('img');

        ADD_P.textContent = object.id;
        ADD_IMG.setAttribute('src', object.download_url);
        ADD_IMG.style.width = '200px';
        ADD_IMG.style.height = '200px';

        OUTPUT.appendChild(ADD_DIV);
        ADD_DIV.appendChild(ADD_P);
        ADD_DIV.appendChild(ADD_IMG);
    })
}