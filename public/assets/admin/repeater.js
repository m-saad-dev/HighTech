repeater = $('#kt_docs_repeater_basic').repeater({
    initEmpty: false,
    defaultValues: {
        'text-input': 'foo'
    },

    show: function () {
        $(this).slideDown();
        $(this).find('[data-kt-repeater="select2"]').select2();

        // let elIndex = $(this).closest("[data-repeater-item]").index();
        // $(this).find('.shiftName').html(subShifts[elIndex]);
        KTImageInput.init();
    },

    hide: function (deleteElement) {
        $(this).slideUp(deleteElement);
    },
    
    ready: function(){
        // Init select2
        $('[data-kt-repeater="select2"]').select2();

    }

});
