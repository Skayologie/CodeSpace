/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/css/app.css":
/*!*******************************!*\
  !*** ./resources/css/app.css ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/js/Dashboard/index.js":
/*!*****************************************!*\
  !*** ./resources/js/Dashboard/index.js ***!
  \*****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Dashboard)
/* harmony export */ });
/* harmony import */ var _Events_RenderForms__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../Events/RenderForms */ "./resources/js/Events/RenderForms.js");
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _classCallCheck(a, n) { if (!(a instanceof n)) throw new TypeError("Cannot call a class as a function"); }
function _defineProperties(e, r) { for (var t = 0; t < r.length; t++) { var o = r[t]; o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, _toPropertyKey(o.key), o); } }
function _createClass(e, r, t) { return r && _defineProperties(e.prototype, r), t && _defineProperties(e, t), Object.defineProperty(e, "prototype", { writable: !1 }), e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }

var Dashboard = /*#__PURE__*/function () {
  function Dashboard() {
    "use strict";

    _classCallCheck(this, Dashboard);
    this.init();
  }
  return _createClass(Dashboard, [{
    key: "init",
    value: function init() {
      feather.replace();
      new _Events_RenderForms__WEBPACK_IMPORTED_MODULE_0__["default"]();
      this.handleSidebarToggle();
      this.handleCategoryMenu();
      this.handleLanguageSwitcher();
      this.handleUserDropdown();
      this.handleThemeSwitcher();
      this.handleCheckboxSelection();
      this.handleCheckedSum();
      this.initializeCharts();
    }
  }, {
    key: "handleSidebarToggle",
    value: function handleSidebarToggle() {
      var sidebar = document.querySelector('.sidebar');
      var catSubMenu = document.querySelector('.cat-sub-menu');
      var sidebarBtns = document.querySelectorAll('.sidebar-toggle');
      sidebarBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
          sidebarBtns.forEach(function (sdbrBtn) {
            return sdbrBtn.classList.toggle('rotated');
          });
          sidebar.classList.toggle('hidden');
          catSubMenu === null || catSubMenu === void 0 || catSubMenu.classList.remove('visible');
        });
      });
    }
  }, {
    key: "handleCategoryMenu",
    value: function handleCategoryMenu() {
      document.querySelectorAll('.show-cat-btn').forEach(function (btn) {
        btn.addEventListener('click', function (e) {
          var _document$querySelect;
          e.preventDefault();
          var catSubMenu = btn.nextElementSibling;
          catSubMenu === null || catSubMenu === void 0 || catSubMenu.classList.toggle('visible');
          (_document$querySelect = document.querySelector('.category__btn')) === null || _document$querySelect === void 0 || _document$querySelect.classList.toggle('rotated');
        });
      });
    }
  }, {
    key: "handleLanguageSwitcher",
    value: function handleLanguageSwitcher() {
      var showMenu = document.querySelector('.lang-switcher');
      var langMenu = document.querySelector('.lang-menu');
      var layer = document.querySelector('.layer');
      if (showMenu && langMenu && layer) {
        showMenu.addEventListener('click', function () {
          langMenu.classList.add('active');
          layer.classList.add('active');
        });
        layer.addEventListener('click', function () {
          langMenu.classList.remove('active');
          layer.classList.remove('active');
        });
      }
    }
  }, {
    key: "handleUserDropdown",
    value: function handleUserDropdown() {
      var userDdBtns = document.querySelectorAll('.dropdown-btn');
      var userDdList = document.querySelectorAll('.users-item-dropdown');
      var layer = document.querySelector('.layer');
      userDdBtns.forEach(function (btn) {
        btn.addEventListener('click', function (e) {
          layer.classList.add('active');
          userDdList.forEach(function (userDd) {
            userDd.classList.toggle('active', e.currentTarget.nextElementSibling === userDd);
          });
        });
      });
      layer === null || layer === void 0 || layer.addEventListener('click', function () {
        userDdList.forEach(function (userDd) {
          return userDd.classList.remove('active');
        });
        layer.classList.remove('active');
      });
    }
  }, {
    key: "handleThemeSwitcher",
    value: function handleThemeSwitcher() {
      var darkModeToggle = document.querySelector('.theme-switcher');
      if (!darkModeToggle) return;
      var toggleDarkMode = function toggleDarkMode() {
        document.body.classList.toggle('darkmode');
        localStorage.setItem('darkMode', document.body.classList.contains('darkmode') ? 'enabled' : '');
      };
      if (localStorage.getItem('darkMode') === 'enabled') toggleDarkMode();
      darkModeToggle.addEventListener('click', toggleDarkMode);
    }
  }, {
    key: "handleCheckboxSelection",
    value: function handleCheckboxSelection() {
      var checkAll = document.querySelector('.check-all');
      var checkers = document.querySelectorAll('.check');
      if (!checkAll || !checkers.length) return;
      checkAll.addEventListener('change', function () {
        checkers.forEach(function (checker) {
          var _checker$closest;
          checker.checked = checkAll.checked;
          (_checker$closest = checker.closest('tr')) === null || _checker$closest === void 0 || _checker$closest.classList.toggle('active', checkAll.checked);
        });
      });
      checkers.forEach(function (checker) {
        checker.addEventListener('change', function () {
          var _checker$closest2;
          (_checker$closest2 = checker.closest('tr')) === null || _checker$closest2 === void 0 || _checker$closest2.classList.toggle('active', checker.checked);
          checkAll.checked = document.querySelectorAll('.users-table .check:checked').length === checkers.length;
        });
      });
    }
  }, {
    key: "handleCheckedSum",
    value: function handleCheckedSum() {
      var checkAll = document.querySelector('.check-all');
      var checkers = document.querySelectorAll('.check');
      var checkedSum = document.querySelector('.checked-sum');
      if (!checkedSum || !checkAll || !checkers.length) return;
      var updateCheckedSum = function updateCheckedSum() {
        checkedSum.textContent = document.querySelectorAll('.users-table .check:checked').length;
      };
      checkAll.addEventListener('change', updateCheckedSum);
      checkers.forEach(function (checker) {
        return checker.addEventListener('change', updateCheckedSum);
      });
    }
  }, {
    key: "initializeCharts",
    value: function initializeCharts() {
      var _document$getElementB;
      var ctx = (_document$getElementB = document.getElementById('myChart')) === null || _document$getElementB === void 0 ? void 0 : _document$getElementB.getContext('2d');
      if (!ctx) return;
      new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
          datasets: [{
            label: 'Last 6 months',
            data: [35, 27, 40, 15, 30, 25, 45],
            borderColor: 'rgba(95, 46, 234, 1)',
            borderWidth: 2
          }, {
            label: 'Previous',
            data: [20, 36, 16, 45, 29, 32, 10],
            borderColor: 'rgba(75, 222, 151, 1)',
            borderWidth: 2
          }]
        },
        options: {
          scales: {
            y: {
              min: 0,
              max: 100,
              ticks: {
                stepSize: 25
              },
              grid: {
                display: false
              }
            },
            x: {
              grid: {
                color: '#ddd'
              }
            }
          },
          plugins: {
            legend: {
              position: 'top',
              align: 'end',
              labels: {
                boxWidth: 8,
                boxHeight: 8,
                usePointStyle: true,
                font: {
                  size: 12,
                  weight: '500'
                }
              }
            },
            title: {
              display: true,
              text: ['Platform Visitor Statistics', 'Nov - July'],
              align: 'start',
              color: '#171717',
              font: {
                size: 16,
                weight: '600',
                lineHeight: 1.4
              }
            }
          }
        }
      });
    }
  }]);
}();


