        editors = $('.summernote');
        for (editor of editors){
            let summerNote = $('#'+editor.id).summernote({
                placeholder: '',
                lang: 'en-US',
                tabsize: 2,
                // height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
            summerNote.summernote('code', editor.getAttribute('kt-data'));
        }
