document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form')
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        const formData = new FormData(form);
        fetch(form.action, {
            method: 'POST',
            body: formData,
        })
        .then(response => response.text())
        .then(data => {
            Swal.fire({
                icon: 'success',
                title: 'Gracias por tu consulta te llegará la respuesta a tu Email Registrado.',
                confirmButtonText: 'LISTO'
                // text: data
            }).then(() => {
                form.reset();
            });
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});

