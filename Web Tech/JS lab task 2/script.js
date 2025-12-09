
let images = [
    "https://images.unsplash.com/photo-1507525428034-b723cf961d3e",
    "https://images.unsplash.com/photo-1528909514045-2fa4ac7a08ba",
    "https://images.unsplash.com/photo-1501785888041-af3ef285b470",
    "https://images.unsplash.com/photo-1500530855697-b586d89ba3ee"
];

let index = 0;
let slider = document.getElementById("slider");
function changeImage() {
    slider.src = images[index];
}
document.getElementById("nextBtn").onclick = function () {
    index++;
    if (index >= images.length) {
        index = 0;
    }
    changeImage();
};

document.getElementById("prevBtn").onclick = function () {
    index--;
    if (index < 0) {
        index = images.length - 1; 
    }
    changeImage();
};
setInterval(function () {
    index++;
    if (index >= images.length) {
        index = 0;
    }
    changeImage();
}, 3000);

changeImage();
