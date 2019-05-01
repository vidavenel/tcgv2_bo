// Import TinyMCE
import tinymce from 'tinymce/tinymce';

// A theme is also required
import 'tinymce/themes/silver';
import 'tinymce/skins/ui/oxide/skin.css';
import 'tinymce/skins/ui/oxide/content.css';
import 'tinymce/skins/content/default/content.css';

// Any plugins you want to use has to be imported
import 'tinymce/plugins/paste';
import 'tinymce/plugins/link';



function init (element) {
    // Initialize the app
    tinymce.init({
        selector: element,
        menubar: false,
        plugins: ['paste', 'link'],
        toolbar: "undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent forecolor backcolor",
        height: 700
    });
}

export default init
