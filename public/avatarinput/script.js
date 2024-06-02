// Main Wrapper Selector
const avatarFileUpload = document.getElementById('AvatarFileUpload')
// Preview Wrapper Selector
const imageViewer = avatarFileUpload.querySelector('.selected-image-holder>img')
// Image Selector button Selector
const imageSelector = avatarFileUpload.querySelector('.avatar-selector-btn')
// Image Input File Selector
const imageInput = avatarFileUpload.querySelector('input[name="avatar"]')

/** Trigger Browsing Image to Upload */
imageSelector.addEventListener('click', e => {
    e.preventDefault()
    // Trigger Image input click
    imageInput.click()
})

/** IF Selected Image has change */
imageInput.addEventListener('change', e => {
    // Open File eader
    var reader = new FileReader();
    reader.onload = function(){
        // Preview Image
        imageViewer.src = reader.result;
    };
    // Read Selected Image as DataURL
    reader.readAsDataURL(e.target.files[0]);
})