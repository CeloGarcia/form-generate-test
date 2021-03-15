// IIFE
(function() {
    document.querySelectorAll("[data-open]").forEach((el) => {
        el.addEventListener("click", function(e){
            toggleMenu(e.currentTarget);
            checkOutOfBoundaries(el.getElementsByClassName("submenu")[0]);
            // e.stopPropagation();
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        prepareMenu();

        prepareTabs();

        // prepareSearchArea();
    })
})()

// Toggle Class Function (element, class)
function toggleClass(el, cl) {
    el.classList.contains(cl) ? el.classList.remove(cl) : el.classList.add(cl);
}

// Remove preload class from body (prevents animation starts while body is on loading)
function removePreLoad() {
    document.body.classList.remove("preload");
}

// Stop Propagation of all elements of the menu
function stopPropagationMenu(arr) {
    arr.forEach((arr2) => {
        arr2.forEach(element => {
            element.addEventListener("click", function(e){
                e.stopPropagation();
            });
        });
    });
}

// Corrects if the submenu top position surpasses screen (basically if is negative around to zero)
function checkOutOfBoundaries(el) {
    if(el.getBoundingClientRect().top < 0) {
        el.style.top = 0;
    }
}

// Closes all active submenus to keep only the last one open
function toggleMenu(el) {
    let activeElements = el.parentElement.getElementsByClassName("is-active");
    if(activeElements.length !== 0) {
        [...activeElements].forEach(function(ace) {
            if(ace !== el) {
                ace.classList.remove("is-active");
            }
        });
    }

    toggleClass(el, "is-active");
}

function prepareMenu() {
    const menu = document.getElementById("mainMenu");

    let arr = [];
    arr.push(document.querySelectorAll(".submenu_item"));
    arr.push(document.querySelectorAll(".mainMenu_list-item"));
    arr.push(document.querySelectorAll(".submenu"));

    stopPropagationMenu(arr);

    menu.addEventListener("click", function () {
        removePreLoad();
        toggleClass(this, 'is-open');
    });
    setTimeout(() => removePreLoad(), 500);

    window.addEventListener('click', function(e){
        if (menu.classList.contains('is-open') && !document.getElementById('mainMenu').contains(e.target)){
            toggleClass(menu, 'is-open');
        }
    })
}

// Add another row of filter inputs
function addFilterRow() {
    let searchItems = document.querySelectorAll('[data-search]');
    let newItems = [];

    searchItems.forEach(function(item) {
        el = item.querySelector('[data-search-row]');
        let clone = el.cloneNode(true);

        newItems.push(item.insertBefore(clone, null));
    })

    let button = createDeleteButton([...newItems]);

    newItems[newItems.length - 1].getElementsByClassName('option-buttons')[0].appendChild(button);
}

// Delete from dom array of itens (in this case using to delete one row of the search list)
function deleteFilterRow(row) {
    row.forEach(function(el) {
        el.remove();
    });
}

// Create the button responsible to remove his "own" row of the search list
function createDeleteButton(arr) {
    let div = document.createElement('div');
    div.innerHTML = '<button class="button is-small is-light is-outlined"><span class="icon material-icons">delete</span></button>'.trim();
    let button = div.firstChild;

    button.addEventListener('click', function() {
        deleteFilterRow(arr);
    })

    return button;
}

// // Prepare search filter to dynamically set his own height to affect the transition
// function prepareSearchArea() {
//     let actionElement = document.getElementById('CloseSearch');
//     let targetElement = document.getElementById('SearchArea');

//     actionElement.addEventListener('click', function() {
//         if(resetHeight(targetElement)){
//             setTimeout(() => toggleClass(document.getElementById('SearchArea'), 'closed'), 500);
//         }
//         // toggleClass(document.getElementById('SearchArea'), 'closed');
//     });

//     // targetElement.style.height = targetElement.offsetHeight + 'px';
// }

// function resetHeight(el) {
//     if(el.style.height == '') {
//         el.style.height = el.offsetHeight + 'px';
//     } else {
//         setTimeout(()=>el.style.height = "", 300);
//     }

//     console.log(el.style.height);
//     return true;
// }


function prepareTabs() {
    let tabs = document.querySelectorAll('.tabs-navigation .tabs-nav-item');
    let content = document.querySelectorAll('.tabs-content .tabs-content-item');

    tabs.forEach(function(tab) {
        tab.addEventListener('click', function() {
            removeClassFromArray(tabs, 'active');
            tab.classList.add('active');
            removeClassFromArray(content, 'active');
            document.querySelector(`[data-tab="${tab.id}"]`).classList.add('active');
        });
    });
}

// Remove classe(cl) de um grupo elementos(arr) da dom
function removeClassFromArray(arr, cl) {
    arr.forEach(function(item) {
        item.classList.remove(cl);
    })
}
