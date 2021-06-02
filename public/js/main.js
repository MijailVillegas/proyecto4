const grid = new Muuri('.grid', {
    layuot: {
        fillGaps: false,
        horizontal: false,
        alignRight: false,
        alignBottom: false,
        rounding: false
    }

});
window.addEventListener('load', () => {
    grid.refreshItems().layout();
    document.getElementById('grid').classList.add('image-loaded');

    // add event filter by categories

    const links = document.querySelectorAll('#categorias a');
    links.forEach((element) => {
        element.addEventListener('click', (event) => {
            event.preventDefault();
            links.forEach((link) => link.classList.remove('activo'));
            event.target.classList.add('activo');

            const categories = event.target.innerHTML.toLowerCase();
            categories === 'todos' ? grid.filter('[data-categories]') :
                grid.filter(`[data-categories="${categories}"]`);

        });
    });

    /*Serch bar*/

    document.querySelector('#barra-busqueda') - addEventListener('input', (event) => {
        const serch = event.target.value;
        grid.filter((item) => item.getElement().dataset.tags.includes(serch));
    });
});