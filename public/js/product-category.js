function toggleTopFilterMenu() {
    let topFilterMenu = document.getElementById('top-filter-menu')
    topFilterMenu.classList.toggle('d-block')
}

function showSorted(sortSelector) {
    let sortValue = sortSelector.value
    let url = new URL(window.location.href);
    url.searchParams.delete('page');
    url.searchParams.set('sort', sortValue);
    console.log(url);
    window.location.href = url;
}