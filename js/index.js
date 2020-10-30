function handleSearchButtonClick() {
    let logoBox = document.getElementById('logo-box')
    let iconsBox = document.getElementById('icons-box')
    let searchBar = document.getElementById('search-bar')

    logoBox.classList.toggle('d-none')
    iconsBox.classList.toggle('d-none')
    searchBar.classList.toggle('d-flex')
}

function handleProfileButtonClick() {
    let profileMenu = document.getElementById('profile-menu')
    let bodyElement = document.getElementsByTagName("BODY")[0];
    let opaqueLayer = document.getElementById('opaque-layer')

    profileMenu.classList.toggle('d-block')
    bodyElement.classList.toggle('scroll-disable-xs')
    opaqueLayer.classList.toggle('d-block')
}

function closeMenu() {
    let popUps = document.getElementsByClassName('pop-up')
    let bodyElement = document.getElementsByTagName("BODY")[0];

    for(let popUp of popUps) {
        popUp.classList.toggle('d-block')
    }

    bodyElement.classList.toggle('scroll-disable-xs')
}

function showMenSubmenu() {
    let menSubmenu = document.getElementById('men-submenu')
    menSubmenu.classList.add('d-block')
}

function showWomenSubmenu() {
    let womenSubmenu = document.getElementById('women-submenu')
    womenSubmenu.classList.add('d-block')
}

function showKidsSubmenu() {
    let kidsSubmenu = document.getElementById('kids-submenu')
    kidsSubmenu.classList.add('d-block')
}

function hideMenSubmenu() {
    let menSubmenu = document.getElementById('men-submenu')
    menSubmenu.classList.remove('d-block')
}

function hideWomenSubmenu() {
    let womenSubmenu = document.getElementById('women-submenu')
    womenSubmenu.classList.remove('d-block')
}

function hideKidsSubmenu() {
    let kidsSubmenu = document.getElementById('kids-submenu')
    kidsSubmenu.classList.remove    ('d-block')
}



