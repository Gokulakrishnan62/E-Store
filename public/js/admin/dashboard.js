jQuery(function ($) {

    $(document).ready(function () {
        navbar_actions.init();
    });

    window.navbar_actions = {

        init: function () {
            this.event_listeners();
        },

        show_profile_actions: function (nav_bar) {
            nav_bar = $(nav_bar);
            nav_bar.find('#profile-actions').removeClass('hidden');
        },

        hide_profile_actions: function (nav_bar) {
            nav_bar = $(nav_bar);
            setTimeout(function () {
                if (!nav_bar.find('#profile-button').is(':hover') && !nav_bar.find('#profile-actions').is(':hover')) {
                    nav_bar.find('#profile-actions').addClass('hidden');
                }
            }, 200);
        },

        event_listeners: function () {

            $(document).on('mouseenter', '#store-nav-bar #profile-button', function () {
                navbar_actions.show_profile_actions($(this).closest('#store-nav-bar'));
            });

            $(document).on('mouseleave', '#store-nav-bar #profile-button', function () {
                navbar_actions.hide_profile_actions($(this).closest('#store-nav-bar'));
            });

            $(document).on('mouseenter', '#store-nav-bar #profile-actions', function () {
                navbar_actions.show_profile_actions($(this).closest('#store-nav-bar'));
            });

            $(document).on('mouseleave', '#store-nav-bar #profile-actions', function () {
                navbar_actions.hide_profile_actions($(this).closest('#store-nav-bar'));
            });

            $(document).on('click', '#store-sidebar button', function () {
                $(this).next('ul').slideToggle();
            });
        },
    }
});
