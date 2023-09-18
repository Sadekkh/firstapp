$(document).ready(function () {
    $(".category-item").hover(
        function () {
            $(this).find(".subcategory-list").slideDown("fast");
        },
        function () {
            $(this).find(".subcategory-list").slideUp("fast");
        }
    );
});
