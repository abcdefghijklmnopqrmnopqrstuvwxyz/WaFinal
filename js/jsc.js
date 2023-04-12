let btn = document.querySelector('.mouse');

btn.addEventListener('mousemove', e => {
    let x = e.clientX;
    let y = e.clientY;
    btn.style.setProperty('--x', x + 'px');
    btn.style.setProperty('--y', y + 'px');
});