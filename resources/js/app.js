// require('./bootstrap');

$(document).ready(function () {

    let oldImages = $('#old_images').val();
    if (oldImages) {
        oldImages = JSON.parse(oldImages);
    }
    let imagedata = [];
    let getUrl = window.location;
    let baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[0];
    if (oldImages && oldImages.length > 0) {

        oldImages.forEach((el, key) => {
            if (el.fileable_type === 'App\\Models\\Council') {
                imagedata.push({
                    id: el.id,
                    src: `${baseUrl}storage/council/${el.fileable_id}/${el.name}`
                })
            }
            if (el.fileable_type === 'App\\Models\\Member') {
                imagedata.push({
                    id: el.id,
                    src: `${baseUrl}storage/img/members/${el.fileable_id}/${el.name}`
                })
            }
            if (el.fileable_type === 'App\\Models\\Event') {
                imagedata.push({
                    id: el.id,
                    src: `${baseUrl}storage/img/events/${el.fileable_id}/${el.name}`
                })
            }
            if (el.fileable_type === 'App\\Models\\Banner') {
                imagedata.push({
                    id: el.id,
                    src: `${baseUrl}storage/img/banner/${el.fileable_id}/${el.name}`
                })
            }
            if (el.fileable_type === 'App\\Models\\News') {
                imagedata.push({
                    id: el.id,
                    src: `${baseUrl}storage/img/news/${el.fileable_id}/${el.name}`
                })
            }
            if (el.fileable_type === 'App\\Models\\Page') {
                imagedata.push({
                    id: el.id,
                    src: `${baseUrl}storage/img/pages/${el.fileable_id}/${el.name}`
                })
            }

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
