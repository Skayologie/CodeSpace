import RenderForms from "../Events/RenderForms";

export default class Dashboard {
    constructor() {
        "use strict";
        this.init();
    }

    init() {
        feather.replace();
        new RenderForms();
        this.handleSidebarToggle();
        this.handleCategoryMenu();
        this.handleLanguageSwitcher();
        this.handleUserDropdown();
        this.handleThemeSwitcher();
        this.handleCheckboxSelection();
        this.handleCheckedSum();
        this.initializeCharts();
    }

    handleSidebarToggle() {
        const sidebar = document.querySelector('.sidebar');
        const catSubMenu = document.querySelector('.cat-sub-menu');
        const sidebarBtns = document.querySelectorAll('.sidebar-toggle');

        sidebarBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                sidebarBtns.forEach(sdbrBtn => sdbrBtn.classList.toggle('rotated'));
                sidebar.classList.toggle('hidden');
                catSubMenu?.classList.remove('visible');
            });
        });
    }

    handleCategoryMenu() {
        document.querySelectorAll('.show-cat-btn').forEach(btn => {
            btn.addEventListener('click', e => {
                e.preventDefault();
                const catSubMenu = btn.nextElementSibling;
                catSubMenu?.classList.toggle('visible');
                document.querySelector('.category__btn')?.classList.toggle('rotated');
            });
        });
    }

    handleLanguageSwitcher() {
        const showMenu = document.querySelector('.lang-switcher');
        const langMenu = document.querySelector('.lang-menu');
        const layer = document.querySelector('.layer');

        if (showMenu && langMenu && layer) {
            showMenu.addEventListener('click', () => {
                langMenu.classList.add('active');
                layer.classList.add('active');
            });

            layer.addEventListener('click', () => {
                langMenu.classList.remove('active');
                layer.classList.remove('active');
            });
        }
    }

    handleUserDropdown() {
        const userDdBtns = document.querySelectorAll('.dropdown-btn');
        const userDdList = document.querySelectorAll('.users-item-dropdown');
        const layer = document.querySelector('.layer');

        userDdBtns.forEach(btn => {
            btn.addEventListener('click', e => {
                layer.classList.add('active');
                userDdList.forEach(userDd => {
                    userDd.classList.toggle('active', e.currentTarget.nextElementSibling === userDd);
                });
            });
        });

        layer?.addEventListener('click', () => {
            userDdList.forEach(userDd => userDd.classList.remove('active'));
            layer.classList.remove('active');
        });
    }

    handleThemeSwitcher() {
        const darkModeToggle = document.querySelector('.theme-switcher');
        if (!darkModeToggle) return;

        const toggleDarkMode = () => {
            document.body.classList.toggle('darkmode');
            localStorage.setItem('darkMode', document.body.classList.contains('darkmode') ? 'enabled' : '');
        };

        if (localStorage.getItem('darkMode') === 'enabled') toggleDarkMode();
        darkModeToggle.addEventListener('click', toggleDarkMode);
    }

    handleCheckboxSelection() {
        const checkAll = document.querySelector('.check-all');
        const checkers = document.querySelectorAll('.check');

        if (!checkAll || !checkers.length) return;

        checkAll.addEventListener('change', () => {
            checkers.forEach(checker => {
                checker.checked = checkAll.checked;
                checker.closest('tr')?.classList.toggle('active', checkAll.checked);
            });
        });

        checkers.forEach(checker => {
            checker.addEventListener('change', () => {
                checker.closest('tr')?.classList.toggle('active', checker.checked);
                checkAll.checked = document.querySelectorAll('.users-table .check:checked').length === checkers.length;
            });
        });
    }

    handleCheckedSum() {
        const checkAll = document.querySelector('.check-all');
        const checkers = document.querySelectorAll('.check');
        const checkedSum = document.querySelector('.checked-sum');

        if (!checkedSum || !checkAll || !checkers.length) return;

        const updateCheckedSum = () => {
            checkedSum.textContent = document.querySelectorAll('.users-table .check:checked').length;
        };

        checkAll.addEventListener('change', updateCheckedSum);
        checkers.forEach(checker => checker.addEventListener('change', updateCheckedSum));
    }

    initializeCharts() {
        const ctx = document.getElementById('myChart')?.getContext('2d');
        if (!ctx) return;

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [
                    { label: 'Last 6 months', data: [35, 27, 40, 15, 30, 25, 45], borderColor: 'rgba(95, 46, 234, 1)', borderWidth: 2 },
                    { label: 'Previous', data: [20, 36, 16, 45, 29, 32, 10], borderColor: 'rgba(75, 222, 151, 1)', borderWidth: 2 }
                ]
            },
            options: {
                scales: {
                    y: { min: 0, max: 100, ticks: { stepSize: 25 }, grid: { display: false } },
                    x: { grid: { color: '#ddd' } }
                },
                plugins: {
                    legend: { position: 'top', align: 'end', labels: { boxWidth: 8, boxHeight: 8, usePointStyle: true, font: { size: 12, weight: '500' } } },
                    title: { display: true, text: ['Platform Visitor Statistics', 'Nov - July'], align: 'start', color: '#171717', font: { size: 16, weight: '600', lineHeight: 1.4 } }
                }
            }
        });
    }
}
