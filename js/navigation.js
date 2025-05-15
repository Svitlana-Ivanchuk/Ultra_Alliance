/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	const siteNavigation = document.getElementById( 'site-navigation' );

	// Return early if the navigation doesn't exist.
	if ( ! siteNavigation ) {
		return;
	}

	const button = siteNavigation.getElementsByTagName( 'button' )[ 0 ];

	// Return early if the button doesn't exist.
	if ( 'undefined' === typeof button ) {
		return;
	}

	const menu = siteNavigation.getElementsByTagName( 'ul' )[ 0 ];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	if ( ! menu.classList.contains( 'nav-menu' ) ) {
		menu.classList.add( 'nav-menu' );
	}

	// Toggle the .toggled class and the aria-expanded value each time the button is clicked.
	button.addEventListener( 'click', function() {
		siteNavigation.classList.toggle( 'toggled' );

		if ( button.getAttribute( 'aria-expanded' ) === 'true' ) {
			button.setAttribute( 'aria-expanded', 'false' );
		} else {
			button.setAttribute( 'aria-expanded', 'true' );
		}
	} );

	// Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
	document.addEventListener( 'click', function( event ) {
		const isClickInside = siteNavigation.contains( event.target );

		if ( ! isClickInside ) {
			siteNavigation.classList.remove( 'toggled' );
			button.setAttribute( 'aria-expanded', 'false' );
		}
	} );

	// Get all the link elements within the menu.
	const links = menu.getElementsByTagName( 'a' );

	// Get all the link elements with children within the menu.
	const linksWithChildren = menu.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

	// Toggle focus each time a menu link is focused or blurred.
	for ( const link of links ) {
		link.addEventListener( 'focus', toggleFocus, true );
		link.addEventListener( 'blur', toggleFocus, true );
	}

	// Toggle focus each time a menu link with children receive a touch event.
	for ( const link of linksWithChildren ) {
		link.addEventListener( 'touchstart', toggleFocus, false );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		if ( event.type === 'focus' || event.type === 'blur' ) {
			let self = this;
			// Move up through the ancestors of the current link until we hit .nav-menu.
			while ( ! self.classList.contains( 'nav-menu' ) ) {
				// On li elements toggle the class .focus.
				if ( 'li' === self.tagName.toLowerCase() ) {
					self.classList.toggle( 'focus' );
				}
				self = self.parentNode;
			}
		}

		if ( event.type === 'touchstart' ) {
			const menuItem = this.parentNode;
			event.preventDefault();
			for ( const link of menuItem.parentNode.children ) {
				if ( menuItem !== link ) {
					link.classList.remove( 'focus' );
				}
			}
			menuItem.classList.toggle( 'focus' );
		}
	}


/*
        $("body").on("focus", ".with-label .form-control", function() {
            $(this).closest('.with-label').addClass("is-fill")
        }).on("blur", ".with-label .form-control", function() {
            var b = $(this).val().length,
                c = $(this).closest('.with-label');
            b > 0 ? c.addClass("is-fill") : c.removeClass("is-fill")
        });

*/




 /*
    $('.table_moreinfo tr td:last-child').addClass('copy-link');

    var copytxt = $('.copy-link');
    var messageCopy = 'Скопировать';
    var messageSuccess = 'Текст скопирован!';

    copytxt.append('<span class="copy-message"></span>');
    $('.copy-message').append(messageCopy);

    $('.table_moreinfo td:last-child').click(function() {
        return false;
    })

    copytxt.click(function() {
        var txt = $(this);
        copyToClipboard(txt);
        $('.copy-message').empty().append(messageSuccess);
        setTimeout(function() {
            $('.copy-message').empty().append(messageCopy);}, 5000);
    });

function copyToClipboard(text) {
    var dummy = document.createElement("input");
    document.body.appendChild(dummy);
    dummy.setAttribute('value', text);
    dummy.select();
    document.execCommand('copy');
    document.body.removeChild(dummy);
}

*/











}() );




(function($) {
$(function() {


	$(window).scroll(function(){
		if($(this).scrollTop() > 200) {
    $('html body').addClass('fly-menu-open');
			$('.site-header').addClass('show');
		} else {
			$('.site-header').removeClass('show');
			$('html body').removeClass('fly-menu-open');
		}
	});



         const slider1 = document.querySelectorAll('.swiper-slider1').length > 0;
         if (slider1){
            const swiper = new Swiper(".swiper-slider1", {
                loop: true,
                autoplay: {
                    delay: 5000,
                 },
                slidesPerView: 1,
                centeredSlides: true,
                navigation: false,
                pagination: {
                    el: ".swiper-pagination-num",
                    clickable: true,
                    renderBullet: function (index, className) {
                        return '<span class="' + className + '">0' + (index + 1) + "</span>";
                    },
                },
            });
        }



$('input[type=tel]').inputmask({"mask": "+38(999) 999-9999"});


$('.cat_faq_subcat_grid').isotope({
    layoutMode: 'vertical',
    itemSelector: '.cat_faq_subcat',
    vertical: {
        horizontalAlignment: 0.5
    }
});

// filter items on button click
$('.service_block_row').on( 'click', '.service_block', function() {
    $('.service_block').removeClass('active');
    $(this).addClass('active');
    var filterValue = $(this).attr('data-filter');
    $('.cat_faq_subcat_grid').isotope({ filter: filterValue });
});



// copy table td
function copy(event) {
    var target = event.target || event.srcElement;
    var copyText = target.innerText || target.textContent;
    navigator.clipboard.writeText(copyText)
    var range = document.createRange();
    range.selectNode(target);
    window.getSelection().removeAllRanges();
    window.getSelection().addRange(range);
}

 $('.table_moreinfo td:last-child').hover(
    function(){ $(this).addClass('hover') },
    function(){ $(this).removeClass('hover copied') }
).click(
    function(){$(this).addClass('copied')}
)

document.querySelectorAll(".table_moreinfo td:last-child")
    .forEach(elem => elem.addEventListener("click", copy));






})
})(jQuery)




















