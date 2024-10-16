// import các plugins sẽ sử dụng và cả ClassicEditor
import {
    Essentials,
    Paragraph,
    Bold,
    Italic,
    Underline,
    Strikethrough,
    BlockQuote,
    List,
    Image,
    Link,
    Font,
    FontSize,
    FontColor,
    FontBackgroundColor,
    Table,
    TableToolbar,
    Code,
    Highlight,
    HorizontalLine,
    SpecialCharacters,
    AutoLink,
    ClassicEditor,
} from "ckeditor5";

ClassicEditor.create(document.querySelector("#editor"), {
    plugins: [
        Essentials,
        Paragraph,
        Bold,
        Italic,
        Underline,
        Strikethrough,
        BlockQuote,
        List,
        Image,
        Link,
        Font,
        FontSize,
        FontColor,
        FontBackgroundColor,
        Table,
        TableToolbar,
        Code,
        Highlight,
        HorizontalLine,
        SpecialCharacters,
        AutoLink,
    ],
    toolbar: [
        "undo",
        "redo",
        "|",
        "bold",
        "italic",
        "underline",
        "strikethrough",
        "|",
        "fontSize",
        "fontFamily",
        "fontColor",
        "fontBackgroundColor",
        "|",
        "link",
        "imageUpload",
        "blockQuote",
        "|",
        "numberedList",
        "bulletedList",
        "|",
        "insertTable",
        "horizontalLine",
        "|",
        "specialCharacters",
        "code",
        "highlight",
        "|",
        "removeFormat",
    ],
    image: {
        toolbar: [
            'imageTextAlternative', '|',
            'imageStyle:alignLeft', 'imageStyle:alignCenter', 'imageStyle:alignRight'
        ],
    },
    table: {
        contentToolbar: [
            'tableColumn', 'tableRow', 'mergeTableCells'
        ],
    },
})
    .then((editor) => {
        window.editor = editor;
    })
    .catch((error) => {
        console.error(error);
    });
