function handleSearchButtonClick() {
    let logoBox = document.getElementById('logo-box')
    let iconsBox = document.getElementById('icons-box')
    let searchBar = document.getElementById('search-bar')

    logoBox.classList.toggle('d-none')
    iconsBox.classList.toggle('d-none')
    searchBar.classList.toggle('d-flex')
}

function prepareLeftMenu() {
    let bodyElement = document.getElementsByTagName("BODY")[0];
    let opaqueLayer = document.getElementById('opaque-layer-lg')

    bodyElement.classList.toggle('scroll-enable-lg')
    opaqueLayer.classList.toggle('d-block')
}

function prepareLeftProfileMenu() {
    let bodyElement = document.getElementsByTagName("BODY")[0];
    let opaqueLayer = document.getElementById('opaque-layer-sm')

    bodyElement.classList.toggle('scroll-enable-sm')
    opaqueLayer.classList.toggle('d-block')
}

function handleProfileButtonClick() {
    prepareLeftProfileMenu()

    let profileMenu = document.getElementById('profile-menu')  
    profileMenu.classList.toggle('d-block')
    
}

function closeMenu() {
    let popUps = document.getElementsByClassName('pop-up')
    let bodyElement = document.getElementsByTagName("BODY")[0];

    for(let popUp of popUps) {
        popUp.classList.remove('d-block')
    }

    bodyElement.classList.remove('scroll-enable-xs')
    bodyElement.classList.remove('scroll-enable-lg')
}

function closeLeftSubmenu(leftSubmenuId) {
    let leftSubmenu = document.getElementById(leftSubmenuId)
    leftSubmenu.classList.remove('d-block')  
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
    kidsSubmenu.classList.remove('d-block')
}

function showLeftMenu() {
    prepareLeftMenu()
    
    let leftMenu = document.getElementById('left-menu')
    leftMenu.classList.add('d-block')
}

function showLeftMenSubmenu() {
    let leftMenSubmenu = document.getElementById('left-men-submenu')
    leftMenSubmenu.classList.add('d-block')
}

function showLeftWomenSubmenu() {
    let leftWomenSubmenu = document.getElementById('left-women-submenu')
    leftWomenSubmenu.classList.add('d-block')
}

function showLeftKidsSubmenu() {
    let leftWomenSubmenu = document.getElementById('left-kids-submenu')
    leftWomenSubmenu.classList.add('d-block')
}
