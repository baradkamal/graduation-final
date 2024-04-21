function focusTrap(element) {
    const focusableElements = getFocusableElements(element)
    const firstFocusableEl = focusableElements[0]
    const lastFocusableEl = focusableElements[focusableElements.length - 1]

    // Wait for the case the element was not yet rendered
    setTimeout(() => firstFocusableEl.focus(), 50)

    /**
     * Get all focusable elements inside `element`
     * @param {HTMLElement} element - DOM element to focus trap inside
     * @return {HTMLElement[]} List of focusable elements
     */
    function getFocusableElements(element = document) {
      return [
        ...element.querySelectorAll(
          'a, button, details, input, select, textarea, [tabindex]:not([tabindex="-1"])'
        ),
      ].filter((e) => !e.hasAttribute('disabled'))
    }

    function handleKeyDown(e) {
      const TAB = 9
      const isTab = e.key.toLowerCase() === 'tab' || e.keyCode === TAB

      if (!isTab) return

      if (e.shiftKey) {
        if (document.activeElement === firstFocusableEl) {
          lastFocusableEl.focus()
          e.preventDefault()
        }
      } else {
        if (document.activeElement === lastFocusableEl) {
          firstFocusableEl.focus()
          e.preventDefault()
        }
      }
    }

    element.addEventListener('keydown', handleKeyDown)

    return function cleanup() {
      element.removeEventListener('keydown', handleKeyDown)
    }
  }

  function data() {
    function getThemeFromLocalStorage() {
      // if user already changed the theme, use it
      if (window.localStorage.getItem('dark')) {
        return JSON.parse(window.localStorage.getItem('dark'))
      }

      // else return their preferences
      return (
        !!window.matchMedia &&
        window.matchMedia('(prefers-color-scheme: dark)').matches
      )
    }

    function setThemeToLocalStorage(value) {
      window.localStorage.setItem('dark', value)
    }

    return {
      dark: getThemeFromLocalStorage(),
      toggleTheme() {
        this.dark = !this.dark
        setThemeToLocalStorage(this.dark)
      },
      isSideMenuOpen: false,
      toggleSideMenu() {
        this.isSideMenuOpen = !this.isSideMenuOpen
      },
      closeSideMenu() {
        this.isSideMenuOpen = false
      },
      isNotificationsMenuOpen: false,
      toggleNotificationsMenu() {
        this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen
      },
      closeNotificationsMenu() {
        this.isNotificationsMenuOpen = false
      },
      isProfileMenuOpen: false,
      toggleProfileMenu() {
        this.isProfileMenuOpen = !this.isProfileMenuOpen
      },
      closeProfileMenu() {
        this.isProfileMenuOpen = false
      },
      isPagesMenuOpen: false,
      togglePagesMenu() {
        this.isPagesMenuOpen = !this.isPagesMenuOpen
      },
      // Modal
      isModalOpen: false,
      trapCleanup: null,
      openModal() {
        this.isModalOpen = true
        this.trapCleanup = focusTrap(document.querySelector('#modal'))
      },
      closeModal() {
        this.isModalOpen = false
        this.trapCleanup()
      },
    }
  }

    /*Toggle dropdown list*/
  /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

  var userMenuDiv = document.getElementById("userMenu");
  var userMenu = document.getElementById("userButton");

  var navMenuDiv = document.getElementById("nav-content");
  var navMenu = document.getElementById("nav-toggle");

  document.onclick = check;

  function check(e) {
    var target = (e && e.target) || (event && event.srcElement);

    //User Menu
    if (!checkParent(target, userMenuDiv)) {
      // click NOT on the menu
      if (checkParent(target, userMenu)) {
        // click on the link
        if (userMenuDiv.classList.contains("invisible")) {
          userMenuDiv.classList.remove("invisible");
        } else {
          userMenuDiv.classList.add("invisible");
        }
      } else {
        // click both outside link and outside menu, hide menu
        userMenuDiv.classList.add("invisible");
      }
    }

    //Nav Menu
    if (!checkParent(target, navMenuDiv)) {
      // click NOT on the menu
      if (checkParent(target, navMenu)) {
        // click on the link
        if (navMenuDiv.classList.contains("hidden")) {
          navMenuDiv.classList.remove("hidden");
        } else {
          navMenuDiv.classList.add("hidden");
        }
      } else {
        // click both outside link and outside menu, hide menu
        navMenuDiv.classList.add("hidden");
      }
    }

  }

  function checkParent(t, elm) {
    while (t.parentNode) {
      if (t == elm) {
        return true;
      }
      t = t.parentNode;
    }
    return false;
  }