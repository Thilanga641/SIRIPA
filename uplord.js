const dropArea = document.querySelector('.drop-section')
const listSection = document.querySelector('.list-section')
const listContainer = document.querySelector('.list')
const fileSelector = document.querySelector('.file-selector')
const fileSelectorInput = document.querySelector('.file-selector-input')

// upload files with browse button
fileSelector.onclick = () => fileSelectorInput.click()
fileSelectorInput.onchange = () => {
    [...fileSelectorInput.files].forEach((file) => {
        if(typeValidation(file.type)){
            uploadFile(file)
        }
    })
}

// when file is over the drag area
dropArea.ondragover = (e) => {
    e.preventDefault();
    [...e.dataTransfer.items].forEach((item) => {
        if(typeValidation(item.type)){
            dropArea.classList.add('drag-over-effect')
        }
    })
}
// when file leave the drag area
dropArea.ondragleave = () => {
    dropArea.classList.remove('drag-over-effect')
}
// when file drop on the drag area
dropArea.ondrop = (e) => {
    e.preventDefault();
    dropArea.classList.remove('drag-over-effect')
    if(e.dataTransfer.items){
        [...e.dataTransfer.items].forEach((item) => {
            if(item.kind === 'file'){
                const file = item.getAsFile();
                if(typeValidation(file.type)){
                    uploadFile(file)
                }
            }
        })
    }else{
        [...e.dataTransfer.files].forEach((file) => {
            if(typeValidation(file.type)){
                uploadFile(file)
            }
        })
    }
}


// check the file type
function typeValidation(type){
    var splitType = type.split('/')[0]
    if(type == 'application/pdf' || splitType == 'image' || splitType == 'video'){
        return true
    }
}

// upload file function////////////////////////////////////////////////////////////////////////////
function uploadFile(file) {
    listSection.style.display = 'block';
    var li = document.createElement('li');
    li.classList.add('in-prog');
    li.innerHTML = `
        <div class="col">
            <img src="icons/${iconSelector(file.type)}" alt="">
        </div>
        <div class="col">
            <div class="file-name">
                <div class="name">${file.name}</div>
                <span>0%</span>
            </div>
            <div class="file-progress">
                <span></span>
            </div>
            <div class="file-size">${(file.size / (1024 * 1024)).toFixed(2)} MB</div>
        </div>
        <div class="col">
            <svg xmlns="http://www.w3.org/2000/svg" class="cross" height="20" width="20">
                <path d="m5.979 14.917-.854-.896 4-4.021-4-4.062.854-.896 4.042 4.062 4-4.062.854.896-4 4.062 4 4.021-.854.896-4-4.063Z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" class="tick" height="20" width="20">
                <path d="m8.229 14.438-3.896-3.917 1.438-1.438 2.458 2.459 6-6L15.667 7Z"/>
            </svg>
        </div>
    `;
    listContainer.prepend(li);

    var http = new XMLHttpRequest();
    var data = new FormData();
    data.append('file', file);

    // Monitor upload progress
    http.upload.onprogress = (e) => {
        var percent_complete = (e.loaded / e.total) * 100;
        li.querySelectorAll('span')[0].innerHTML = Math.round(percent_complete) + '%';
        li.querySelectorAll('span')[1].style.width = percent_complete + '%';
    };

    // Handle successful upload
    http.onload = () => {
        li.classList.add('complete');
        li.classList.remove('in-prog');

        // Attach save-to-database functionality
        li.querySelector('.tick').onclick = () => {
            saveFileToDatabase(file.name, file.type, file.size);
        };
    };

    // Start the upload
    http.open('POST', 'send_pic.php', true);
    http.send(data);

    // Set up the remove button
    li.querySelector('.cross').onclick = () => {
        if (li.classList.contains('in-prog')) {
            http.abort();
        }
        li.remove();
        checkEmptyList();
    };

    // Handle aborted upload
    http.onabort = () => li.remove();
}

// Save file details to the database
function saveFileToDatabase(fileName, fileType, fileSize) {
    var http = new XMLHttpRequest();
    var data = new FormData();
    data.append('name', fileName);
    data.append('type', fileType);
    data.append('size', fileSize);

    http.open('POST', 'saveFile.php', true);
    http.onload = () => {
        if (http.status === 200) {
            alert('File details saved to the database successfully!');
        } else {
            alert('Failed to save file details to the database.');
        }
    };
    http.send(data);
}

// find icon for file
function iconSelector(type){
    var splitType = (type.split('/')[0] == 'application') ? type.split('/')[1] : type.split('/')[0];
    return splitType + '.png'
}









document.querySelector('.file-selector-input').addEventListener('change', async (event) => {
    const files = event.target.files;
    const formData = new FormData();

    for (const file of files) {
        formData.append('files[]', file);
    }

    try {
        const response = await fetch('uplord_DB.php', {
            method: 'POST',
            body: formData,
        });

        const result = await response.json();
        console.log(result);

        if (result.success) {
            fetchUploadedFiles();
        } else {
            console.error(result.message);
        }
    } catch (error) {
        console.error('Error uploading files:', error);
    }
});

async function fetchUploadedFiles() {
    try {
        const response = await fetch('uplord_DB.php');
        const result = await response.json();

        if (result.success) {
            const listSection = document.querySelector('.list');
            listSection.innerHTML = ''; // Clear previous list

            result.files.forEach(file => {
                const listItem = document.createElement('div');
                listItem.innerHTML = `<a href="${file.filepath}" target="_blank">${file.filename}</a>`;
                listSection.appendChild(listItem);
            });
        } else {
            console.error(result.message);
        }
    } catch (error) {
        console.error('Error fetching files:', error);
    }
}

// Fetch files on page load
fetchUploadedFiles();