/***/ }),

/***/ "./resources/js/Events/Community.js":
/*!******************************************!*\
  !*** ./resources/js/Events/Community.js ***!
  \******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Community)
/* harmony export */ });
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _classCallCheck(a, n) { if (!(a instanceof n)) throw new TypeError("Cannot call a class as a function"); }
function _defineProperties(e, r) { for (var t = 0; t < r.length; t++) { var o = r[t]; o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, _toPropertyKey(o.key), o); } }
function _createClass(e, r, t) { return r && _defineProperties(e.prototype, r), t && _defineProperties(e, t), Object.defineProperty(e, "prototype", { writable: !1 }), e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
var Community = /*#__PURE__*/function () {
  function Community() {
    _classCallCheck(this, Community);
    this.openModalBtn = document.getElementById('openModalBtn');
    this.closeBtn = document.getElementById('closeBtn');
    this.cancelBtn = document.getElementById('cancelBtn');
    this.modalOverlay = document.getElementById('modalOverlay');
    this.communityNameInput = document.getElementById('communityName');
    this.descriptionInput = document.getElementById('description');
    this.nameCounter = document.getElementById('nameCounter');
    this.descCounter = document.getElementById('descCounter');
    this.previewName = document.getElementById('previewName');
    this.previewName1 = document.getElementById('previewName1');
    this.previewDescription = document.getElementById('previewDescription');
    this.previewDescription1 = document.getElementById('previewDescription1');
    this.uploadBannerBtn = document.getElementById('uploadBannerBtn');
    this.uploadIconBtn = document.getElementById('uploadIconBtn');
    this.bannerFileInput = document.getElementById('bannerFileInput');
    this.iconFileInput = document.getElementById('iconFileInput');
    this.bannerPreview = document.getElementById('bannerPreview');
    this.iconPreview = document.getElementById('iconPreview');
    this.CreateCommunity();
  }
  return _createClass(Community, [{
    key: "CreateCommunity",
    value: function CreateCommunity() {
      var _this = this;
      // Banner upload handling
      this.uploadBannerBtn.addEventListener('click', function () {
        _this.bannerFileInput.click();
      });
      this.bannerFileInput.addEventListener('change', function (e) {
        if (e.target.files && e.target.files[0]) {
          var reader = new FileReader();
          reader.onload = function (event) {
            _this.bannerPreview.style.backgroundImage = "url(".concat(event.target.result, ")");
            _this.bannerPreview.style.backgroundSize = 'cover';
            _this.bannerPreview.style.backgroundPosition = 'center';
          };
          reader.readAsDataURL(e.target.files[0]);
        }
      });

      // Icon upload handling
      this.uploadIconBtn.addEventListener('click', function () {
        _this.iconFileInput.click();
      });
      this.iconFileInput.addEventListener('change', function (e) {
        if (e.target.files && e.target.files[0]) {
          var reader = new FileReader();
          reader.onload = function (event) {
            _this.iconPreview.innerHTML = '';
            _this.iconPreview.style.backgroundImage = "url(".concat(event.target.result, ")");
            _this.iconPreview.style.backgroundSize = 'cover';
            _this.iconPreview.style.backgroundPosition = 'center';
          };
          reader.readAsDataURL(e.target.files[0]);
        }
      });

      // Event Listeners
      this.openModalBtn.addEventListener('click', function () {
        _this.modalOverlay.classList.remove('hidden');
      });
      [this.closeBtn].forEach(function (btn) {
        btn.addEventListener('click', function () {
          _this.modalOverlay.classList.add('hidden');
        });
      });

      // Close modal when clicking outside
      this.modalOverlay.addEventListener('click', function (e) {
        if (e.target === _this.modalOverlay) {
          _this.modalOverlay.classList.add('hidden');
        }
      });

      // Update character counter and preview for name
      this.communityNameInput.addEventListener('input', function () {
        var length = _this.communityNameInput.value.length;
        _this.nameCounter.textContent = length;
        _this.previewName.textContent = _this.communityNameInput.value || 'Skayologie';
        _this.previewName1.textContent = communityNameInput.value || 'Skayologie';
      });

      // Update character counter and preview for description
      this.descriptionInput.addEventListener('input', function () {
        var length = _this.descriptionInput.value.length;
        _this.descCounter.textContent = length;
        _this.previewDescription.textContent = _this.descriptionInput.value || 'Hello this is community for you';
        _this.previewDescription1.textContent = _this.descriptionInput.value || 'Hello this is community for you';
      });

      // Next button functionality (placeholder)
      document.getElementById('nextBtn').addEventListener('click', function () {
        var currentplace = document.getElementById("Currentplace");
        var next = document.getElementById('nextBtn');
        var back = document.getElementById("backBtn");
        var currentSection = document.getElementById(currentplace.value);
        var nextSection = document.getElementById(next.dataset.progress);
        currentSection.classList.add("hidden");
        nextSection.classList.remove("hidden");
        back.dataset.progress++;
        currentplace.value++;
        next.dataset.progress++;
        var NextStep = document.getElementById("step".concat(currentplace.value));
        console.log(NextStep);
        NextStep.classList.add("bg-blue-600");
        NextStep.classList.remove("bg-gray-300");
      });
      document.getElementById('backBtn').addEventListener('click', function () {
        var currentplace = document.getElementById("Currentplace");
        var next = document.getElementById('nextBtn');
        var back = document.getElementById("backBtn");
        var currentSection = document.getElementById(currentplace.value);
        var backSection = document.getElementById(back.dataset.progress);
        currentSection.classList.add("hidden");
        backSection.classList.remove("hidden");
        document.getElementById("step".concat(currentplace.value)).classList.remove("bg-blue-600");
        document.getElementById("step".concat(currentplace.value)).classList.add("bg-gray-300");
        back.dataset.progress--;
        currentplace.value--;
        next.dataset.progress--;
        var backStep = document.getElementById("step".concat(currentplace.value));
        console.log(currentStep);
        backStep.classList.add("bg-blue-600");
        backStep.classList.remove("bg-gray-300");
      });
    }
  }]);
}();


/***/ }),

