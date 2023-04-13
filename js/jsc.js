let btn = document.querySelector('.mouse');
let mousePosition = {x: 0, y: 0};

function updateMouseLocation(e)
{
    mousePosition.x = e.clientX;
    mousePosition.y = e.clientY;
    btn.style.setProperty('--x', mousePosition.x + 'px');
    btn.style.setProperty('--y', mousePosition.y + 'px');
}

btn.addEventListener('mousemove', updateMouseLocation);