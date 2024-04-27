document.addEventListener('DOMContentLoaded',function(){
    const filter = document.getElementById("filter");
    const title = document.querySelectorAll(".card-title");
    const card = document.querySelectorAll(".card");
    const originalTitlesOrder = Array.from(title).map((title, index) => ({ title, index }));

filter.addEventListener("input", function () {
    const search = filter.value.toLowerCase().trim();

    const sortedTitles = originalTitlesOrder
            .filter(({ title }) => title.innerText.toLowerCase().includes(search))
            .sort((a, b) => a.index - b.index);


            title.forEach(function (title) {
                const card = title.closest('.card');
                card.classList.add('d-none');
            });

            sortedTitles.forEach(({ title }) => {
                const card = title.closest('.card');
                card.classList.remove('d-none');
            });
    });
});


