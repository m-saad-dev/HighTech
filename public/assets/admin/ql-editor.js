var toolbarOptions = [
    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
    ['bold', 'italic', 'underline'],
    [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
    [{ 'font': [] }],
    [{ 'align': [] }],
    [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
    [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
    [{ 'direction': 'rtl' }],                         // text direction
    ['image', 'code-block'],
    ['clean']  ,                                       // remove formatting button


];
var options = {
    debug: 'info',
    modules: {
        toolbar: toolbarOptions,
    },
    readOnly: false,
    theme: 'snow'
}
    // let form = document.getElementById('form');
     let containers = document.getElementsByClassName('editor-container');
    // let contents = [];
for (let container of containers)
{
    let editor = container.querySelector('.kt_docs_quill_basic');
    console.log(container)
    var quill = new Quill(editor, options);

}
