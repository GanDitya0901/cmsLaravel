import EditorJS from "@editorjs/editorjs";
import Header from "@editorjs/header";
import List from "@editorjs/list";

if(document.getElementById('editorjs')) {
    const editor = new EditorJS({
        holder: 'editorjs', 
        tools: {
            header: Header, 
            list: List
        }
    });

    const form = document.getElementById('pageForm');

    if(form) {
        form.addEventListener('submit', async (e) => {
            e.preventDefault(); 
            const output = await editor.save();
            document.getElementById('contentField').value = JSON.stringify(output);
            e.target.submit();
        });
    }
}