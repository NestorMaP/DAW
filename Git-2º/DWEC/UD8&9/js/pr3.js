let capa1 = document.getElementById("capa1");
let capa2 = document.getElementById("capa2");

// Event for the drag beginning
capa1.addEventListener("dragstart", function(event) {
    capa1.style.opacity = "0.5";
});

// Event for the drag end
capa1.addEventListener("dragend", function(event) {
    capa1.style.opacity = "1";
});

// Event to deal with the item 1 entering item 2 area
capa2.addEventListener("dragenter", function(event) {
    event.preventDefault();
    capa2.style.backgroundColor = "red";
});

// Event to deal with the item 1 on item 2 area
capa2.addEventListener("dragover", function(event) {
    event.preventDefault();
});

// Event to deal with the item1 exiting item 2 area
capa2.addEventListener("dragleave", function(event) {
    capa2.style.backgroundColor="white";
});

// Event to deal with the drop of item1 inside item2
capa2.addEventListener("drop", function(event) {
    event.preventDefault();
    capa1.style.display = "none";
    capa2.textContent = "Lo has logrado";
    capa2.style.backgroundColor = "green";
})