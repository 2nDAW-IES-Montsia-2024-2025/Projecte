class Modal {
    constructor(modalId) {
        this.modal = document.getElementById(modalId);

        if (!this.modal) {
            throw new Error(`Modal con ID "${modalId}" no encontrado.`);
        }

        this.modalContent = this.modal.querySelector('#modalContent');
        this.closeButton = this.modal.querySelector('.close-modal');

        if (this.closeButton) {
            this.closeButton.addEventListener('click', () => this.close());
        }
    }

    open(content) {
        this.modalContent.innerHTML = content;
        this.modal.classList.remove('hidden');
    }

    close() {
        this.modal.classList.add('hidden');
    }

    async loadContent(url) {
        try {
            const response = await fetch(url);
            if (!response.ok) {
                throw new Error(`Error al cargar contenido: ${response.statusText}`);
            }

            const content = await response.text();
            this.open(content);
        } catch (error) {
            console.error(error);
            this.open('<p>Error al cargar el contenido del modal.</p>');
        }
    }

    async modifyIncidence() {
        const nameInput = document.getElementById('incidenceName');
        const descriptionTextarea = document.getElementById('incidenceDescription');

        if (nameInput) nameInput.disabled = false;
        if (descriptionTextarea) descriptionTextarea.disabled = false;


        if (nameInput) nameInput.classList.add('editable');
        if (descriptionTextarea) descriptionTextarea.classList.add('editable');


        const modifyButton = document.getElementById('btn-modify');

        modifyButton.addEventListener('click', () => {
            console.log('Button clicked');
            modifyButton.innerText = 'Guardar';
        });
    }


    async saveChanges(button) {
        const nameInput = document.getElementById('incidenceName');
        const descriptionTextarea = document.getElementById('incidenceDescription');

        const updatedData = {
            name: nameInput.value,
            description: descriptionTextarea.value
        };

        const response = await fetch(`/incidence/${incidenceId}/update`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(updatedData)
        });

        if (response.ok) {
            button.textContent = 'Modificar';
            button.onclick = () => modifyIncidence(button);
            alert('Incidencia actualizada');
        } else {
            alert('Error al actualizar la incidencia');
        }
    }

}



document.addEventListener('DOMContentLoaded', () => {
    // Inicializa el modal solo una vez después de que el DOM se haya cargado completamente
    const modal = new Modal('incidenceModal');

    // Define la función global para abrir el modal
    window.openModal = function (id) {
        // Cambia la URL para que coincida con la ruta del enrutador
        const url = `/incidence/${id}/edit`; // Ajusta la URL a tu ruta definida en el enrutador
        modal.loadContent(url); // Carga el contenido dinámicamente
    };

    // Define la función global para cerrar el modal
    window.closeModal = function () {
        modal.close();
    };

    window.modifyIncidence = function () {
        modal.modifyIncidence();
    };

    window.saveChanges = function () {
        modal.saveChanges();
    };

});
