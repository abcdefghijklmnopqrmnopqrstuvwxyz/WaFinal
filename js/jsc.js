let btn = document.querySelector('.mouse');
let mousePosition = {x: 0, y: 0};

function updateMouseLocation(e)
{
    if (!(navigator.userAgent.match(/(tablet|ipad|playbook)/i) || navigator.userAgent.match(/(mobile|iphone|ipod|android|blackberry|mini|windows\sce|palm)/i))) {
        mousePosition.x = e.clientX;
        mousePosition.y = e.clientY;
        btn.style.setProperty('--x', mousePosition.x + 'px');
        btn.style.setProperty('--y', mousePosition.y + 'px');
    }
}

btn.addEventListener('mousemove', updateMouseLocation);