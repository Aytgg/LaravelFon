const mdScreen = window.matchMedia("(min-width: 768px)");

const icons = document.querySelectorAll(".ico");

const resetIcons = () => {
    icons.forEach((item) => {
        item.style.transform = "scale(1) translateY(0px)";
    });
};

icons.forEach((item, index) => {
    item.addEventListener("mouseover", () => focus(index));
    item.addEventListener("mouseleave", resetIcons);
});

const focus = (index) => {
    if (mdScreen) {
        resetIcons();
        const transformations = [
            { idx: index - 2, scale: 1.1, translateX: 0 },
            { idx: index - 1, scale: 1.2, translateX: 6 },
            { idx: index, scale: 1.5, translateX: 10 },
            { idx: index + 1, scale: 1.2, translateX: 6 },
            { idx: index + 2, scale: 1.1, translateX: 0 },
        ];

        transformations.forEach(({ idx, scale, translateX }) => {
            if (icons[idx]) {
                icons[
                    idx
                ].style.transform = `scale(${scale}) translateX(${translateX}px)`;
            }
        });
    } else {
        console.log('MOBILE')
        resetIcons();
        const transformations = [
            { idx: index - 2, scale: 1.1, translateY: 0 },
            { idx: index - 1, scale: 1.2, translateY: -6 },
            { idx: index, scale: 1.5, translateY: -10 },
            { idx: index + 1, scale: 1.2, translateY: -6 },
            { idx: index + 2, scale: 1.1, translateY: 0 },
        ];

        transformations.forEach(({ idx, scale, translateY }) => {
            if (icons[idx]) {
                icons[
                    idx
                ].style.transform = `scale(${scale}) translateY(${translateY}px)`;
            }
        });
    }
};