/***/ "./resources/js/Events/Form.js":
/*!*************************************!*\
  !*** ./resources/js/Events/Form.js ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Form)
/* harmony export */ });
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _classCallCheck(a, n) { if (!(a instanceof n)) throw new TypeError("Cannot call a class as a function"); }
function _defineProperties(e, r) { for (var t = 0; t < r.length; t++) { var o = r[t]; o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, _toPropertyKey(o.key), o); } }
function _createClass(e, r, t) { return r && _defineProperties(e.prototype, r), t && _defineProperties(e, t), Object.defineProperty(e, "prototype", { writable: !1 }), e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
var Form = /*#__PURE__*/function () {
  function Form() {
    _classCallCheck(this, Form);
    this.form = document.querySelector("#PostForm");
    if (!this.form) throw new Error("Form not found!");

    // Select elements
    this.titleInput = document.querySelector("[name='title']");
    this.titleError = document.querySelector("#titleError");
    this.titleErrorMessage = document.querySelector("#titleErrorMessage");
    this.titleCounter = document.querySelector("#titleCounter");
    this.description = document.querySelector("#description");
    this.descriptionCheck = document.querySelector("#descriptionCheck");
    this.descriptionCounter = document.querySelector("#descriptionCounter");
    this.privateToggle = document.querySelector("#privateToggle");
    this.profileDisplayOption = document.querySelector("#profileDisplayOption");
    this.profileDisplayCheck = document.querySelector("#profileDisplayCheck");
    this.closeButton = document.querySelector("#closeButton");
    this.cancelButton = document.querySelector("#cancelButton");
    this.submitButton = document.querySelector("#submitButton");
    this.btnSubmit = document.getElementById('btnSubmit');
    this.init();
  }
  return _createClass(Form, [{
    key: "init",
    value: function init() {
      var _this = this;
      this.titleInput.addEventListener("input", function () {
        return _this.handleTitleValidation();
      });
      this.description.addEventListener("input", function () {
        return _this.handleDescriptionUpdate();
      });
      // this.privateToggle.addEventListener("change", () => this.handlePrivateToggle());
      // this.profileDisplayCheck.addEventListener("click", () => this.handleProfileDisplay());
      // this.closeButton.addEventListener("click", () => alert("Modal would close here"));
      // this.cancelButton.addEventListener("click", () => alert("Action cancelled"));
      this.btnSubmit.addEventListener('click', function (event) {
        return _this.validation(event);
      });
    }
  }, {
    key: "validation",
    value: function validation(event) {
      event.preventDefault(); // Prevent default form submission
      var quill = document.querySelector(".ql-editor").innerHTML;
      console.log(quill);
      document.getElementById('quill-content').value = quill;
      var isValid = true; // Assume the form is valid initially

      // Get form elements
      var title = document.querySelector('input[name="title"]');
      var category = document.querySelector('select[name="category"]');
      var allTags = document.querySelector('input[name="allTags"]');
      var content = document.querySelector('input[name="content"]');

      // Title validation
      if (title.value.trim() === "") {
        this.showError("titleError");
        isValid = false;
      } else {
        this.hideError("titleError");
      }

      // Category validation
      if (category.value === "Choose a category" || category.value === "") {
        this.showError("categoryError");
        isValid = false;
      } else {
        this.hideError("categoryError");
      }

      // Tags validation
      if (allTags.value.trim() === "") {
        this.showError("tagsError");
        isValid = false;
      } else {
        this.hideError("tagsError");
      }

      // Content validation
      if (content.value === "<p><br></p>" || content.value.length < 30) {
        this.showError("contentError");
        isValid = false;
      } else {
        this.hideError("contentError");
      }

      // Submit form only if all fields are valid
      if (isValid) {
        document.querySelector('form').submit();
      }
    }
  }, {
    key: "showError",
    value: function showError(id) {
      var errorElement = document.getElementById(id);
      if (errorElement) {
        errorElement.classList.remove("hidden");
      }
    }

    // Function to hide error messages
  }, {
    key: "hideError",
    value: function hideError(id) {
      var errorElement = document.getElementById(id);
      if (errorElement) {
        errorElement.classList.add("hidden");
      }
    }
  }, {
    key: "handleDescriptionInit",
    value: function handleDescriptionInit() {
      if (this.description.value.trim().length > 0) {
        this.descriptionCheck.classList.remove("hidden");
      }
    }
    // Title validation and character counter
  }, {
    key: "handleTitleValidation",
    value: function handleTitleValidation() {
      var remainingChars = this.titleInput.maxLength - this.titleInput.value.length;
      this.titleCounter.textContent = remainingChars;
      if (this.titleInput.value.trim().length === 0) {
        this.titleInput.classList.add("border-red-500");
        this.titleError.classList.remove("hidden");
        this.titleErrorMessage.classList.remove("hidden");
      } else {
        this.titleInput.classList.remove("border-red-500");
        this.titleError.classList.add("hidden");
        this.titleErrorMessage.classList.add("hidden");
      }
    }

    // Description counter and checkmark
  }, {
    key: "handleDescriptionUpdate",
    value: function handleDescriptionUpdate() {
      var remainingChars = this.description.maxLength - this.description.value.length;
      this.descriptionCounter.textContent = remainingChars;
      if (this.description.value.trim().length > 0) {
        this.descriptionCheck.classList.remove("hidden");
      } else {
        this.descriptionCheck.classList.add("hidden");
      }
    }

    // Private toggle functionality
  }, {
    key: "handlePrivateToggle",
    value: function handlePrivateToggle() {
      if (this.privateToggle.checked) {
        this.profileDisplayOption.classList.add("opacity-50");
        this.profileDisplayCheck.classList.remove("bg-blue-600");
        this.profileDisplayCheck.classList.add("bg-gray-300");
      } else {
        this.profileDisplayOption.classList.remove("opacity-50");
        this.profileDisplayCheck.classList.add("bg-blue-600");
        this.profileDisplayCheck.classList.remove("bg-gray-300");
      }
    }

    // Profile display toggle
  }, {
    key: "handleProfileDisplay",
    value: function handleProfileDisplay() {
      if (!this.privateToggle.checked) {
        this.profileDisplayCheck.classList.toggle("bg-blue-600");
        this.profileDisplayCheck.classList.toggle("bg-gray-300");
      }
    }

    // Handle form submission
  }, {
    key: "handleSubmit",
    value: function handleSubmit(event) {
      event.preventDefault();
      if (this.titleInput.value.trim().length === 0) {
        this.handleTitleValidation();
        return;
      }
      var formData = {
        title: this.titleInput.value,
        description: this.description.value,
        isPrivate: this.privateToggle.checked,
        displayOnProfile: this.profileDisplayCheck.classList.contains("bg-blue-600")
      };
      console.log("Form submitted with data:", formData);
      alert("Form submitted successfully: " + JSON.stringify(formData, null, 2));
    }
  }]);
}();


/***/ }),

