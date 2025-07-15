document.addEventListener("DOMContentLoaded", function () {
  const select = document.getElementById("cidade-select");
  const cards = document.querySelectorAll(".cidade-card");

  select.addEventListener("change", function () {
    cards.forEach(card => {
      card.classList.remove("show");
      card.classList.add("hidden");
    });

    const selected = document.getElementById(this.value);
    if (selected) {
      selected.classList.remove("hidden");
      void selected.offsetWidth;
      selected.classList.add("show");
    }
  });
});
