let mouse = document.getElementById('mouse');
let mousePosition = {x: 0, y: 0};

if (checkPc()) {
    mouse.classList.remove('mouse');
}

function checkPc()
{
    if (navigator.userAgent.match(/(tablet|ipad|playbook)/i) || navigator.userAgent.match(/(mobile|iphone|ipod|android|blackberry|mini|windows\sce|palm)/i)) {
        return true;
    }
    return false
}

function updateMouseLocation(e)
{
    if (!checkPc()) {
        mousePosition.x = e.clientX;
        mousePosition.y = e.clientY;
        mouse.style.setProperty('--x', mousePosition.x + 'px');
        mouse.style.setProperty('--y', mousePosition.y + 'px');
    }
}

mouse.addEventListener('mousemove', updateMouseLocation);