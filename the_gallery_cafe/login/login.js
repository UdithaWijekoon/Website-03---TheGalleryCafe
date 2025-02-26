// function for handle animated login container. This gives us 50 spans for do styling
let container = document.querySelector('.login-container');

for (var i = 0; i < 50; i++){
    let span1 = document.createElement('span');
    span1.style.setProperty('--i' ,i);
    container.appendChild(span1);
    
}