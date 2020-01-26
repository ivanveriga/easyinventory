/**
 * Swap status of submenu (hide/show)
 * @param {string} _id id of element
 */
function swapStatusSubmenu(_id) {
    elem = document.getElementById(_id)
    
    if (elem.style.display == 'none')
        elem.style.display = 'block'
    else
        elem.style.display = 'none'
}

/**
 * Show modal window
 * @param {string} _id id modal window
 */
function showModal(_id) {
    document.getElementById(_id).style.display = 'block'
}

/**
 * Hide modal window
 * @param {string} _id id modal window
 */
function hideModal(_id) {
    document.getElementById(_id).style.display = 'none'
}