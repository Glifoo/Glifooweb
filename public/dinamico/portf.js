document.addEventListener('DOMContentLoaded', () => {
    const listaServicios = document.getElementById("listaServicios");
    const acordeon = document.getElementById("muestrAcordeon");

    listaServicios.querySelectorAll('.cajaImg').forEach(caja => {
        caja.addEventListener('click', () => {
            const id = caja.dataset.id;
            const servicio = window.serviciosData.find(s => s.id == id);

            acordeon.innerHTML = "";
            servicio.portfolios.forEach(portfolio => {
                acordeon.innerHTML += `
                    <li>
                        <h4>${portfolio.nombre}</h4>
                        <a href="/portfolio/${portfolio.id}">
                            <img src="/storage/${portfolio.imagen}" alt="${portfolio.nombre}" />
                        </a>
                    </li>
                `;
            });
            acordeon.style.display = "block";
        });
    });
});