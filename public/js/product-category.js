function toggleTopFilterMenu() {
    let topFilterMenu = document.querySelector('#top-filter-menu')
    topFilterMenu.classList.toggle('d-block')
}

function showSorted(sortSelector) {
    let sortValue = sortSelector.value
    let url = new URL(window.location.href);
    url.searchParams.delete('page');
    url.searchParams.set('sort', sortValue);
    window.location.href = url;
}