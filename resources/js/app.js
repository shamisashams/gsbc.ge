require('./bootstrap');

$( document ).ready(function() {

    let oldImages = $('#old_images').val();
    if (oldImages) {
        oldImages = JSON.parse(oldImages);
    }
    let imagedata = [];
    let getUrl = window.location;
    let baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[0];
    if (oldImages && oldImages.length > 0) {
        oldImages.forEach((el, key) => {
            let directory = '';
            if (el.fileable_type === 'App\\Models\\User') {
                directory = 'user';
            }
            if (el.fileable_type === 'App\\Models\\Product') {
                directory = 'product';
            }
            imagedata.push({
                id: el.id,
                src: `${baseUrl}storage/${directory}/${el.fileable_id}/${el.name}`
            })
        })
        $('.input-images').imageUploader({
            preloaded: imagedata,
            imagesInputName: 'images',
            preloadedInputName: 'old_images'
        });
    } else {
        $('.input-images').imageUploader();
    }
});
