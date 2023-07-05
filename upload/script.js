
const name_inp = document.getElementById('song_name');
const author_inp = document.getElementById('song_author');
const file_inp = document.getElementById('song_file');

document.getElementById('upload_form').addEventListener('submit', function(e){
    e.preventDefault();
    let name = name_inp.value.trim();
    let author = author_inp.value.trim();
    let file = file_inp.files[0];
    if(name !== '' && author !== '' && file !== undefined){
        let form_data = new FormData();
        form_data.append('name', name);
        form_data.append('author', author);
        form_data.append('audio', file);
        fetch("./upload.php", {
            method: "POST",
            body: form_data,
            cache: "no-cache",
        })
        .then(function(response) {
            return response.text();
        })
        .then(function(data) {
            if (data == '1'){
                alert('Submitted!');
                window.location = '../';
            }
            else {
                alert('An error occurred');
            }
        })
    }
})