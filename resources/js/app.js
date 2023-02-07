import Dropzone from "dropzone";

Dropzone.autoDiscover = false;
if (document.getElementById("dropzone")) {
    const dropzone = new Dropzone("#dropzone", {
        dictDefaultMessage: "Sube aquí tu imagen",
        acceptedFiles: ".png,.jpg,.jpeg,.gif",
        addRemoveLinks: true,
        dictRemoveFile: "Borrar Archivo",
        maxFiles: 1,
        uploadMultiple: false,

        init: function () {
            if (document.querySelector('[name="image"]').value.trim()) {
                const img = {};
                img["size"] = 1234
                img["name"] = document.querySelector('[name="image"]').value;

                this.options.addedfile.call(this, img);
                this.options.thumbnail.call(this, img, `/uploads/${img.name}`);

                img.previewElement.classList.add('dz-success', 'dz-complete');
            }
        }
    });

    dropzone.on('success', (file, response) => {
        document.querySelector('[name="image"]').value = response.image;
    });

    dropzone.on('removedfile', (file) => {
        document.querySelector('[name="image"]').value = "";
    });
}
