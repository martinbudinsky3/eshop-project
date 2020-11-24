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

    bodyElement.classList.remove('scroll-enable-sm')
    bodyElement.classList.remove('scroll-enable-lg')
}

function closeLeftSubmenu(leftSubmenuId) {
    let leftSubmenu = document.getElementById(leftSubmenuId)
    leftSubmenu.classList.remove('d-block')  
}

function showSubmenu(id) {
    console.log(id);
    let submenu = document.getElementById(id)
    submenu.classList.add('d-block')
}

function hideSubmenu(id) {
    let submenu = document.getElementById(id)
    submenu.classList.remove('d-block')
}

function showLeftMenu() {
    prepareLeftMenu()
    
    let leftMenu = document.getElementById('left-menu')
    leftMenu.classList.add('d-block')
}

function showLeftSubmenu(id) {
    let leftSubmenu = document.getElementById(id)
    leftSubmenu.classList.add('d-block')
}

function logout(event) {
    event.preventDefault();
    document.getElementById('logout-form').submit();
}