/***/ "./resources/js/Events/Header.js":
/*!***************************************!*\
  !*** ./resources/js/Events/Header.js ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Header)
/* harmony export */ });
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _classCallCheck(a, n) { if (!(a instanceof n)) throw new TypeError("Cannot call a class as a function"); }
function _defineProperties(e, r) { for (var t = 0; t < r.length; t++) { var o = r[t]; o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, _toPropertyKey(o.key), o); } }
function _createClass(e, r, t) { return r && _defineProperties(e.prototype, r), t && _defineProperties(e, t), Object.defineProperty(e, "prototype", { writable: !1 }), e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
var Header = /*#__PURE__*/function () {
  function Header() {
    _classCallCheck(this, Header);
    this.profileButton = document.getElementById('profileButton');
    this.darkModeToggle = document.getElementById('toggleDarkMode');
    this.profileDropdown = document.getElementById('profileDropdown');
    this.init();
  }
  return _createClass(Header, [{
    key: "init",
    value: function init() {
      var _this = this;
      this.profileButton.addEventListener('click', function (event) {
        // Prevent the click from propagating to the document
        event.stopPropagation();
        _this.toggleDropdown();
      });
      document.addEventListener('click', function (event) {
        // If the click is outside the dropdown and the dropdown is visible
        if (!_this.profileDropdown.contains(event.target) && !_this.profileButton.contains(event.target)) {
          if (!_this.profileDropdown.classList.contains('hidden')) {
            _this.profileDropdown.classList.add('hidden');
          }
        }
      });
      document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && !this.profileDropdown.classList.contains('hidden')) {
          this.profileDropdown.classList.add('hidden');
        }
      });
      if (this.darkModeToggle) {
        this.darkModeToggle.addEventListener('change', function () {
          // You can implement dark mode toggle functionality here
          console.log('Dark mode toggled:', _this.checked);
        });
      }
    }
  }, {
    key: "toggleDropdown",
    value: function toggleDropdown() {
      this.profileDropdown.classList.toggle('hidden');
    }
  }]);
}();


/***/ }),

