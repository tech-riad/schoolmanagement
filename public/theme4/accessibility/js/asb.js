/**
 * ASB - Accessibility Settings Bar
 * version 0.5
 */
$(document).ready(function () {
    (function () {
        /**
         * Content
         */

            // Tecla que será usada para complementar o atalho do teclado.
        const accessKey = 'a';

        // Definições dos botões
        const btns = {
            btnDecFont: {
                active: true,
                dataAccessibility: "decFont",
                class: "setAccessibility",
                class2: "setAccessibility2",
                icon: "A <sup>-</sup>",
                iconClass: "",
                text: "",
                label: "decrement font"
            },
            btnOriFont: {
                active: true,
                dataAccessibility: "oriFont",
                class: "setAccessibility",
                class2: "setAccessibility2",
                icon: "A <sup>o</sup>",
                iconClass: "",
                text: "",
                label: "original font"
            },
            btnIncFont: {
                active: true,
                dataAccessibility: "incFont",
                class: "setAccessibility",
                class2: "setAccessibility2",
                icon: "A <sup>+</sup>",
                iconClass: "",
                text: "",
                label: "increment font"
            },
            btnHighContrast: {
                active: true,
                dataAccessibility: "contrast",
                class: "setAccessibility",
                icon: "FontAwesome",
                iconClass: ["fas", "fa-tint"],
                text: " Monochrome",
                label: " Monochrome"
            },
            btnDarkMode: {
                active: true,
                dataAccessibility: "dark",
                class: "setAccessibility",
                icon: "FontAwesome",
                iconClass: ["fas", "fa-adjust"],
                text: "Invert Colors",
                label: "Invert Colors"
            },

            btnBigCursor: {
                active: true,
                dataAccessibility: "bcursor",
                class: "setAccessibility",
                icon: "FontAwesome",
                iconClass: ["fas", "fa-mouse-pointer"],
                text: "Big Cursor",
                label: "Big Cursor"
            },

            btnHighlightLink: {
                active: true,
                dataAccessibility: "highlink",
                class: "setAccessibility",
                icon: "FontAwesome",
                iconClass: ["fas", "fa-link"],
                text: "Highlight Links",
                label: "Highlight Links"
            },

            btnHeading: {
                active: true,
                dataAccessibility: "heading",
                class: "setAccessibility",
                icon: "FontAwesome",
                iconClass: ["fas", "fa-heading"],
                text: "Show Headings",
                label: "Show Headings"
            },

            // btnMarkerLine: {
            //   active: true,
            //   dataAccessibility: "markerLine",
            //   class: "setAccessibility",
            //   icon: "FontAwesome",
            //   iconClass: ["fas", "fa-ruler-horizontal"],
            //   text: "Marker Line",
            //   label: "Marker Line"
            // },
            btnReadingLine: {
                active: true,
                dataAccessibility: "readingLine",
                class: "setAccessibility",
                icon: "FontAwesome",
                iconClass: ["fas", "fa-book-open"],
                text: "Reading Guide",
                label: "Reading Guide",
            },
            btnReset: {
                active: true,
                dataAccessibility: "reset",
                class: "setAccessibility",
                icon: "FontAwesome",
                iconClass: ["fas", "fa-redo-alt"],
                text: "Reset",
                label: "Reset",
            },
            btnkey: {
                active: true,
                dataAccessibility: "keyboard",
                class: "setAccessibility",
                icon: "FontAwesome",
                iconClass: ["fas", "fa-keyboard"],
                text: "Keyboard Shortcut",
                label: "keyboard Shortcut",
            },
            btnDownload: {
                active: true,
                dataAccessibility: "download",
                class: "setAccessibility",
                icon: "FontAwesome",
                iconClass: ["fas", "fa-download"],
                text: "Download Screen Reader",
                label: "Download Screen Reader",
            },

        }

        /**
         * Creating the bar
         */

        const accessibilityBar = document.createElement("div");
        accessibilityBar.id = "accessibilityBar";
        accessibilityBar.tabindex = "0"
        accessibilityBar.title = "Accessibility Menu"
        // document.getElementById("app").append(accessibilityBar);

        document.body.insertBefore(accessibilityBar, document.body.childNodes[2]);


        /**
         * Creating main button
         */
        let btnAccessibilityBar;

        function createMainButton() {
            btnAccessibilityBar = document.createElement("button");
            btnAccessibilityBar.id = "universalAccessBtn";

            btnAccessibilityBar.type = "button";
            btnAccessibilityBar.ariaLabel = "accessibility menu";
            btnAccessibilityBar.accessKey = accessKey;
            accessibilityBar.appendChild(btnAccessibilityBar);

            const icon = document.createElement("i");
            btnAccessibilityBar.appendChild(icon);
            icon.classList.add("fas", "fa-universal-access");

            const spanText = document.createElement("span");
            const spanTextNode = document.createTextNode("Accessibility");
            spanText.appendChild(spanTextNode);
            btnAccessibilityBar.appendChild(spanText);
        }

        createMainButton();

        /**
         * Creating anothers button
         */

        function createButtons(el) {
            const button = document.createElement("button");
            button.type = "button";
            button.ariaLabel = el.label;
            button.title = el.label;
            button.classList.add(el.class);
            button.classList.add(el.class2);
            button.setAttribute('data-accessibility', el.dataAccessibility);
            accessibilityBar.appendChild(button);

            const wrapIcon = document.createElement("strong");
            button.appendChild(wrapIcon);

            if (el.icon === "FontAwesome") {
                const icon = document.createElement("i");
                wrapIcon.appendChild(icon);
                icon.classList.add(...el.iconClass
            )
                ;
            } else {
                const textIcon = document.createElement("span");
                textIcon.innerHTML = el.icon;
                wrapIcon.appendChild(textIcon);
            }

            const textButton = document.createTextNode(el.text);
            button.appendChild(textButton);
        }

        Object.keys(btns).forEach(function (item) {
            if (btns[item].active) {
                createButtons(btns[item]);
            }
        });


        const html = document.documentElement; //<html> for font-size settings
        const body = document.body; //<body> for the adjusts classes
        const btnAccessibility = document.querySelectorAll(".setAccessibility"); // Getting settings buttons

        if (btnAccessibilityBar) {
            setTimeout(function () {
                btnAccessibilityBar.classList.add("collapsed");
            }, 2000);
        }

        /**
         * ReadingLine
         */

        const readingLine = document.createElement("div");
        readingLine.id = "readingLine";
        document.body.insertBefore(readingLine, document.body.firstChild);

        html.addEventListener("mousemove", function (e) {
            if (body.classList.contains("accessibility_readingLine")) {
                let linePositionY = e.pageY - 20;
                // console.log(linePositionY);
                const elReadingLine = document.querySelector("#readingLine"); // Toggle button
                elReadingLine.style.top = `${linePositionY}px`;
            }
        });

        /**
         * MarkerLine
         */

        const markerLine = document.createElement("div");
        markerLine.id = "markerLine";
        document.body.insertBefore(markerLine, document.body.firstChild);

        html.addEventListener("mousemove", function (e) {
            if (body.classList.contains("accessibility_markerLine")) {
                let linePositionY = e.pageY - 20;
                // console.log(linePositionY);
                const elmarkerLine = document.querySelector("#markerLine"); // Toggle button
                elmarkerLine.style.top = `${linePositionY}px`;
            }
        });

      /*
       === === === === === === === === === === === === === === === === === ===
       === === === === === === === === openBar === === === === === === === ===
       === === === === === === === === === === === === === === === === === ===
       */

        btnAccessibilityBar.addEventListener("click", (e) => {
            accessibilityBar.classList.toggle("active")
    }
        )
        ;

      /*
       === === === === === === === === === === === === === === === === === ===
       === === === === === ===  toggleAccessibilities  === === === === === ===
       === === === === === === === === === === === === === === === === === ===
       */

        function toggleAccessibilities(action) {
            switch (action) {
                case "keyboard":
                    window.location.href = `${window.location.origin}/keyboard-shortcut`;
                    break;
                case "download":
                    window.open('https://www.nvaccess.org/files/nvda/releases/2020.4/nvda_2020.4.exe');
                    break;
                case "contrast":
                    window.toggleContrast();
                    break;
                case "dark":
                    window.toggleDark();
                    break;
                case "bcursor":
                    window.toggleCursor();
                    break;
                case "highlink":
                    window.toggleLink();
                    break;
                case "heading":
                    window.toggleHeading();
                    break;
                case "incFont":
                    window.toggleFontSize(action);
                    break;
                case "oriFont":
                    window.toggleFontSize(action);
                    break;
                case "decFont":
                    window.toggleFontSize(action);
                    break;
                case "readingLine":
                    body.classList.toggle("accessibility_readingLine");
                    break;
                case "markerLine":
                    body.classList.toggle("accessibility_markerLine");
                    break;
                case "reset":
                    Dark.currentState === true ? Dark.setState(false) : null;
                    Contrast.currentState === true ? Contrast.setState(false) : null;
                    Cursor.currentState === true ? Cursor.setState(false) : null;
                    Link.currentState === true ? Link.setState(false) : null;
                    Heading.currentState === true ? Heading.setState(false) : null;
                    window.toggleFontSize("oriFont");
                    body.classList.remove("accessibility_readingLine");
                    body.classList.remove("accessibility_markerLine");
                    break;
                default:
                    break;
            }
            // accessibilityBar.classList.toggle("active");
        }

        btnAccessibility.forEach(button =>
        button.addEventListener("click", () =>
        toggleAccessibilities(button.dataset.accessibility)
        )
        )
        ;

      /*
       === === === === === === === === === === === === === === === === === ===
       === === === === === === ===  FontSize   === === === === === === === ===
       === === === === === === === === === === === === === === === === === ===
       */

        const htmlFontSize = parseFloat(
            getComputedStyle(document.documentElement).getPropertyValue("font-size")
        );
        let FontSize = {
            storage: "fontSizeState",
            cssClass: "fontSize",
            currentState: null,
            check: checkFontSize,
            getState: getFontSizeState,
            setState: setFontSizeState,
            toggle: toggleFontSize,
            updateView: updateViewFontSize
        };

        window.toggleFontSize = function (action) {
            FontSize.toggle(action);
        };

        FontSize.check();

        function checkFontSize() {
            this.updateView();
        }

        function getFontSizeState() {
            return sessionStorage.getItem(this.storage)
                ? sessionStorage.getItem(this.storage)
                : 100;
        }

        function setFontSizeState(state) {
            sessionStorage.setItem(this.storage, "" + state);
            this.currentState = state;
            this.updateView();
        }

        function updateViewFontSize() {
            if (this.currentState === null) this.currentState = this.getState();

            this.currentState
                ? (html.style.fontSize = '15px') : "";

            this.currentState
                ? body.classList.add(this.cssClass + this.currentState)
                : "";
        }

        function toggleFontSize(action) {
            switch (action) {
                case "incFont":
                    if (parseFloat(this.currentState) < 180) {
                        body.classList.remove(this.cssClass + this.currentState);
                        this.setState(parseFloat(this.currentState) + 20);
                    } else {
                        // alert("Exceed limit");
                    }
                    break;
                case "oriFont":
                    body.classList.remove(this.cssClass + this.currentState);
                    this.setState(100);
                    break;
                case "decFont":
                    if (parseFloat(this.currentState) > 60) {
                        body.classList.remove(this.cssClass + this.currentState);
                        this.setState(parseFloat(this.currentState) - 20);
                    } else {
                        // alert("Exceed limit");
                    }
                    break;
                default:
                    break;
            }
        }

      /*
       === === === === === === === === === === === === === === === === === ===
       === === === === === ===  HighConstrast  === === === === === === === ===
       === === === === === === === === === === === === === === === === === ===
       */
        let Contrast = {
            storage: "contrastState",
            cssClass: "contrast",
            currentState: null,
            check: checkContrast,
            getState: getContrastState,
            setState: setContrastState,
            toggle: toggleContrast,
            updateView: updateViewContrast
        };

        window.toggleContrast = function () {
            Contrast.toggle();
        };

        Contrast.check();

        function checkContrast() {
            this.updateView();
        }

        function getContrastState() {
            return sessionStorage.getItem(this.storage) === "true";
        }

        function setContrastState(state) {
            sessionStorage.setItem(this.storage, "" + state);
            this.currentState = state;
            this.updateView();
        }

        function updateViewContrast() {
            if (this.currentState === null) this.currentState = this.getState();

            this.currentState
                ? body.classList.add(this.cssClass)
                : body.classList.remove(this.cssClass);
        }

        function toggleContrast() {
            this.setState(!this.currentState);
            Dark.currentState === true ? Dark.setState(false) : null;
        }

      /*
       === === === === === === === === === === === === === === === === === ===
       === === === === === === ===   DarkMode  === === === === === === === ===
       === === === === === === === === === === === === === === === === === ===
       */
        let Dark = {
            storage: "darkState",
            cssClass: "darkmode",
            currentState: null,
            check: checkDark,
            getState: getDarkState,
            setState: setDarkState,
            toggle: toggleDark,
            updateView: updateViewDark
        };

        window.toggleDark = function () {
            Dark.toggle();
        };

        Dark.check();

        function checkDark() {
            this.updateView();
        }

        function getDarkState() {
            return sessionStorage.getItem(this.storage) === "true";
        }

        function setDarkState(state) {
            sessionStorage.setItem(this.storage, "" + state);
            this.currentState = state;
            this.updateView();
        }

        function updateViewDark() {
            if (this.currentState === null) this.currentState = this.getState();

            this.currentState
                ? body.classList.add(this.cssClass)
                : body.classList.remove(this.cssClass);
        }

        function toggleDark() {
            this.setState(!this.currentState);
            Contrast.currentState === true ? Contrast.setState(false) : null;
        }

      /*
       === === === === === === === === === === === === === === === === === ===
       === === === === === === ===  BigCursor  === === === === === === === ===
       === === === === === === === === === === === === === === === === === ===
       */
        let Cursor = {
            storage: "cursorState",
            cssClass: "cursormode",
            currentState: null,
            check: checkCursor,
            getState: getCursorState,
            setState: setCursorState,
            toggle: toggleCursor,
            updateView: updateViewCursor
        };

        window.toggleCursor = function () {
            Cursor.toggle();
        };

        Cursor.check();

        function checkCursor() {
            this.updateView();
        }

        function getCursorState() {
            return sessionStorage.getItem(this.storage) === "true";
        }

        function setCursorState(state) {
            sessionStorage.setItem(this.storage, "" + state);
            this.currentState = state;
            this.updateView();
        }

        function updateViewCursor() {
            if (this.currentState === null) this.currentState = this.getState();
            this.currentState ? body.classList.add(this.cssClass) : body.classList.remove(this.cssClass);
        }

        function toggleCursor() {
            this.setState(!this.currentState);
        }

      /*
       === === === === === === === === === === === === === === === === === ===
       === === === === === === ===  Higlight Link  === === === === === === === ===
       === === === === === === === === === === === === === === === === === ===
       */
        let Link = {
            storage: "linkState",
            cssClass: "linkmode",
            currentState: null,
            check: checkLink,
            getState: getLinkState,
            setState: setLinkState,
            toggle: toggleLink,
            updateView: updateViewLink
        };

        window.toggleLink = function () {
            Link.toggle();
        };

        Link.check();

        function checkLink() {
            this.updateView();
        }

        function getLinkState() {
            return sessionStorage.getItem(this.storage) === "true";
        }

        function setLinkState(state) {
            sessionStorage.setItem(this.storage, "" + state);
            this.currentState = state;
            this.updateView();
        }

        function updateViewLink() {
            if (this.currentState === null) this.currentState = this.getState();
            this.currentState ? body.classList.add(this.cssClass) : body.classList.remove(this.cssClass);
        }

        function toggleLink() {
            this.setState(!this.currentState);
        }

      /*
       === === === === === === === === === === === === === === === === === ===
       === === === === === === ===  Higlight Heading  === === === === === === === ===
       === === === === === === === === === === === === === === === === === ===
       */
        let Heading = {
            storage: "headingState",
            cssClass: "headingmode",
            currentState: null,
            check: checkHeading,
            getState: getHeadingState,
            setState: setHeadingState,
            toggle: toggleHeading,
            updateView: updateViewHeading
        };

        window.toggleHeading = function () {
            Heading.toggle();
        };

        Heading.check();

        function checkHeading() {
            this.updateView();
        }

        function getHeadingState() {
            return sessionStorage.getItem(this.storage) === "true";
        }

        function setHeadingState(state) {
            sessionStorage.setItem(this.storage, "" + state);
            this.currentState = state;
            this.updateView();
        }

        function updateViewHeading() {
            if (this.currentState === null) this.currentState = this.getState();
            this.currentState ? body.classList.add(this.cssClass) : body.classList.remove(this.cssClass);
        }

        function toggleHeading() {
            this.setState(!this.currentState);
        }
    })();
});