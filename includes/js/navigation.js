var toggleItemButton = document.querySelectorAll('.toggle-item-button');
toggleItemButton.forEach(function (button) {
    button.addEventListener('click', function () {
        if (button.getAttribute('aria-expanded') === 'false') {
            button.setAttribute('aria-expanded', 'true');
            let firstElement = button.nextElementSibling.firstElementChild;
            firstElement.focus();
        } else {
            button.setAttribute('aria-expanded', 'false');
        }

    });
    // hide the menu when the user clicks outside
    document.addEventListener('click', function (event) {
        if (event.target.closest('.toggle-item-button') === null) {
            button.setAttribute('aria-expanded', 'false');
        }
    });
    button.addEventListener('keyup', function (event) {
        // Hide the menu when press scape key or tab while last item is focused
        if (event.keyCode === 27 ) {
            this.setAttribute('aria-expanded', 'false');
        }
    });
    // hover in then show the menu
    button.addEventListener('mouseenter', function () {
        button.setAttribute('aria-expanded', 'true');
    });
    // hover out after 1000 ms then hide the menu
    button.addEventListener('mouseleave', function () {
        setTimeout(function () {
            button.setAttribute('aria-expanded', 'false');
        }, 1000);
    });
    // button sibling is the sub-menu find li
    let subMenu = button.nextElementSibling;
    let subMenuItems = subMenu.querySelectorAll('li');
    let lastElment = subMenuItems[subMenuItems.length - 1];
    subMenuItems.forEach(function (item) {
        item.addEventListener('keyup', function (event) {
            // Hide the menu when press scape key or tab while last item is focused
            if (event.keyCode === 27 || (event.keyCode === 9 && event.shiftKey === false && lastElment === event.target.closest('li'))) {
                button.setAttribute('aria-expanded', 'false');
                if (event.keyCode === 27) {
                    button.focus();
                } else {
                    event.target.closest('.menu-item-has-children').nextElementSibling.firstElementChild.focus();
                }
            }
        });
    });
});
// .toggle-mega-menu on hover
var toggleMegaMenu = document.querySelectorAll('.toggle-mega-menu');
toggleMegaMenu.forEach(function (button) {
    let controls = button.getAttribute('aria-controls');
    button.addEventListener('mouseenter', function () {
        button.setAttribute('aria-expanded', 'true');
        document.getElementById(controls).classList.add('active');
    });
    // mouse leave after 1000 ms then hide the menu
    button.addEventListener('mouseleave', function () {
        setTimeout(function () {
            button.setAttribute('aria-expanded', 'false');
            // but not hover out if the user is hover the sub-menu
            if (document.getElementById(controls).querySelector(':hover') === null) {
                document.getElementById(controls).classList.remove('active');
            }
        }, 1000);
    });
    // mouse leave mega menu
    document.getElementById(controls).addEventListener('mouseleave', function () {
        setTimeout(function () {
            button.setAttribute('aria-expanded', 'false');
            document.getElementById(controls).classList.remove('active');
        }, 1000);    
    });
    // hide the menu when the user clicks outside
    document.addEventListener('click', function (event) {
        if (event.target.closest('.toggle-mega-menu') === null) {
            button.setAttribute('aria-expanded', 'false');
            document.getElementById(controls).classList.remove('active');
        }
    });
    button.addEventListener('keyup', function (event) {
        // Hide the menu when press scape key or tab while last item is focused
        if (event.keyCode === 27 ) {
            this.setAttribute('aria-expanded', 'false');
            document.getElementById(controls).classList.remove('active');
        }
    });
    // click
    button.addEventListener('click', function () {
        if (button.getAttribute('aria-expanded') === 'false') {
            button.setAttribute('aria-expanded', 'true');
            document.getElementById(controls).classList.add('active');
            //focus first element
            let firstElement = document.getElementById(controls).querySelector('a');
            firstElement.focus();
        } else {
            button.setAttribute('aria-expanded', 'false');
            document.getElementById(controls).classList.remove('active');
        }

    });
    // button sibling is the sub-menu find li
    let lastElment = document.getElementById(controls).querySelectorAll('a');
    lastElment = lastElment[lastElment.length - 1];
    document.getElementById(controls).addEventListener('keyup', function (event) {
        // Hide the menu when press scape key or tab while last item is focused
        if (event.keyCode === 27 || (event.keyCode === 9 && event.shiftKey === false && lastElment === event.target.closest('a'))) {
            button.setAttribute('aria-expanded', 'false');
            document.getElementById(controls).classList.remove('active');
            if (event.keyCode === 27) {
                button.focus();
            } else {
                if ( button.closest('.menu-main-menu').nextElementSibling ) {
                    button.closest('.menu-main-menu').nextElementSibling.firstElementChild.firstElementChild.focus();
                }
            }
        }
    });
});

//toggle-button
var toggleButton = document.querySelectorAll('.toggle-button');
toggleButton.forEach(function (button) {
    // this click
    button.addEventListener('click', function () {
        if (button.getAttribute('aria-expanded') === 'false') {
            button.setAttribute('aria-expanded', 'true');
            button.nextElementSibling.classList.add('active');
        } else {
            button.setAttribute('aria-expanded', 'false');
            button.nextElementSibling.classList.remove('active');
        }
    });
    // hide the menu when the user clicks outside
    document.addEventListener('click', function (event) {
        if (event.target.closest('.toggle-button') === null) {
            button.setAttribute('aria-expanded', 'false');
            button.nextElementSibling.classList.remove('active');
        }
    });
    button.addEventListener('keyup', function (event) {
        // Hide the menu when press scape key or tab while last item is focused
        if (event.keyCode === 27 ) {
            this.setAttribute('aria-expanded', 'false');
            button.nextElementSibling.classList.remove('active');
        }
    });
    // escape key on the menu
    button.nextElementSibling.addEventListener('keyup', function (event) {
        // Hide the menu when press scape key or tab while last item is focused
        if (event.keyCode === 27) {
            button.setAttribute('aria-expanded', 'false');
            this.classList.remove('active');
            button.focus();
        }
    });
    // add active class and aria on hover
    button.addEventListener('mouseenter', function () {
        button.setAttribute('aria-expanded', 'true');
        button.nextElementSibling.classList.add('active');
    });
    // remove active class and aria on hover out
    button.addEventListener('mouseleave', function () {
        setTimeout(function () {
            button.setAttribute('aria-expanded', 'false');
            button.nextElementSibling.classList.remove('active');
        }, 1000);
    });
    // when menu lose focus close it
    button.nextElementSibling.addEventListener('focusout', function () {
        setTimeout(function () {
            button.setAttribute('aria-expanded', 'false');
            button.nextElementSibling.classList.remove('active');
        }, 1000);
    });
});