/***/ "./resources/js/Events/PostForm.js":
/*!*****************************************!*\
  !*** ./resources/js/Events/PostForm.js ***!
  \*****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ PostForm)
/* harmony export */ });
/* harmony import */ var _Form__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Form */ "./resources/js/Events/Form.js");
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _regeneratorRuntime() { "use strict"; /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */ _regeneratorRuntime = function _regeneratorRuntime() { return e; }; var t, e = {}, r = Object.prototype, n = r.hasOwnProperty, o = Object.defineProperty || function (t, e, r) { t[e] = r.value; }, i = "function" == typeof Symbol ? Symbol : {}, a = i.iterator || "@@iterator", c = i.asyncIterator || "@@asyncIterator", u = i.toStringTag || "@@toStringTag"; function define(t, e, r) { return Object.defineProperty(t, e, { value: r, enumerable: !0, configurable: !0, writable: !0 }), t[e]; } try { define({}, ""); } catch (t) { define = function define(t, e, r) { return t[e] = r; }; } function wrap(t, e, r, n) { var i = e && e.prototype instanceof Generator ? e : Generator, a = Object.create(i.prototype), c = new Context(n || []); return o(a, "_invoke", { value: makeInvokeMethod(t, r, c) }), a; } function tryCatch(t, e, r) { try { return { type: "normal", arg: t.call(e, r) }; } catch (t) { return { type: "throw", arg: t }; } } e.wrap = wrap; var h = "suspendedStart", l = "suspendedYield", f = "executing", s = "completed", y = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} var p = {}; define(p, a, function () { return this; }); var d = Object.getPrototypeOf, v = d && d(d(values([]))); v && v !== r && n.call(v, a) && (p = v); var g = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(p); function defineIteratorMethods(t) { ["next", "throw", "return"].forEach(function (e) { define(t, e, function (t) { return this._invoke(e, t); }); }); } function AsyncIterator(t, e) { function invoke(r, o, i, a) { var c = tryCatch(t[r], t, o); if ("throw" !== c.type) { var u = c.arg, h = u.value; return h && "object" == _typeof(h) && n.call(h, "__await") ? e.resolve(h.__await).then(function (t) { invoke("next", t, i, a); }, function (t) { invoke("throw", t, i, a); }) : e.resolve(h).then(function (t) { u.value = t, i(u); }, function (t) { return invoke("throw", t, i, a); }); } a(c.arg); } var r; o(this, "_invoke", { value: function value(t, n) { function callInvokeWithMethodAndArg() { return new e(function (e, r) { invoke(t, n, e, r); }); } return r = r ? r.then(callInvokeWithMethodAndArg, callInvokeWithMethodAndArg) : callInvokeWithMethodAndArg(); } }); } function makeInvokeMethod(e, r, n) { var o = h; return function (i, a) { if (o === f) throw Error("Generator is already running"); if (o === s) { if ("throw" === i) throw a; return { value: t, done: !0 }; } for (n.method = i, n.arg = a;;) { var c = n.delegate; if (c) { var u = maybeInvokeDelegate(c, n); if (u) { if (u === y) continue; return u; } } if ("next" === n.method) n.sent = n._sent = n.arg;else if ("throw" === n.method) { if (o === h) throw o = s, n.arg; n.dispatchException(n.arg); } else "return" === n.method && n.abrupt("return", n.arg); o = f; var p = tryCatch(e, r, n); if ("normal" === p.type) { if (o = n.done ? s : l, p.arg === y) continue; return { value: p.arg, done: n.done }; } "throw" === p.type && (o = s, n.method = "throw", n.arg = p.arg); } }; } function maybeInvokeDelegate(e, r) { var n = r.method, o = e.iterator[n]; if (o === t) return r.delegate = null, "throw" === n && e.iterator["return"] && (r.method = "return", r.arg = t, maybeInvokeDelegate(e, r), "throw" === r.method) || "return" !== n && (r.method = "throw", r.arg = new TypeError("The iterator does not provide a '" + n + "' method")), y; var i = tryCatch(o, e.iterator, r.arg); if ("throw" === i.type) return r.method = "throw", r.arg = i.arg, r.delegate = null, y; var a = i.arg; return a ? a.done ? (r[e.resultName] = a.value, r.next = e.nextLoc, "return" !== r.method && (r.method = "next", r.arg = t), r.delegate = null, y) : a : (r.method = "throw", r.arg = new TypeError("iterator result is not an object"), r.delegate = null, y); } function pushTryEntry(t) { var e = { tryLoc: t[0] }; 1 in t && (e.catchLoc = t[1]), 2 in t && (e.finallyLoc = t[2], e.afterLoc = t[3]), this.tryEntries.push(e); } function resetTryEntry(t) { var e = t.completion || {}; e.type = "normal", delete e.arg, t.completion = e; } function Context(t) { this.tryEntries = [{ tryLoc: "root" }], t.forEach(pushTryEntry, this), this.reset(!0); } function values(e) { if (e || "" === e) { var r = e[a]; if (r) return r.call(e); if ("function" == typeof e.next) return e; if (!isNaN(e.length)) { var o = -1, i = function next() { for (; ++o < e.length;) if (n.call(e, o)) return next.value = e[o], next.done = !1, next; return next.value = t, next.done = !0, next; }; return i.next = i; } } throw new TypeError(_typeof(e) + " is not iterable"); } return GeneratorFunction.prototype = GeneratorFunctionPrototype, o(g, "constructor", { value: GeneratorFunctionPrototype, configurable: !0 }), o(GeneratorFunctionPrototype, "constructor", { value: GeneratorFunction, configurable: !0 }), GeneratorFunction.displayName = define(GeneratorFunctionPrototype, u, "GeneratorFunction"), e.isGeneratorFunction = function (t) { var e = "function" == typeof t && t.constructor; return !!e && (e === GeneratorFunction || "GeneratorFunction" === (e.displayName || e.name)); }, e.mark = function (t) { return Object.setPrototypeOf ? Object.setPrototypeOf(t, GeneratorFunctionPrototype) : (t.__proto__ = GeneratorFunctionPrototype, define(t, u, "GeneratorFunction")), t.prototype = Object.create(g), t; }, e.awrap = function (t) { return { __await: t }; }, defineIteratorMethods(AsyncIterator.prototype), define(AsyncIterator.prototype, c, function () { return this; }), e.AsyncIterator = AsyncIterator, e.async = function (t, r, n, o, i) { void 0 === i && (i = Promise); var a = new AsyncIterator(wrap(t, r, n, o), i); return e.isGeneratorFunction(r) ? a : a.next().then(function (t) { return t.done ? t.value : a.next(); }); }, defineIteratorMethods(g), define(g, u, "Generator"), define(g, a, function () { return this; }), define(g, "toString", function () { return "[object Generator]"; }), e.keys = function (t) { var e = Object(t), r = []; for (var n in e) r.push(n); return r.reverse(), function next() { for (; r.length;) { var t = r.pop(); if (t in e) return next.value = t, next.done = !1, next; } return next.done = !0, next; }; }, e.values = values, Context.prototype = { constructor: Context, reset: function reset(e) { if (this.prev = 0, this.next = 0, this.sent = this._sent = t, this.done = !1, this.delegate = null, this.method = "next", this.arg = t, this.tryEntries.forEach(resetTryEntry), !e) for (var r in this) "t" === r.charAt(0) && n.call(this, r) && !isNaN(+r.slice(1)) && (this[r] = t); }, stop: function stop() { this.done = !0; var t = this.tryEntries[0].completion; if ("throw" === t.type) throw t.arg; return this.rval; }, dispatchException: function dispatchException(e) { if (this.done) throw e; var r = this; function handle(n, o) { return a.type = "throw", a.arg = e, r.next = n, o && (r.method = "next", r.arg = t), !!o; } for (var o = this.tryEntries.length - 1; o >= 0; --o) { var i = this.tryEntries[o], a = i.completion; if ("root" === i.tryLoc) return handle("end"); if (i.tryLoc <= this.prev) { var c = n.call(i, "catchLoc"), u = n.call(i, "finallyLoc"); if (c && u) { if (this.prev < i.catchLoc) return handle(i.catchLoc, !0); if (this.prev < i.finallyLoc) return handle(i.finallyLoc); } else if (c) { if (this.prev < i.catchLoc) return handle(i.catchLoc, !0); } else { if (!u) throw Error("try statement without catch or finally"); if (this.prev < i.finallyLoc) return handle(i.finallyLoc); } } } }, abrupt: function abrupt(t, e) { for (var r = this.tryEntries.length - 1; r >= 0; --r) { var o = this.tryEntries[r]; if (o.tryLoc <= this.prev && n.call(o, "finallyLoc") && this.prev < o.finallyLoc) { var i = o; break; } } i && ("break" === t || "continue" === t) && i.tryLoc <= e && e <= i.finallyLoc && (i = null); var a = i ? i.completion : {}; return a.type = t, a.arg = e, i ? (this.method = "next", this.next = i.finallyLoc, y) : this.complete(a); }, complete: function complete(t, e) { if ("throw" === t.type) throw t.arg; return "break" === t.type || "continue" === t.type ? this.next = t.arg : "return" === t.type ? (this.rval = this.arg = t.arg, this.method = "return", this.next = "end") : "normal" === t.type && e && (this.next = e), y; }, finish: function finish(t) { for (var e = this.tryEntries.length - 1; e >= 0; --e) { var r = this.tryEntries[e]; if (r.finallyLoc === t) return this.complete(r.completion, r.afterLoc), resetTryEntry(r), y; } }, "catch": function _catch(t) { for (var e = this.tryEntries.length - 1; e >= 0; --e) { var r = this.tryEntries[e]; if (r.tryLoc === t) { var n = r.completion; if ("throw" === n.type) { var o = n.arg; resetTryEntry(r); } return o; } } throw Error("illegal catch attempt"); }, delegateYield: function delegateYield(e, r, n) { return this.delegate = { iterator: values(e), resultName: r, nextLoc: n }, "next" === this.method && (this.arg = t), y; } }, e; }
function asyncGeneratorStep(n, t, e, r, o, a, c) { try { var i = n[a](c), u = i.value; } catch (n) { return void e(n); } i.done ? t(u) : Promise.resolve(u).then(r, o); }
function _asyncToGenerator(n) { return function () { var t = this, e = arguments; return new Promise(function (r, o) { var a = n.apply(t, e); function _next(n) { asyncGeneratorStep(a, r, o, _next, _throw, "next", n); } function _throw(n) { asyncGeneratorStep(a, r, o, _next, _throw, "throw", n); } _next(void 0); }); }; }
function _classCallCheck(a, n) { if (!(a instanceof n)) throw new TypeError("Cannot call a class as a function"); }
function _defineProperties(e, r) { for (var t = 0; t < r.length; t++) { var o = r[t]; o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, _toPropertyKey(o.key), o); } }
function _createClass(e, r, t) { return r && _defineProperties(e.prototype, r), t && _defineProperties(e, t), Object.defineProperty(e, "prototype", { writable: !1 }), e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }

