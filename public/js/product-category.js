function toggleTopFilterMenu() {
    let topFilterMenu = document.getElementById('top-filter-menu')
    topFilterMenu.classList.toggle('d-block')
}

function showSorted(sortSelector) {
    let sortValue = sortSelector.value
    console.log(sortValue)
    let url = new URL(window.location.href);
    url.searchParams.set('sort', sortValue);
    console.log(url);
    window.location.href = url;
}