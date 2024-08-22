// Change Sidebar menus background color
$(function () {
    var url = window.location;
    $('ul.nav-sidebar a').filter(function () {
        return this.href == url;
    }).addClass('active');
    $('ul.nav-treeview a').filter(function () {
        return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview")
        .css({
            'display': 'block'
        })
        .addClass('menu-open').prev('a')
        .addClass('active');
});
