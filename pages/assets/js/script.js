'use strict';

// --- Element Selectors ---
const overlay = document.querySelector("[data-overlay]");
const bodyElement = document.body;

// Mobile Nav elements
const mobileMenuOpenBtn = document.querySelector("[data-mobile-menu-open-btn]");
const mobileMenu = document.querySelector("[data-mobile-menu]");
const mobileMenuCloseBtn = document.querySelector("[data-mobile-menu-close-btn]");
const accordionBtns = document.querySelectorAll("[data-accordion-btn]"); // Use plural for querySelectorAll

// Wishlist elements
const wishlistOpenBtns = document.querySelectorAll("[data-wishlist-open-btn]"); // Select ALL wishlist triggers
const wishlistMenu = document.querySelector("[data-wishlist-menu]");
const wishlistCloseBtn = document.querySelector("[data-wishlist-close-btn]");

// Cart elements
const cartOpenBtns = document.querySelectorAll("[data-cart-open-btn]"); // Select ALL cart triggers
const cartMenu = document.querySelector("[data-cart-menu]");
const cartCloseBtn = document.querySelector("[data-cart-close-btn]");

// --- Sidebar Configuration Array ---
const sidebarMenus = [
    // Mobile Nav Menu
    { menu: mobileMenu, openBtns: [mobileMenuOpenBtn], closeBtn: mobileMenuCloseBtn }, // openBtns is an array even for one item
    // Wishlist Menu
    { menu: wishlistMenu, openBtns: wishlistOpenBtns, closeBtn: wishlistCloseBtn },
    // Cart Menu
    { menu: cartMenu, openBtns: cartOpenBtns, closeBtn: cartCloseBtn }
];

// --- Generic Sidebar Toggle Function ---
const toggleSidebar = (targetMenu) => {
    // Guard clause: Do nothing if the target menu doesn't exist
    if (!targetMenu) {
        console.error("Target menu element not found.");
        return;
    }

    const isActive = targetMenu.classList.contains('active');

    // --- Close ALL currently open sidebars FIRST ---
    sidebarMenus.forEach(({ menu }) => {
        if (menu && menu.classList.contains('active')) {
            menu.classList.remove('active');
        }
    });

    // --- Always remove overlay and body lock initially when function is called ---
    // (This simplifies logic - we re-add them if needed)
    overlay.classList.remove('active');
    bodyElement.classList.remove('sidebar-active');

    // --- Open the TARGET sidebar (if it wasn't the one already open and trying to be closed) ---
    if (!isActive) {
        targetMenu.classList.add('active');
        overlay.classList.add('active');
        bodyElement.classList.add('sidebar-active'); // Prevent background scroll
    }
    // If it *was* active, the steps above already closed it, removed overlay, and body class.
};


// --- Add Event Listeners for All Sidebars ---
sidebarMenus.forEach(({ menu, openBtns, closeBtn }) => {
    // Ensure menu element exists before adding listeners
    if (!menu) return;

    // --- Open Button Listeners ---
    // Check if openBtns NodeList exists and has items
    if (openBtns && openBtns.length > 0) {
        openBtns.forEach(btn => {
             if (btn) { // Check if the specific button element exists
                 btn.addEventListener('click', (e) => {
                     e.preventDefault(); // Prevent default link/button behavior
                     // console.log(`Opening: ${menu.className}`); // Debugging
                     toggleSidebar(menu); // Call toggle function with the associated menu
                 });
             }
        });
    }

    // --- Close Button Listener ---
    if (closeBtn) {
        closeBtn.addEventListener('click', (e) => {
            e.preventDefault();
            // console.log(`Closing via button: ${menu.className}`); // Debugging
            toggleSidebar(menu); // Pass the menu to toggle it off
        });
    }
});

// --- Overlay Click Listener (Closes any active sidebar) ---
overlay.addEventListener('click', () => {
    // Find the currently active menu based on the config array
    const activeSidebar = sidebarMenus.find(({ menu }) => menu && menu.classList.contains('active'));
    if (activeSidebar && activeSidebar.menu) {
       // console.log(`Closing via overlay: ${activeSidebar.menu.className}`); // Debugging
       toggleSidebar(activeSidebar.menu); // Pass the active menu to toggle it off
    }
});


// --- Mobile Menu Accordion Logic ---
const closeAllAccordions = () => {
  accordionBtns.forEach(button => {
    button.classList.remove('active');
    const submenu = button.nextElementSibling;
    if (submenu && submenu.classList.contains('submenu-category-list')) {
        submenu.style.maxHeight = null;
    }
  });
};

accordionBtns.forEach(button => {
  button.addEventListener('click', function () {
    const wasActive = this.classList.contains('active');
    // Always close others before opening/closing the current one
    closeAllAccordions();

    if (!wasActive) {
      this.classList.add('active');
      const submenu = this.nextElementSibling;
      // Check if the next element is indeed the submenu
      if (submenu && submenu.classList.contains('submenu-category-list')) {
           submenu.style.maxHeight = submenu.scrollHeight + 'px';
      } else {
          // console.warn("Submenu not found for accordion button:", this);
      }
    }
    // If it was active, closeAllAccordions already handled closing it.
  });
});

// --- Optional: Add logic to show/hide empty messages in sidebars ---
function updateSidebarEmptyMessage(menuElement, listSelector, emptyMsgSelector) {
    const list = menuElement.querySelector(listSelector);
    const emptyMsg = menuElement.querySelector(emptyMsgSelector);
    if (list && emptyMsg) {
        // Check if list has items excluding the empty message itself
        const hasItems = list.children.length > 1 || (list.children.length === 1 && !list.firstElementChild.classList.contains('empty-message'));
        emptyMsg.style.display = hasItems ? 'none' : 'list-item'; // Use list-item or block as appropriate
    }
}

// Example usage (call this function when items are added/removed from wishlist/cart)
// updateSidebarEmptyMessage(wishlistMenu, '.sidebar-menu-list', '.empty-message');
// updateSidebarEmptyMessage(cartMenu, '.sidebar-menu-list', '.empty-message');

// Initial check on page load (assuming placeholders might be present)
if (wishlistMenu) updateSidebarEmptyMessage(wishlistMenu, '.sidebar-menu-list', '.empty-message');
if (cartMenu) updateSidebarEmptyMessage(cartMenu, '.sidebar-menu-list', '.empty-message');


// --- Add any other page-specific JS logic below ---
console.log("TechGo Script Loaded");