var PostForm = /*#__PURE__*/function () {
  function PostForm() {
    _classCallCheck(this, PostForm);
    new _Form__WEBPACK_IMPORTED_MODULE_0__["default"]();
    this.tags = [];
    this.tagContainer = document.getElementById("tag-container");
    this.tabs = document.querySelectorAll('[data-tab]');
    this.tabContents = document.querySelectorAll('.tab-content');
    var quill = new Quill('#editor', {
      theme: 'snow',
      placeholder: "Wrire your content ..."
    });
    document.querySelector('form').addEventListener('submit', function () {
      document.getElementById('quill-content').value = quill.root.innerHTML;
    });
    this.init();
  }
  return _createClass(PostForm, [{
    key: "init",
    value: function init() {
      var _this = this;
      // change
      document.getElementById("tag-input").addEventListener("keyup", function () {
        var inputValue = document.getElementById("tag-input").value.trim();
        var searchBox = document.getElementById('tag-search-box');
        if (inputValue === "") {
          searchBox.innerHTML = ""; // Clear the search box
          return; // Stop execution to prevent an unnecessary API call
        }
        _this.getData(inputValue);
      });
      this.tabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
          var tabId = tab.getAttribute('data-tab');
          _this.activateTab(tabId);
        });
      });
    }
  }, {
    key: "getData",
    value: // Get Data for tags with ajax
    function () {
      var _getData = _asyncToGenerator(/*#__PURE__*/_regeneratorRuntime().mark(function _callee(text) {
        var _this2 = this;
        var url, response, json;
        return _regeneratorRuntime().wrap(function _callee$(_context) {
          while (1) switch (_context.prev = _context.next) {
            case 0:
              url = "Tag/Search/" + text;
              _context.prev = 1;
              _context.next = 4;
              return fetch(url);
            case 4:
              response = _context.sent;
              if (response.ok) {
                _context.next = 7;
                break;
              }
              throw new Error("Response status: ".concat(response.status));
            case 7:
              document.getElementById('tag-search-box').innerHTML = "";
              _context.next = 10;
              return response.json();
            case 10:
              json = _context.sent;
              json["data"].forEach(function (e) {
                document.getElementById('tag-search-box').innerHTML += "\n                         <span>\n                            <button id=\"".concat(e.id, ",\" type=\"button\" style=\"background-color: chocolate;border-radius: 8px\" class=\"TagName  p-2 text-white text-sm font-bold focus:outline-none\">#").concat(e.name, "</button>\n                         </span>\n                    ");
              });
              document.querySelectorAll(".TagName").forEach(function (element) {
                element.addEventListener("click", function () {
                  _this2.addTag(element.textContent, element.id);
                  var TagFinal = "";
                  document.querySelectorAll('.TagFinall').forEach(function (e) {
                    TagFinal += e.id;
                    console.log(TagFinal);
                    document.getElementById('allTags').value = TagFinal;
                  });
                });
              });
              _context.next = 18;
              break;
            case 15:
              _context.prev = 15;
              _context.t0 = _context["catch"](1);
              console.error(_context.t0.message);
            case 18:
            case "end":
              return _context.stop();
          }
        }, _callee, null, [[1, 15]]);
      }));
      function getData(_x) {
        return _getData.apply(this, arguments);
      }
      return getData;
    }()
  }, {
    key: "activateTab",
    value: function activateTab(tabId) {
      this.tabs.forEach(function (tab) {
        tab.classList.remove('border-b-2', 'border-blue-500', 'text-gray-800');
        tab.classList.add('text-gray-500');
      });
      this.tabContents.forEach(function (content) {
        content.classList.add('hidden');
      });
      var selectedTab = document.getElementById('tab-' + tabId);
      selectedTab.classList.add('border-b-2', 'border-blue-500', 'text-gray-800');
      selectedTab.classList.remove('text-gray-500');
      var selectedContent = document.getElementById('content-' + tabId);
      selectedContent.classList.remove('hidden');
      console.log(selectedContent.id);
      this.changeURL(selectedContent.id);
    }
  }, {
    key: "changeURL",
    value: function changeURL(newURL) {
      history.replaceState(null, "New Page", "/Post?Type=" + newURL);
    }
  }, {
    key: "addTag",
    value: function addTag(tagText, id) {
      var _this3 = this;
      if (tagText.trim() === "" || this.tags.includes(tagText)) return;
      this.tags.push(tagText);
      var tagElement = document.createElement("div");
      tagElement.classList = "bg-orange-500 text-white px-3 py-1 rounded-full flex items-center gap-2";
      tagElement.innerHTML = "<span id=\"".concat(id, "\" class=\"TagFinall\">").concat(tagText, "</span>\n                            <button class=\"text-white text-sm font-bold focus:outline-none\">&times;</button>");
      tagElement.querySelector("button").addEventListener("click", function () {
        tagElement.remove();
        _this3.tags = tags.filter(function (t) {
          return t !== tagText;
        });
      });
      this.tagContainer.appendChild(tagElement);
    }
  }]);
}(); // document.addEventListener('DOMContentLoaded', function() {
//
//     const titleInput = document.querySelector('input[placeholder="Titre*"]');
//     const charCount = document.querySelector('.text-right.text-gray-500');
//     const tabs = document.querySelectorAll('[data-tab]');
//     const tabContents = document.querySelectorAll('.tab-content');
//     const communitySelector = document.getElementById('communitySelector');
//     const communityIcon = document.getElementById('communityIcon');
//     const communityIconText = document.getElementById('communityIconText');
//     const communityText = document.getElementById('communityText');
//
//     // titleInput.addEventListener('input', function() {
//     //     const count = this.value.length;
//     //     charCount.textContent = count + '/300';
//     // });
//
//
//
//
//
//
//     // const toggleUserState = function() {
//     //     if (communityText.textContent === 'Sélectionner une communauté') {
//     //         setUserCommunity();
//     //     } else {
//     //         communityIcon.classList.remove('bg-green-500');
//     //         communityIcon.classList.add('bg-gray-800');
//     //         communityIconText.textContent = '/';
//     //         communityText.textContent = 'Sélectionner une communauté';
//     //     }
//     // };
//
//     // communitySelector.addEventListener('click', toggleUserState);
//
//     // Handle favorite icons
//     // const favoriteIcons = document.querySelectorAll('.favorite-icon');
//
//     // favoriteIcons.forEach(icon => {
//     //     icon.addEventListener('click', function(e) {
//     //         e.preventDefault();
//     //         e.stopPropagation();
//     //
//     //         // Toggle between filled and empty star
//     //         if (this.classList.contains('far')) {
//     //             this.classList.remove('far');
//     //             this.classList.add('fas');
//     //             this.style.color = '#ff4500'; // Reddit orange
//     //         } else {
//     //             this.classList.remove('fas');
//     //             this.classList.add('far');
//     //             this.style.color = ''; // Reset color
//     //         }
//     //     });
//     // });
//
//     // Make navigation links active when clicked
//     // const navLinks = document.querySelectorAll('nav a');
//     //
//     // navLinks.forEach(link => {
//     //     link.addEventListener('click', function(e) {
//     //         e.preventDefault();
//     //
//     //         // Remove active class from all links
//     //         navLinks.forEach(l => {
//     //             l.classList.remove('bg-gray-100', 'text-black');
//     //             l.classList.add('text-gray-700');
//     //         });
//     //
//     //         // Add active class to clicked link
//     //         this.classList.remove('text-gray-700');
//     //         this.classList.add('bg-gray-100', 'text-black');
//     //     });
//     // });
//
//     // Mobile functionality - toggle sidebar
//     // const toggleSidebar = document.createElement('button');
//     // toggleSidebar.innerHTML = '<i class="fas fa-bars"></i>';
//     // toggleSidebar.className = 'fixed top-4 left-4 md:hidden bg-white p-2 rounded-md shadow-md z-50';
//     // document.body.appendChild(toggleSidebar);
//     //
//     // const sidebar = document.querySelector('.w-64');
//     // let sidebarVisible = true;
//     //
//     // // On smaller screens, hide sidebar by default
//     // if (window.innerWidth < 768) {
//     //     sidebar.style.transform = 'translateX(-100%)';
//     //     sidebarVisible = false;
//     // }
//
//     // toggleSidebar.addEventListener('click', function() {
//     //     if (sidebarVisible) {
//     //         sidebar.style.transform = 'translateX(-100%)';
//     //     } else {
//     //         sidebar.style.transform = 'translateX(0)';
//     //     }
//     //     sidebarVisible = !sidebarVisible;
//     // });
//
//     // Add transition for smooth sidebar sliding
//     // sidebar.style.transition = 'transform 0.3s ease';
//     //
//     //
//     // document.getElementById("email").addEventListener("input",()=>{
//     //     if (document.getElementById("email").value.length !== 0) {
//     //         document.getElementById("sendBtn").classList.remove("bg-gray-200");
//     //         document.getElementById("sendBtn").classList.remove("text-gray-700");
//     //         document.getElementById("sendBtn").classList.add("text-white");
//     //         document.getElementById("sendBtn").classList.add("bg-orange-600");
//     //     }else{
//     //         document.getElementById("sendBtn").classList.add("bg-gray-200");
//     //         document.getElementById("sendBtn").classList.remove("bg-orange-600");
//     //         document.getElementById("sendBtn").classList.add("text-gray-700");
//     //         document.getElementById("sendBtn").classList.remove("text-white");
//     //     }
//     // })
//
//
// });


