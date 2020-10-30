function changeSearchBarVisibility() {
    let logoBox = document.getElementById('logo-box')
    let iconsBox = document.getElementById('icons-box')
    let searchBar = document.getElementById('search-bar')

    logoBox.classList.toggle('d-none')
    iconsBox.classList.toggle('d-none')
    searchBar.classList.toggle('d-flex')
}