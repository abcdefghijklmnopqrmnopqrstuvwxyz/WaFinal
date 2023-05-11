var mouse = $('#mouse');
var mousePosition = {x: 0, y: 0};

if (checkPc()) {
    mouse.removeClass('mouse');
}

function checkPc() {
    if (navigator.userAgent.match(/(tablet|ipad|playbook)/i) || navigator.userAgent.match(/(mobile|iphone|ipod|android|blackberry|mini|windows\sce|palm)/i)) {
        return true;
    }
    return false;
}

function updateMouseLocation(e) {
    if (!checkPc()) {
        mousePosition.x = e.clientX;
        mousePosition.y = e.clientY;
        mouse.css('--x', mousePosition.x + 'px');
        mouse.css('--y', mousePosition.y + 'px');
    }
}

mouse.on('mousemove', updateMouseLocation);