/***/ }),

/***/ "./resources/js/Events/RenderForms.js":
/*!********************************************!*\
  !*** ./resources/js/Events/RenderForms.js ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ RenderForms)
/* harmony export */ });
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _classCallCheck(a, n) { if (!(a instanceof n)) throw new TypeError("Cannot call a class as a function"); }
function _defineProperties(e, r) { for (var t = 0; t < r.length; t++) { var o = r[t]; o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, _toPropertyKey(o.key), o); } }
function _createClass(e, r, t) { return r && _defineProperties(e.prototype, r), t && _defineProperties(e, t), Object.defineProperty(e, "prototype", { writable: !1 }), e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
var RenderForms = /*#__PURE__*/function () {
  function RenderForms() {
    _classCallCheck(this, RenderForms);
    this.init();
  }
  return _createClass(RenderForms, [{
    key: "init",
    value: function init() {
      var _this = this;
      document.getElementById('category').addEventListener('click', function () {
        _this.renderCategoryForm();
      });
      document.getElementById('tag').addEventListener('click', function () {
        _this.renderTagForm();
      });
    }
  }, {
    key: "renderCommunityForm",
    value: function renderCommunityForm() {}
  }, {
    key: "renderCategoryForm",
    value: function renderCategoryForm() {
      var _this2 = this;
      fetch('/Categorie').then(function (response) {
        return response.json();
      }).then(function (data) {
        document.getElementById("ContainForm").innerHTML = data.content;
        document.getElementById("closeButton").addEventListener('click', function () {
          document.getElementById("ContainForm").innerHTML = "";
        });
        document.getElementById("cancelButton").addEventListener('click', function () {
          document.getElementById("ContainForm").innerHTML = "";
        });
        _this2.SideBarFormEvents();
      })["catch"](function (error) {
        return console.error('Error fetching Blade file:', error);
      });
    }
  }, {
    key: "renderTagForm",
    value: function renderTagForm() {
      var _this3 = this;
      fetch('/Tag').then(function (response) {
        return response.json();
      }).then(function (data) {
        document.getElementById("ContainForm").innerHTML = data.content;
        document.getElementById("closeButton").addEventListener('click', function () {
          document.getElementById("ContainForm").innerHTML = "";
        });
        document.getElementById("cancelButton").addEventListener('click', function () {
          document.getElementById("ContainForm").innerHTML = "";
        });
        _this3.SideBarFormEvents();
      })["catch"](function (error) {
        return console.error('Error fetching Blade file:', error);
      });
    }
  }, {
    key: "SideBarFormEvents",
    value: function SideBarFormEvents() {
      // Elements
      var form = document.getElementById('customFlowForm');
      var titleInput = document.getElementById('title');
      var titleError = document.getElementById('titleError');
      var titleErrorMessage = document.getElementById('titleErrorMessage');
      var titleCounter = document.getElementById('titleCounter');
      var description = document.getElementById('description');
      var descriptionCheck = document.getElementById('descriptionCheck');
      var descriptionCounter = document.getElementById('descriptionCounter');
      var privateToggle = document.getElementById('privateToggle');
      var profileDisplayOption = document.getElementById('profileDisplayOption');
      var profileDisplayCheck = document.getElementById('profileDisplayCheck');
      var closeButton = document.getElementById('closeButton');
      var cancelButton = document.getElementById('cancelButton');
      var submitButton = document.getElementById('submitButton');

      // Initialize display state (show check mark if description has content)
      if (description.value.trim().length > 0) {
        descriptionCheck.classList.remove('hidden');
      }

      // Title validation and character counter
      titleInput.addEventListener('input', function () {
        var remainingChars = this.maxLength - this.value.length;
        titleCounter.textContent = remainingChars;
        if (this.value.trim().length === 0) {
          this.classList.add('border-red-500');
          titleError.classList.remove('hidden');
          titleErrorMessage.classList.remove('hidden');
        } else {
          this.classList.remove('border-red-500');
          titleError.classList.add('hidden');
          titleErrorMessage.classList.add('hidden');
        }
      });

      // Description character counter and checkmark
      description.addEventListener('input', function () {
        var remainingChars = this.maxLength - this.value.length;
        descriptionCounter.textContent = remainingChars;
        if (this.value.trim().length > 0) {
          descriptionCheck.classList.remove('hidden');
        } else {
          descriptionCheck.classList.add('hidden');
        }
      });

      // // Private toggle functionality
      // privateToggle.addEventListener('change', function() {
      //     if (this.checked) {
      //         // Disable profile display when private is enabled
      //         profileDisplayOption.classList.add('opacity-50');
      //         profileDisplayCheck.classList.remove('bg-blue-600');
      //         profileDisplayCheck.classList.add('bg-gray-300');
      //     } else {
      //         // Enable profile display when private is disabled
      //         profileDisplayOption.classList.remove('opacity-50');
      //         profileDisplayCheck.classList.add('bg-blue-600');
      //         profileDisplayCheck.classList.remove('bg-gray-300');
      //     }
      // });
      //
      // // Profile display toggle
      // profileDisplayCheck.addEventListener('click', function() {
      //     // Only allow toggling if private mode is not enabled
      //     if (!privateToggle.checked) {
      //         if (this.classList.contains('bg-blue-600')) {
      //             this.classList.remove('bg-blue-600');
      //             this.classList.add('bg-gray-300');
      //         } else {
      //             this.classList.add('bg-blue-600');
      //             this.classList.remove('bg-gray-300');
      //         }
      //     }
      // });

      // Close button functionality
      closeButton.addEventListener('click', function () {
        // In a real application, this would close the modal
        alert('Modal would close here');
      });

      // Cancel button functionality
      cancelButton.addEventListener('click', function () {
        // In a real application, this would close the modal
        alert('Action cancelled');
      });

      // Form submission
      form.addEventListener('submit', function (e) {
        e.preventDefault();

        // Validate title
        if (titleInput.value.trim().length === 0) {
          titleInput.classList.add('border-red-500');
          titleError.classList.remove('hidden');
          titleErrorMessage.classList.remove('hidden');
          return;
        }

        // Collect form data
        var formData = {
          title: titleInput.value,
          description: description.value
          // isPrivate: privateToggle.checked,
          // displayOnProfile: profileDisplayCheck.classList.contains('bg-blue-600')
        };

        // Display form data (in a real app, you would send this to a server)
        console.log('Form submitted with data:', formData);
        alert('Form submitted successfully: ' + JSON.stringify(formData, null, 2));
      });
    }
  }]);
}();


/***/ }),

/***/ "./resources/js/Events/dropdown.js":
/*!*****************************************!*\
  !*** ./resources/js/Events/dropdown.js ***!
  \*****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Dropdown)
/* harmony export */ });
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _classCallCheck(a, n) { if (!(a instanceof n)) throw new TypeError("Cannot call a class as a function"); }
function _defineProperties(e, r) { for (var t = 0; t < r.length; t++) { var o = r[t]; o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, _toPropertyKey(o.key), o); } }
function _createClass(e, r, t) { return r && _defineProperties(e.prototype, r), t && _defineProperties(e, t), Object.defineProperty(e, "prototype", { writable: !1 }), e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
var Dropdown = /*#__PURE__*/function () {
  function Dropdown() {
    _classCallCheck(this, Dropdown);
    this.init();
  }
  return _createClass(Dropdown, [{
    key: "init",
    value: function init() {
      var sectionHeaders = document.querySelectorAll('.section-header');
      sectionHeaders.forEach(function (header) {
        header.addEventListener('click', function () {
          var sectionId = this.getAttribute('data-section');
          var contentElement = document.getElementById("".concat(sectionId, "-content"));
          var iconElement = this.querySelector('.section-icon');

          // Toggle the section visibility
          if (contentElement.style.display === 'none') {
            contentElement.style.display = 'block';
            iconElement.classList.remove('fa-chevron-down');
            iconElement.classList.add('fa-chevron-up');
          } else {
            contentElement.style.display = 'none';
            iconElement.classList.remove('fa-chevron-up');
            iconElement.classList.add('fa-chevron-down');
          }
        });
      });
    }
  }]);
}();


/***/ }),

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Events_dropdown_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Events/dropdown.js */ "./resources/js/Events/dropdown.js");
/* harmony import */ var _Events_Community__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Events/Community */ "./resources/js/Events/Community.js");
/* harmony import */ var _Events_PostForm__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Events/PostForm */ "./resources/js/Events/PostForm.js");
/* harmony import */ var _Events_Header__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./Events/Header */ "./resources/js/Events/Header.js");
/* harmony import */ var _Dashboard_index__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./Dashboard/index */ "./resources/js/Dashboard/index.js");





var path = window.location.pathname;
if (path !== "/Dashboard") {
  document.addEventListener("DOMContentLoaded", function () {
    new _Events_dropdown_js__WEBPACK_IMPORTED_MODULE_0__["default"]();
    new _Events_Community__WEBPACK_IMPORTED_MODULE_1__["default"]();
    new _Events_Header__WEBPACK_IMPORTED_MODULE_3__["default"]();
    new _Events_PostForm__WEBPACK_IMPORTED_MODULE_2__["default"]();
  });
} else {
  document.addEventListener("DOMContentLoaded", function () {
    new _Dashboard_index__WEBPACK_IMPORTED_MODULE_4__["default"]();
  });
}

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/app": 0,
/******/ 			"css/app": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/js/app.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/css/app.css")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;